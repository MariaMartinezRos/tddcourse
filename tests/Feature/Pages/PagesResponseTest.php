<?php

//test segun profesor
//it('gives back successful response for home page', function () {
//    $response = $this->get('/');
//
//    $response->assertStatus(200);
//});
use App\Models\Course;
use App\Models\User;
use Illuminate\Foundation\Testing\RefreshDatabase;
use function Pest\Laravel\get;

uses(RefreshDatabase::class);
//test segun el formato de phpstorm
it('gives back successful response for home page', function () {
    get(route('pages.home'))
        ->assertOk();
});

it('gives back successful response for course details page', function () {
    $course = Course::factory()->create();

    get(route('pages.course-details', $course))
        ->assertOk();
});

it('gives back successful for dashboard page', function () {
    // Arrange
    $user = User::factory()->create();

    // Act & Assert
    $this->actingAs($user);

    get(route('dashboard'))
        ->assertOk();
});
