<?php

use Illuminate\Support\Facades\Route;

Route::get('/', function() {
    return view('welcome', [
        'tasks' => []
    ]);
});

Route::view('/about', 'about');
Route::view('/contact', 'contact');
