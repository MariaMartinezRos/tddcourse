<?php

use App\Models\Course;
use App\Models\Video;
use Illuminate\Foundation\Testing\RefreshDatabase;
use function Pest\Laravel\get;

uses(RefreshDatabase::class);

it('does not find unreleased courses', function () {
    //Arrange
    $course = Course::factory()->create();

    //Act
    get(route('pages.course-details', $course))
        ->assertNotFound();
});

it('shows course details', function () {
    //Arrange
    $course = Course::factory()->create([
        'image_name' => 'image.png',    //esto se podria quitar
    ]);

    //Act
    get(route('pages.course-details', $course))
        ->assertOk()
        ->assertSeeText([
            $course->title,
            $course->description,
            $course->image,
            $course->tagline,
            ...$course->learnings,  //para mostrar cantidad indefinida de elementos
        ])
        ->assertSee(asset("images/{$course->image_name}"));
    //como esta relacionado con un atributo de una base de datos, se pone snake case y no slug case
});

it('shows course video count', function () {
    //Arrange
    $course = Course::factory()
        ->has(Video::factory()->count(3))
        ->create();

    //Act & Assert
    get(route('pages.course-details', $course))
        ->assertOk()
        ->assertSeeText('3 videos');
});
