<?php

namespace Database\Seeders;

use App\Models\Category;
use Illuminate\Database\Console\Seeds\WithoutModelEvents;
use Illuminate\Database\Seeder;

class CategorySeeder extends Seeder
{
    /**
     * Run the database seeds.
     */
    public function run(): void
    {
        $categories = ['mascotas' => '/icons/mascotas.svg', 
        'me pasó' => '/icons/mepaso.svg', 
        'música' => '/icons/musica.svg', 
        'cine' => '/icons/cine.svg', 
        'off-topic' => '/icons/offtopic.svg',];

        foreach ($categories as $name => $icon) {
            Category::firstOrCreate(['name' => $name], ['icon' => $icon]);
        }
    }
}
