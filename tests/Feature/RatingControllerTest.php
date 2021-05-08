<?php

use App\Models\Item;
use App\Models\Rating;
use App\Models\User;
use Illuminate\Foundation\Testing\RefreshDatabase;
use Laravel\Passport\Passport;

uses(RefreshDatabase::class);

beforeEach(function () {
    $this->user = User::factory()->create();
    Passport::actingAs($this->user);
});

it('can add rating', function () {
    $item = Item::factory()->forCategory()->forUser()->create();

    $rating = Rating::factory()->state([
        'item_id' => $item->id,
        'user_id' => $item->user_id,
    ])->raw();

    $response = $this->postJson(route('ratings.store'), $rating);

    $response->assertStatus(201);
});

it('can edit rating', function () {
    $item = Item::factory()->forCategory()->forUser()->create();
    $rating = Rating::factory()->state(['item_id' => $item->id, 'user_id' => $item->user_id, 'rating' => 1])->create();
    $newParam = ['rating' => 5];
    $response = $this->putJson(route('ratings.update', $rating), $newParam);

    $response->assertStatus(200);
});
