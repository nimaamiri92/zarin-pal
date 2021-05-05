<?php

namespace Database\Factories;

use App\Models\Transaction;
use App\Models\Webservice;
use Illuminate\Database\Eloquent\Factories\Factory;

class TransactionFactory extends Factory
{
    /**
     * The name of the factory's corresponding model.
     *
     * @var string
     */
    protected $model = Transaction::class;

    /**
     * Define the model's default state.
     *
     * @return array
     */
    public function definition()
    {
        return [
            'amount' => random_int(100000,1000000),
            'type' => random_int(0,2),
            'webservice_id' => Webservice::factory()
        ];
    }
}
