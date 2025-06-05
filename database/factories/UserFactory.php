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
        $pfps = [
            '\userpfps\Bluebear_NH_Villager_Icon.png',
            '\userpfps\Cookie_NH_Villager_Icon.png',
            '\userpfps\Harvey_NH_Character_Icon.png',
            '\userpfps\Henry_NH_Villager_Icon.png',
            '\userpfps\Lolly_NH_Villager_Icon.png',
            '\userpfps\Mabel_NH_Character_Icon.png',
            '\userpfps\Marshal_NH_Villager_Icon.png',
            '\userpfps\Nookling_NH_Character_Icon.png',
            '\userpfps\Scoot_NH_Villager_Icon.png',
            '\userpfps\Villager_NH_Character_Icon.png',
        ];


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
            'profile_picture' => fake()->randomElement($pfps),
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
