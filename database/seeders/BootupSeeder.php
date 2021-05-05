<?php

namespace Database\Seeders;

use Illuminate\Database\Seeder;

class BootupSeeder extends Seeder
{
    /**
     * Run the database seeds.
     *
     * @return void
     */
    public function run()
    {

        Transaction::factory()
            ->count(100)
            ->create();
    }
}
