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
$factory->define(Library\Loan::class, function (Faker\Generator $faker) {
    static $password;

    return [
        'book_id' => rand(1, 50),
        'reader_id' => rand(1, 50),
        'withdrawal_at' => $faker->datetime(),
        'return_date' => $faker->datetime(),
        'user_id' => rand(1, 50),
    ];
});
