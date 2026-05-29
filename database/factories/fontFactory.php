<?php

namespace Database\Factories;

use App\Models\Font;
use Illuminate\Database\Eloquent\Factories\Factory;

/**
 * @extends Factory<Font>
 */
class FontFactory extends Factory
{
    /**
     * Define the model's default state.
     *
     * @return array<string, mixed>
     */
    public function definition(): array
    {
        return [
            'font_name' => $this->faker->randomElement(['Arial', 'San-serif', 'Times New Roman']),
            'font_size' => $this->faker->numberBetween(8, 72),
            'font_color' => $this->faker->safeColorName(),
        ];
    }
}
