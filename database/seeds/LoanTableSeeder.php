<?php

use Illuminate\Database\Seeder;

use Library\Loan;

class LoanTableSeeder extends Seeder
{
    /**
     * Run the database seeds.
     *
     * @return void
     */
    public function run()
    {
        factory(Loan::class, 50)->create();
    }
}
