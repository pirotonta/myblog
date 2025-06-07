<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use Illuminate\Support\Facades\Auth;
use App\Models\Post;

class VoteController extends Controller
{

    public function vote(Request $request, Post $post)
    {
        $request->validate([
            'value' => 'required|in:1,-1',
        ]);

        $user = Auth::user();

        if (!$user) {
            if ($request->expectsJson()) {
                return response()->json(['message' => 'Debes iniciar sesión para votar.'], 401);
            }
            return redirect()->route('login')->with('error', 'Debes iniciar sesión para votar.');
        }

        $votoPrevio = $post->userVote($user);

        if ($votoPrevio) {
            if ($votoPrevio->value != $request->value) {
                $votoPrevio->update(['value' => $request->value]);
            } else {
                $votoPrevio->delete();
            }
        } else {
            $post->votes()->create([
                'user_id' => $user->id,
                'value' => $request->value,
            ]);
        }

        if ($request->expectsJson()) {
            $newVoteCount = $post->votes()->sum('value');
            $currentUserVote = $post->userVote($user);
            return response()->json([
                'message' => 'Voto registrado correctamente.',
                'newVoteCount' => $newVoteCount,
                'currentUserVote' => $currentUserVote ? $currentUserVote->value : 0,
            ]);
        }

        return back()->with('success', 'voto registrado correctamente.');
    }
}
