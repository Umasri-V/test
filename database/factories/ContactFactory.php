<?php

namespace Database\Factories;

use Illuminate\Database\Eloquent\Factories\Factory;

class ContactFactory extends Factory
{
    // contact model

    public function definition()
    {
        return [
            'firstname' => $this->faker->firstName,
            'lastname'=>$this->faker->lastName,
            'email' => $this->faker->unique()->email,
            'phonenumber'=>$this->faker->phoneNumber,
            'reason'=>"name change"
        ];
    }
}
