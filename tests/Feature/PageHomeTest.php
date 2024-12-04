<?php

use Illuminate\Foundation\Testing\RefreshDatabase;

uses(RefreshDatabase::class);

it('shows courses overview', function () {
    // Arrange
    Course::factory()->create(['title' => 'Course A']);
    Course::factory()->create(['title' => 'Course B']);
    Course::factory()->create(['title' => 'Course C']);

    // Act
    get(route('home'))
        ->assertSeeText([
            'Course A',
            'Course B',
            'Course C',
        ]);

});


it('shows only released courses', function () {
    // Arrange

    // Act

    // Assert

});

it('shows courses by release date', function () {
    // Arrange

    // Act

    // Assert
});
