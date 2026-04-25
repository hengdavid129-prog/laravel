<?php

use App\Models\User;

it('shows all idea', function () {
    // given I'm sign in
    $this->actingAs($user = User::factory()->create());
    // and I have one Idea in the db
    $user->ideas()->create([
        'description' => 'Build a thing',
    ]);
    // when I visit /ideas
    visit('/ideas')
        ->assertSee('Build a thing');
    // I should see my oun Idea
});

it('shows a single idea', function () {

});

it('shows an edit form to update an idea', function () {

});



