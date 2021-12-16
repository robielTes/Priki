<?php

namespace Database\Factories;

use App\Models\Opinion;
use App\Models\User;
use Illuminate\Database\Eloquent\Factories\Factory;

class UserOpinionFactory extends Factory
{
    /**
     * Define the model's default state.
     *
     * @return array
     */
    public function definition()
    {
        return [
            'user_id' =>  User::all()->random()->id,
            'opinion_id' => Opinion::all()->random()->id,
            'comment' => $this->faker->text(50),
            'points' => rand(-1,1)
        ];
    }
}
