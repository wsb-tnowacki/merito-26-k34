<?php

namespace Database\Factories;

use App\Models\Post;
use Illuminate\Database\Eloquent\Factories\Factory;
use Illuminate\Support\Str;

/**
 * @extends Factory<Post>
 */
class PostFactory extends Factory
{
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
        return [
             'tytul' => fake('pl_PL')->realText(fake()->numberBetween(10,50)),
             'autor' => $name,
             'email' => $pelnyEmail,
             'tresc' => fake('pl_PL')->realTextBetween(200,500),
             'created_at' => fake()->dateTime()
        ];
    }
}
