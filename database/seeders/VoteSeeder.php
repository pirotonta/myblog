<?php

namespace Database\Seeders;

use App\Models\{Vote, Post, User};
use Illuminate\Database\Console\Seeds\WithoutModelEvents;
use Illuminate\Database\Seeder;

class VoteSeeder extends Seeder
{
    /**
     * Run the database seeds.
     */
    public function run(): void
    {
        $usuarios = User::all();
        $posts = Post::all();

        foreach ($posts as $post) {
            $votantes = $usuarios->random(rand(3, 8));
            $rating = 0;

            foreach ($votantes as $votante){
                $voto = rand(0, 1) ? 1 : -1;

                Vote::updateOrCreate(
                    ['user_id' => $votante->id, 'post_id' => $post->id],
                    ['value' => $voto]
                );

                $rating += $voto;
            }

            $post->update(['rating' => $rating]);
        }
    }
}
