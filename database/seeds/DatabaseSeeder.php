<?php

use Illuminate\Database\Seeder;

class DatabaseSeeder extends Seeder
{
    /**
     * Run the database seeds.
     *
     * @return void
     */
    public function run()
    {
         $this->call(UserTableSeeder::class);
         $this->call(AuthorTableSeeder::class);
         $this->call(ReaderTableSeeder::class);
         $this->call(PublisherTableSeeder::class);
         $this->call(BookTableSeeder::class);
         $this->call(Book_AuthorTableSeeder::class);
         $this->call(LoanTableSeeder::class);
    }
}
