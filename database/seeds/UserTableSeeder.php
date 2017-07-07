<?php

use Illuminate\Database\Seeder;

use Library\User;
use Illuminate\Support\Facades\Hash;

class UserTableSeeder extends Seeder
{
    /**
     * Run the database seeds.
     *
     * @return void
     */
    public function run()
    {
        DB::table('users')
            ->insert([
                'name' => 'Daniel',
                'login' => 'dandrade',
                'password' => Hash::make('dandrade'),
            ]);

        factory(User::class, 50)->create();

    }
}
