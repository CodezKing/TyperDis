<?php

namespace Database\Factories;

use App\Models\Publishings;
use Illuminate\Database\Eloquent\Factories\Factory;
/**
 * @extends Factory<Publishings>
 */
class online_PublishingsFactory extends Factory
{
    /**
     * Define the model's default state.
     *
     * @return array<string, mixed>
     */
    public function definition(): array
    {
        return [
            'publishings_id' => Publishings::factory(),
            'Site_name' => $this->faker->word(),
            'Document_name' =>  $this->faker->randomElement(['Panda Fist']), 
            'Author_Firstname' => $this->faker->firstName(['Ahamed Rimaz']),
            'Author_Lastname' => $this->faker->lastName(['Mohamed Razik']),
            'publication_Date' => $this->faker->date($format = 'Y-m-d', $max = 'now'),
        ];
    }
}
