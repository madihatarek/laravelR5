<?php

namespace Database\Factories;

use Illuminate\Database\Eloquent\Factories\Factory;
use Illuminate\Support\Str;

/**
 * @extends \Illuminate\Database\Eloquent\Factories\Factory<\App\Models\Client>
 */
class ClientFactory extends Factory
{
    /**
     * Define the model's default state.
     *
     * @return array<string, mixed>
     */
    // protected $model = Client::class;

    public function definition(): array
    {
        return [
            'clientName' => fake()->name(),
            'phone' => fake()->phoneNumber(),
            'email' => fake()->unique()->safeEmail(),
            'website' => fake()->url(),
            // 'city' => fake()->city(),
            'city_id' => fake()->numberBetween(1,20),
            'active' => fake()->numberBetween(0,1),
            'address' => fake()->address(),
            'image' => fake()->imageUrl(640, 480)

        ];
    }
}
