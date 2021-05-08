<?php

use App\Models\Category;
use App\Models\User;
use App\Models\Item;
use App\Models\ItemComment;
use Illuminate\Foundation\Testing\RefreshDatabase;

uses(RefreshDatabase::class);

it('can validate items',function () {
    $response = $this->postJson(route('items.store',[]));

    $response->assertStatus(422);
});

it('can fetch items', function () {
    User::factory()->has(Item::factory()->for(Category::factory()->create()))->create();

    $response = $this->getJson(route('items.index'));

    $response->assertStatus(200);
    $this->assertDatabaseCount('items', 1);
});

it('can add item', function () {
    $item = Item::factory()->raw();

    $response = $this->postJson(route('items.store',$item));

    $response->assertStatus(201);
    $this->assertDatabaseCount('items', 1);
});

it('can edit item', function () {
    $category = Category::factory()->create();
    $user = User::factory()->create();
    $item = Item::factory()->for($category)->for($user)->create();

    $newParam = ['title' => 'UPDATED TITLE', 'content' => 'UPDATED CONTENT', 'user_id' => $user->id, 'category_id' => $category->id];

    $response = $this->putJson(route('items.update',$item),$newParam);
    $response->assertStatus(200);
    $this->assertDatabaseHas('items', $newParam);
});

it('can delete item', function () {
    $category = Category::factory()->create();
    $user = User::factory()->create();
    $item = Item::factory()->for($category)->for($user)->create();

    $response = $this->deleteJson(route('items.destroy', $item));

    $response->assertStatus(200);
    $this->assertDatabaseCount('items', 0);
});

it('can add item comment', function() {
    $category = Category::factory()->create();
    $user = User::factory()->create();
    $item = Item::factory()->for($category)->for($user)->create();

    $itemComment = ItemComment::factory()->state( ['user_id' => $user->id, 'item_id' => $item->id] )->raw();

    $response = $this->postJson(route('item-comments.store', $itemComment));
    $response->assertStatus(201);
});

it('can edit item comment', function() {
    $category = Category::factory()->create();
    $user = User::factory()->create();
    $item = Item::factory()->for($category)->for($user)->hasComments()->create();

    $updateParam = ['content' => 'UPDATED CONTENT'];
    $response = $this->putJson(route('item-comments.update', $item->comments->first()->id), $updateParam);

    $response->assertStatus(200);
    $this->assertDatabaseHas('item_comments', $updateParam);
});

it('can delete item comment', function() {
    $category = Category::factory()->create();
    $user = User::factory()->create();
    $item = Item::factory()->for($category)->for($user)->hasComments()->create();

    $response = $this->deleteJson(route('item-comments.destroy', $item->comments->first()->id));

    $response->assertStatus(200);
    $this->assertDatabaseCount('item_comments', 0);
});


