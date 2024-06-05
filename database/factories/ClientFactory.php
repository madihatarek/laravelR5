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
    protected $model = Client::class;

    public function definition(): array
    {
        return [
            'clientName' => fake()->clientName(),
            'phone' => fake()->phone(),
            'email' => fake()->unique()->safeEmail(),
            'email_verified_at' => now(),
            'website' => fake()->website(),
            'city' => fake()->city(),
            // 'active' => fake()->active(),
            // 'image' => fake()->image(),

        ];
    }
}
