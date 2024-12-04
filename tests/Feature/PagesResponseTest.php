<?php

//test segun profesor
//it('gives back successful response for home page', function () {
//    $response = $this->get('/');
//
//    $response->assertStatus(200);
//});

//test segun el formato de phpstorm
it('gives back successful response for home page', function () {
    \Pest\Laravel\get(route('home'))
        ->assertOk();
});
