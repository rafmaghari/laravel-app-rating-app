<?php

namespace Tests\Feature\app\Http\Controller\Api;

use App\Models\Category;
use Illuminate\Foundation\Testing\RefreshDatabase;
use Illuminate\Foundation\Testing\WithFaker;
use Tests\TestCase;

class CategoryControllerTest extends TestCase
{
    use RefreshDatabase, WithFaker;

    /** @test */
    public function can_fetch_categories()
    {
        Category::factory()->create();

        $response = $this->get('/api/categories');

        $response->assertStatus(200);
        $this->assertDatabaseCount('categories',1);
    }


    /** @test */
    public function can_add_category()
    {
        $params = [
            'name' => $this->faker->name,
            'description' => $this->faker->sentence
        ];

        $response = $this->post('/api/categories', $params);

        $response->assertStatus(201);
        $this->assertDatabaseCount('categories',1);
        $this->assertEquals($params, $params = [
            'name' => $response->json()['name'],
            'description' => $response->json()['description']
        ]);
    }
    
    /** @test */
    public function can_edit_category()
    {
        $category = Category::factory()->create();

        $newParam = [
            'name' => $this->faker->name,
            'description' => $this->faker->sentence
        ];

        $response = $this->put(route('categories.update',$category->id, ));

        $response->assertStatus(200);
        $this->assertDatabaseCount('categories',1);
        
    }
}
