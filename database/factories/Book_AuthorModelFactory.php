<?php

/*
|--------------------------------------------------------------------------
| Model Factories
|--------------------------------------------------------------------------
|
| Here you may define all of your model factories. Model factories give
| you a convenient way to create models for testing and seeding your
| database. Just tell the factory how a default model should look.
|
*/

/** @var \Illuminate\Database\Eloquent\Factory $factory */
$factory->define(Library\Book_Author::class, function (Faker\Generator $faker) {

    return [
        'book_id' => rand(1, 50),
        'author_id' => rand(1, 50),
    ];
});
