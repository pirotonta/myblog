<?php

namespace App\Http\Controllers;

use App\Http\Requests\ProfileUpdateRequest;
use Illuminate\Http\RedirectResponse;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Auth;
use Illuminate\Support\Facades\Redirect;
use Illuminate\View\View;
use App\Models\{Post, User};

class ProfileController extends Controller
{
    /**
     * Display any user's profile.
     */
    public function showPublic($username)
    {
        $user = User::where('username', $username)->firstOrFail();
        $userActual = Auth::user();

        $posts = Post::with(['votes' => function ($query) use ($userActual) {
            if ($userActual) {
                $query->where('user_id', $userActual->id);
            }
        }])
            ->where('user_id', $user->id)
            ->paginate(10);

        return view('profile.public', compact('user', 'posts', 'userActual'));
    }

    /**
     * Display the user's profile form.
     */
    public function edit(Request $request): View
    {
        return view('profile.edit', [
            'user' => $request->user(),
        ]);
    }

    /**
     * Update the user's profile information.
     */
    public function update(ProfileUpdateRequest $request): RedirectResponse
    {
        $request->user()->fill($request->validated());

        if ($request->user()->isDirty('email')) {
            $request->user()->email_verified_at = null;
        }

        $request->user()->save();

        return Redirect::route('profile.edit')->with('status', 'profile-updated');
    }

    /**
     * Delete the user's account.
     */
    public function destroy(Request $request): RedirectResponse
    {
        $request->validateWithBag('userDeletion', [
            'password' => ['required', 'current_password'],
        ]);

        $user = $request->user();

        Auth::logout();

        $user->delete();

        $request->session()->invalidate();
        $request->session()->regenerateToken();

        return Redirect::to('/');
    }

    public function updateAvatar(Request $request)
    {
        $request->validate([
            'profile_picture' => 'required|string',
        ]);

        $user = Auth::user();

        if ($user) {
            $user->profile_picture = $request->profile_picture;
            $request->user()->save();

            return back()->with('status', 'Avatar actualizado.');
        }
    }
}
