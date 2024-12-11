<?php

use App\Models\Course;
use App\Models\User;
use App\Models\Video;
use Illuminate\Database\Eloquent\Factories\Sequence;
use Illuminate\Foundation\Testing\RefreshDatabase;
use function Pest\Laravel\get;
use Illuminate\Support\Facades\Route;

uses(RefreshDatabase::class);

it('cannot be accessed by guest', function () {
    //Act & Assert
    get(route('dashboard'))
        ->assertRedirect(route('login'));

});

it('list purchased courses', function () {
    //Arrange
    $user = User::factory()
        ->has(Course::factory()->count(2)->state(
            new Sequence(
                ['title' => 'Course A'],
                ['title' => 'Course B'],
            )
        ))
        ->create();
    // Act & Assert
    $this->actingAs($user);
    get(route('dashboard'))
        ->assertOk()
        ->assertSeeText([
            'Course B',
            'Course A',
        ]);

});

it('does not list other courses', function () {
    //Arrange

});

it('shows latest purchased course first', function () {
    //Arrange

});

it('includes link to product videos', function () {
    //Arrange

});


