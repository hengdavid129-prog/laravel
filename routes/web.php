<?php

// use Illuminate\Http\Request;
// use Illuminate\Support\Facades\Request;
use Illuminate\Support\Facades\Route;

Route::get('/', function () {
    $ideas = session()->get('ideas', []);
    return view('ideas', [
        'ideas' => $ideas
    ]);

});

Route::post('/ideas', function () {
    // $idea = Request::input('idea');
    $idea = request('idea');

    session()->push('ideas', $idea);

    return redirect('/');
});

// Route::post('/ideas', function (Request $request) {
//     dd($request->idea);
// });

Route::get('/delete-ideas', function () {
    session()->forget('ideas');

    return redirect('/');
});
