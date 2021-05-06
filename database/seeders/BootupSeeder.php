<?php

namespace Database\Seeders;

use App\Models\Transaction;
use App\Models\Webservice;
use Database\Factories\TransactionFactory;
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
        Webservice::factory()->count(500)
            ->has(
                TransactionFactory::times(random_int(1,10000))
            )
            ->create();

    }
}
