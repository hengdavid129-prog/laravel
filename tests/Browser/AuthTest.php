<?php

use App\Models\User;

it('registers a user', function () {
    // When I visit the registration page
    visit('/register')
    // And I fill out and submit the form
        ->fill('name', 'Jane Doe')
        ->fill('email', 'janedoe@example.com')
        ->fill('password', 'password@123!@')
        ->press('@register-button')
        ->assertPathIs('/ideas');
    // Then I should have an account
    expect(User::where('email', 'janedoe@example.com')->exists())->toBe(true);
    // And I should be sign in
   $this->assertAuthenticated();
    // And I should be on the /ideas page
});

