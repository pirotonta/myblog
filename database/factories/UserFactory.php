<?php

namespace Database\Factories;

use Illuminate\Database\Eloquent\Factories\Factory;
use Illuminate\Support\Facades\Hash;
use Illuminate\Support\Str;

/**
 * @extends \Illuminate\Database\Eloquent\Factories\Factory<\App\Models\User>
 */
class UserFactory extends Factory
{
    /**
     * The current password being used by the factory.
     */
    protected static ?string $password;

    /**
     * Define the model's default state.
     *
     * @return array<string, mixed>
     */
    public function definition(): array
    {
        $sustantivos = [
            'guiso',
            'caniche',
            'gatito',
            'luna',
            'mango',
            'gato',
            'yerba',
            'queso',
            'cibernauta',
            'perrito',
            'sandia',
            'pepito',
            'gomita',
            'alfil',
            'pollo',
            'fideo',
            'angel'
        ];

        $adjetivos = [
            'picante',
            'loco',
            'triste',
            'skibidi',
            'salado',
            'chiquito',
            'nulo',
            'pipi',
            'copado',
            'peludo',
            'dulce',
            'jugoso',
            'lindo',
            'fino',
            'sabroso',
            'iq'
        ];

        $sustantivo = fake()->randomElement($sustantivos);
        $adjetivo = fake()->randomElement($adjetivos);
        $number = fake()->numberBetween(1, 99);

        $username = ucfirst($sustantivo) . ucfirst($adjetivo) . $number;

        return [
            'username' => $username,
            'email' => fake()->unique()->safeEmail(),
            'email_verified_at' => now(),
            'password' => static::$password ??= Hash::make('password'),
            'remember_token' => Str::random(10),
            'profile_picture' => '/userpfps/' . fake()->numberBetween(1, 10) . '.png',
        ];
    }

    /**
     * Indicate that the model's email address should be unverified.
     */
    public function unverified(): static
    {
        return $this->state(fn (array $attributes) => [
            'email_verified_at' => null,
        ]);
    }
}
