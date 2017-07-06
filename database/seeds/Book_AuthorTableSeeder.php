<?php

use Illuminate\Database\Seeder;

use Library\Book_Author;

class Book_AuthorTableSeeder extends Seeder
{
    /**
     * Run the database seeds.
     *
     * @return void
     */
    public function run()
    {
        factory(Book_Author::class, 50)->create();
    }
}
