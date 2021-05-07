<?php

use App\Models\Category;
use Illuminate\Foundation\Testing\RefreshDatabase;

uses( RefreshDatabase::class);

it('sample', function () {
    $category = Category::factory()-;
    $response = $this->getJson(route('categories.index'));

    $response->assertStatus(200);
    $this->assertDatabaseHas('categories', $category->toArray());
});
