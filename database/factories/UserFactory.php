<?php

namespace Database\Factories;

use App\Models\User;
use Illuminate\Database\Eloquent\Factories\Factory;
use Illuminate\Support\Facades\Hash;
use Illuminate\Support\Str;

/**
 * @extends Factory<User>
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
        $plec = fake()->randomElement(['male','female']);
        $imie = fake('pl_PL')->firstName($plec);
        $nazwisko = fake('pl_PL')->lastName($plec);
        $name = $imie.' '.$nazwisko;
        // 1. Tworzymy bazowy e-mail: małe litery i usunięte polskie znaki (ł -> l, ę -> e)
        $login = Str::lower(Str::ascii($imie)) . '.' . Str::lower(Str::ascii($nazwisko));
        $domena = fake('pl_PL')->freeEmailDomain();
        $pelnyEmail = $login . '@' . $domena;
        // 2. Wymuszamy unikalność na CAŁYM adresie e-mail
        // Jeśli taki mail już istnieje, Faker doda unikalny numer przed znakiem @
        $unikalnyEmail = fake()->unique()->numerify($pelnyEmail);
        return [
            /* 'name' => fake()->name(),
            'email' => fake()->unique()->safeEmail(),
            'email_verified_at' => now(),
            'password' => static::$password ??= Hash::make('password'),
            'remember_token' => Str::random(10), */
            'name' => $name,
            'email' => $unikalnyEmail,
            'email_verified_at' => now(),
            'password' => static::$password ??= Hash::make('zaq1@WSX'),
            'remember_token' => Str::random(10),
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
