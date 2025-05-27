<?php

namespace Database\Factories;

use Illuminate\Database\Eloquent\Factories\Factory;
use App\Models\Post;
use App\Models\User;

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
            'habilitated' => true,
            'thumbnail' => null,
            'content' => $this->faker->paragraphs(3, true),
        ];
    }
}
