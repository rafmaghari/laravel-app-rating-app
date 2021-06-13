<?php

namespace Database\Factories;

use App\Models\User;
use Illuminate\Database\Eloquent\Factories\Factory;
use Illuminate\Support\Str;

class UserFactory extends Factory
{

    protected $model = User::class;

    public function definition(): array
    {
        return [
            'first_name' => $this->faker->firstName(),
            'last_name' => $this->faker->lastName(),
            'birthdate' => now()->subYears(20),
            'gender' => 1,
            'email' => $this->faker->unique()->safeEmail(),
            'password' => '$2b$10$zuz1wD9vidyqHmXSvLQeOu9fvlI3wiSAHtgoIC8ZLIRs7UoaI0Fka', // password
            'is_active' => 1,
        ];
    }

}
