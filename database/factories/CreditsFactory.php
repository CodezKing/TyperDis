<?php

namespace Database\Factories;

use App\Models\Credit_accountFactory;
use App\Models\User;
use App\Models\Credit;

use Illuminate\Database\Eloquent\Factories\Factory;



/**
 * @extends Factory<CreditAccount_Factory>
 */
class CreditAccount_Factory extends Factory
{
    /**
     * Define the model's default state.
     *
     * @return array<string, mixed>
     */
    public function definition(): array
    {
        return [
            'credit_id'=> Credit::factory(),
            'user_id' => User::factory(),
            'credit' => $this->faker->randomNumber(),
            'word_count' => $this->faker->randomNumber(),
        ];
    }
}
