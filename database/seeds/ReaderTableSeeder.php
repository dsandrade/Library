<?php

use Illuminate\Database\Seeder;

use Library\Reader;

class ReaderTableSeeder extends Seeder
{
    /**
     * Run the database seeds.
     *
     * @return void
     */
    public function run()
    {
        factory(Reader::class, 50)->create();
    }
}
