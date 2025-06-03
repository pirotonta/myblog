<?php

namespace Database\Seeders;

use App\Models\{Comment, Post, User};
use Illuminate\Database\Console\Seeds\WithoutModelEvents;
use Illuminate\Database\Seeder;

class CommentSeeder extends Seeder
{
    /**
     * Run the database seeds.
     */
    public function run(): void
    {
        $users = User::all();
        $posts = Post::all();

        $commentSample = [
                    "Seee totalmente de acuerdo con el post, buen punto de vista.",
                    "No había pensado en eso, gracias por compartir.",
                    "creo que deberíamos profundizar más en el tema.",
                    "Interesante, pero creo que hay otros factores a considerar que no estás viendo.",
                    "Me encantó cómo describiste el fenómeno, muy claro y bien explicado.",
                    "Yyyy discrepo en algunos puntos, pero respeto la opinión.",
                    "¿Alguien más piensa lo mismo que yo?",
                    "Esto da para una buena discusión la próxima juntada.",
                    "Gracias por subirlo, estaba buscando algo así.",
                    "¿Podrías compartir fuentes para profundizar?",
                    "No estoy de acuerdo, creo que hay un error en tu argumento. Pero no te voy a decir cuál es.",
        ];

        foreach ($posts as $post) {

            for ($i = 0; $i < rand(1, 5); $i++) {
                Comment::create([
                    'user_id' => $users->random()->id,
                    'post_id' => $post->id,
                    'content' => $commentSample[array_rand($commentSample)],
                ]);
            }
        }
    }
}
