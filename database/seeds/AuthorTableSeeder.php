<?php

use Illuminate\Database\Seeder;

use Library\Author;

class AuthorTableSeeder extends Seeder
{
    /**
     * Run the database seeds.
     *
     * @return void
     */
    public function run()
    {
        factory(Author::class, 50)->create();
    }
}
