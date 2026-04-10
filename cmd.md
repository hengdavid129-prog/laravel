// create table on databse

>php artisan make:migration
    create_ideas_table

>php artisan migrate

// open database GUI
>open database/database.sqlite

// revise existing table by rollback and running new migration (delete all existing data from table)

>php artisan migrate:refresh

// add new column to table by create new migration (keep existing data in table)

>php artisan make:migration add_state_to_idea_table
>php artisan migrate

// Make Idea Controller
>php artisan make:controller
 >Resource
 >Idea

// Generate a new Form Request Class
>php artisan make:request
    StoreIdeaRequest

// Generate a new RegisterUserController
>php artisan make:controller
    >Auth/RegisterUserController

// Generate a SessionsController
>php artisan make:controller
    >Auth/SessionController

// Refresh our migrations from scratch 
>php artisan migrate:fresh  // That also wipee your record

 // Use Auth::user() to access the currently authenticated user

// This is hust a tiny bit about Model factories.
// reach for model and say call this factoring method to quickly whip up effectively a dummy user record and then persist it in the database
// it's grabbing fake data and this is incredibly useful for local development and especially testing down the road.

 >php artisan tinker
 >App\Models\User::factory()->create()

 // Define the relationship with Eloquent
 // create a method in Models/Idea.php

    // define the relationship an idea belong to user
    public function user(): BelongsTo
    {
        return $this->belongsTo(User::class);
    }

    // test this in the terminal
    > php artisan tinker
        // find the first idea in database
        > $idea = App\Models\Idea::first()      // show the first idea in database
        > $idea->user;      // access the user that create the idea. behind the scenes that going to perform a database query SELECT * FROM user WHERE id = 2;

    // the inverse if we have user instance and we want to access their ideas
    // in Models/User.php

    public function ideas(): HasMany
    {
        return $this->hasMany(Idea::class);
    }

    // testing in terminal
    > php artisan tinker
        > $user = App\Models\User::first();
        > $user->ideas;      // User idea could return one or many ideas so we get the collection of items

    // grab the first idea
    > $user->ideas[0];

    // grab the description
    >$user->ideas[0]->description;


