<?php

use App\Models\Category;
use Illuminate\Foundation\Testing\RefreshDatabase;

uses(RefreshDatabase::class);

it('can validate category data', function () {
    $response = $this->postJson(route('categories.store', []));

    $response->assertStatus(422);
});

it('can fetch categories', function () {
    $category = Category::factory()->create();

    $response = $this->getJson(route('categories.index'));

    $response->assertStatus(200);
    $this->assertDatabaseCount('categories',1);
});

it('can add category', function () {
    $category = Category::factory()->raw();

    $response = $this->postJson(route('categories.store'), $category);

    $response->assertStatus(201)->assertJson(['message' => 'Category has been added']);
    $this->assertDatabaseCount('categories',1);
    $this->assertDatabaseHas('categories',$category);
});

it('can edit category', function () {
    $this->withExceptionHandling();
    $category = Category::factory()->create();
    $updatedParam = ['name' => 'UPDATED ITEM', 'description'=> 'UPDATE DESCRIPTION'];

    $response = $this->putJson(route('categories.update', $category), $updatedParam);
    $response->assertStatus(200);
    $this->assertDatabaseCount('categories',1);
    $this->assertDatabaseHas('categories',$updatedParam);
});

it('can delete category', function () {
    $category = Category::factory()->create();

    $response = $this->deleteJson(route('categories.destroy', $category));

    $response->assertStatus(200);
    $this->assertDatabaseCount('categories',0);
});


