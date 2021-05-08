<?php

namespace Database\Factories;

use App\Models\Item;
use App\Models\Rating;
use App\Models\User;
use Illuminate\Database\Eloquent\Factories\Factory;

class RatingFactory extends Factory
{
    protected $model = Rating::class;

    public function definition(): array
    {
        return [
            'user_id' => User::factory(),
            'item_id' => Item::Factory(),
            'rating' => $this->faker->numberBetween(1,5)
        ];
    }
}
