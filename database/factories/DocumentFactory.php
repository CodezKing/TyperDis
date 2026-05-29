<?php

namespace Database\Factories;

use App\Models\Document;
use App\Models\User;
use App\Models\Font;

use Illuminate\Database\Eloquent\Factories\Factory;


/**
 * @extends Factory<Document>
 */
class DocumentFactory extends Factory
{
    /**
     * Define the model's default state.
     *
     * @return array<string, mixed>
     */
    public function definition(): array
    {
        return [
            'document_id' => Document::factory(),
            'document_name' => $this->faker->randomElement(['The Frozen Pancake',"Knight's shield",'Panda Fist']),
            'heading' => $this->faker->randomWord(),
            'Word_count' => $this->faker->numberBetween(1, 100),
            'Page_count' => $this->faker->randomDigit(),
            'user_id' => User::factory(),
            'font_id' => Font::factory(),

        ];
    }
}
