<?php

namespace Database\Factories;

use Illuminate\Database\Eloquent\Factories\Factory;
use App\Models\Post;
use App\Models\User;
use App\Models\Category;

/**
 * @extends \Illuminate\Database\Eloquent\Factories\Factory<\App\Models\Post>
 */
class PostFactory extends Factory
{

    protected $model = Post::class;

    public function definition()
    {
        return [
            'title' => $this->faker->sentence,
            'user_id' => User::factory(),
            'category_id' => Category::inRandomOrder()->first()?->id ?? 1,
            'habilitated' => true,
            'image_path' => null,
            'content' => $this->faker->paragraphs(3, true),
            'rating' => $this->faker->numberBetween(-10, 20),
            'views' => $this->faker->numberBetween(0, 1000),
        ];
    }
}
