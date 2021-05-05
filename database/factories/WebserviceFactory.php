<?php

namespace Database\Factories;

use App\Models\Transaction;
use App\Models\Webservice;
use Illuminate\Database\Eloquent\Factories\Factory;

class WebserviceFactory extends Factory
{
    /**
     * The name of the factory's corresponding model.
     *
     * @var string
     */
    protected $model = Webservice::class;

    /**
     * Define the model's default state.
     *
     * @return array
     */
    public function definition()
    {
        return [
          'name' => 'webservice_' . random_int(100000,1000000)
        ];
    }
}
