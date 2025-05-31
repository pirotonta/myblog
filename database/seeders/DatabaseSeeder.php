<?php

namespace Database\Seeders;

use Illuminate\Support\Facades\DB;
use App\Models\User;
use App\Models\Post;
use App\Models\Comment;
use App\Models\Category;
use Illuminate\Database\Seeder;
// use Illuminate\Database\Console\Seeds\WithoutModelEvents;

class DatabaseSeeder extends Seeder
{
    /**
     * Seed the application's database.
     */
    public function run(): void
    {
        // desactivar claves foraneas para poder truncar
        DB::statement('SET FOREIGN_KEY_CHECKS=0;');

        // esto es para limpiar datos viejos
        DB::table('comments')->truncate();
        DB::table('posts')->truncate();
        DB::table('users')->truncate();

        $categories = ['mascotas', 'mepaso', 'musica', 'cine', 'offtopic'];

        foreach ($categories as $name) {
            Category::firstOrCreate(['name' => $name]);
        }

        // Crear usuarios con posts y comentarios
        User::factory()
            ->count(5)
            ->has(
                Post::factory()
                    ->count(3)
                    ->hasComments(2)
            )
            ->create();
    }
}
