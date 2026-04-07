<?php

use Illuminate\Support\Facades\Route;
use App\Models\Idea;

Route::get('/', function () {
    $ideas = Idea::query()
        ->when(request('state'), function($query, $state) {
            $query->where('state', $state);
        })
        ->get();

    return view('ideas', [
        'ideas' => $ideas
    ]);

});

Route::post('/ideas', function () {

    $idea = Idea::create([
        'description' => request('idea'),
        'state' => 'pending'
    ]);

    return redirect('/');
});

Route::get('/delete-ideas', function () {
    session()->forget('ideas');

    return redirect('/');
});
