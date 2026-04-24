<?php

namespace App\Http\Controllers;

use App\Http\Requests\IdeaRequest;
use App\Models\Idea;
use App\Notifications\IdeaPublished;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Auth;
use Illuminate\Support\Facades\Gate;
use function Laravel\Prompts\notify;

class IdeaController extends Controller
{
    /**
     * Display a listing of the resource.
     */
    public function index()
    {
        // $idea = Idea::query()->where([
        //     'user_id' =>Auth::id(),
        // ])->get();

        return view('ideas.index', [
            'ideas' => Auth::user()->ideas,
        ]);
    }

    /**
     * Show the form for creating a new resource.
     */
    public function create()
    {
        return view('ideas.create');
    }

    /**
     * Store a newly created resource in storage.
     */
    public function store(IdeaRequest $request)
    {
        // $request->validate([
        //     'description' => ['required', 'min:10'],
        // ]);

        // Idea::create([
        //     'description' => request('description'),
        //     'state' => 'pending',
        //     'user_id' => Auth::id()
        // ]);

        $idea = Auth::user()->ideas()->create([
            'description' => request('description'),
            'state'=> 'pending',
        ]);

        // notify the user
        Auth::user()->notify(new IdeaPublished($idea));

        return redirect('/ideas');
    }

    /**
     * Display the specified resource.
     */
    public function show(Idea $idea)
    {
        Gate::authorize('update', $idea);

        return view('ideas.show', [
            'idea' => $idea
        ]);
    }

    /**
     * Show the form for editing the specified resource.
     */
    public function edit(Idea $idea)
    {
        Gate::authorize('update', $idea);
        return view('ideas.edit', [
            'idea'=> $idea
        ]);
    }

    /**
     * Update the specified resource in storage.
     */
    public function update(IdeaRequest $request, Idea $idea)
    {
        Gate::authorize('update', $idea);
        $validatedData = $request->validated();

        $idea->update($validatedData);

        return redirect("/ideas/{$idea->id}");
    }

    /**
     * Remove the specified resource from storage.
     */
    public function destroy(Idea $idea)
    {
        Gate::authorize('update', $idea);
        $idea->delete();
        return redirect('/ideas');
    }
}
