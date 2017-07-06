<?php

use Illuminate\Database\Seeder;

use Library\Publisher;

class PublisherTableSeeder extends Seeder
{
    /**
     * Run the database seeds.
     *
     * @return void
     */
    public function run()
    {
        factory(Publisher::class, 50)->create();
    }
}
