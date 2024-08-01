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
        $sexes = ['H','F'];
        $randomKeySexe = array_rand($sexes, 1);
        $documents = ['CNI', 'PASSPORT', 'PERMIS DE CONDUIRE'];
        $randomKeyDoc = array_rand($documents, 1);

        return [
            'nom' => $this->faker->lastName,
            'prenom' => $this->faker->firstName,
            'sexe' => $sexes[$randomKeySexe],
            'email' => $this->faker->unique()->safeEmail(),
            'telephone1' => $this->faker->unique()->phoneNumber(),
            'telephone2' => $this->faker->unique()->phoneNumber(),
            'pieceIdentite' => $documents[$randomKeyDoc],
            'noPieceIdentite' => $this->faker->unique()->bankAccountNumber,
            'photo' => $this->faker->imageUrl(),
            'password' => static::$password ??= Hash::make('password')
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
