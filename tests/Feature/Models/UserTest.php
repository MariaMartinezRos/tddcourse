<?php

use App\Models\Course;
use Illuminate\Foundation\Testing\RefreshDatabase;

uses(RefreshDatabase::class);

it('has courses', function () {
    //Arrange
    $user = \App\Models\User::factory()
        ->has(Course::factory()->count(2))
        ->create();
    //Act & Assert
    expect($user->courses)
        ->toHaveCount(2)
        ->each->toBeInstanceOf(Course::class);

});
