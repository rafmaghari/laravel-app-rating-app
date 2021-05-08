<?php

namespace Database\Factories;

use App\Models\Item;
use App\Models\ItemComment;
use App\Models\User;
use Illuminate\Database\Eloquent\Factories\Factory;

class ItemCommentFactory extends Factory
{
    protected $model = ItemComment::class;

    public function definition(): array
    {
        return [
            'user_id' => User::factory(),
            'item_id' => Item::factory(),
            'content' => $this->faker->sentence(),
            'is_active' => 1
        ];
    }

    public function inactive(): ItemCommentFactory
    {
        return $this->state(['is_active' => 0]);
    }
}
