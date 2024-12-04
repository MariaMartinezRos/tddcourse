<?php

//test segun profesor
//it('gives back successful response for home page', function () {
//    $response = $this->get('/');
//
//    $response->assertStatus(200);
//});
use Illuminate\Foundation\Testing\RefreshDatabase;
use function Pest\Laravel\get;

uses(RefreshDatabase::class);
//test segun el formato de phpstorm
it('gives back successful response for home page', function () {
    get(route('home'))
        ->assertOk();
});
