<?php

namespace Database\Factories;

use App\Models\User;
use Illuminate\Database\Eloquent\Factories\Factory;

class ClientFactory extends Factory
{
    // user model

    public function definition()
    {
        return [
            'name' => $this->faker->name,
            'email' => $this->faker->unique()->email(),
            'phonenumber'=>$this->faker->phoneNumber,
            'password' => '$2y$10$92IXUNpkjO0rOQ5byMi.Ye4oKoEa3Ro9llC/.og/at2.uheWG/igi', // password
            'address'=>$this->faker->address,
       ];
    }
}
