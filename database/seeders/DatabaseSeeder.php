<?php

namespace Database\Seeders;

use Illuminate\Support\Facades\DB;
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
        // DB::statement('SET FOREIGN_KEY_CHECKS=0;');

        // esto es para limpiar datos viejos
        // Comment::truncate();
        // Vote::truncate();
        // Post::truncate();
        // User::truncate();
        // Category::truncate();
        // DB::statement('SET FOREIGN_KEY_CHECKS=1;');

        
        // // Crear usuarios con posts y comentarios
        // User::factory()
        //     ->count(5)
        //     ->has(
        //         Post::factory()
        //             ->count(3)
        //             ->hasComments(2)
        //     )
        //     ->create();

        // User::factory()->create([
        //     'name' => 'Test User',
        //     'email' => 'test@example.com',
        // ]);

        $this->call([
            UserSeeder::class,
            CategorySeeder::class,
            PostSeeder::class,
            CommentSeeder::class,
            VoteSeeder::class,
        ]);
    }
}
