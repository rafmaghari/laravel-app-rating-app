<?php

namespace Database\Factories;

use App\Models\Category;
use App\Models\Item;
use App\Models\User;
use Illuminate\Database\Eloquent\Factories\Factory;

class ItemFactory extends Factory
{

    protected $model = Item::class;

    public function definition(): array
    {
        return [
            'user_id' => User::factory(),
            'title' => $this->faker->sentence(),
            'content' => $this->faker->sentence(),
            'category_id' => Category::factory(),
            'is_active' => 1,
        ];
    }

    public function inactive(): ItemFactory
    {
        return $this->state([
            'is_active' => 0
        ]);
    }
}
