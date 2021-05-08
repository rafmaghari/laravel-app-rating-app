<?php

use App\Models\User;
use Illuminate\Foundation\Testing\RefreshDatabase;
use Illuminate\Support\Facades\Artisan;
use function Pest\Faker\faker;

uses(RefreshDatabase::class);

beforeEach(function () {
    Artisan::call('passport:install',['-vvv' => true]);
});

it('can log in', function () {
    $user = User::factory()->create();
    $credential = [
        'email' => $user->email,
        'password' => 'password'
    ];
    $response = $this->post(route('login'),$credential);

    $response->assertStatus(200);
});

it('can register', function () {
    $user = [
        'first_name' =>  faker()->name(),
        'last_name' =>  faker()->name(),
        'email' =>  faker()->unique()->safeEmail(),
        'birthdate' => now()->subYears(20),
        'gender' => 1,
        'password' => 'password',
        'c_password' => 'password',
    ];

    $response = $this->post(route('register'), $user);

    $response->assertStatus(200);
});

