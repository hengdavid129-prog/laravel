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



