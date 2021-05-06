<?php


namespace App\Contracts\Services\Transactions;


use App\Models\Webservice;

interface TransactionServiceInterface
{
    public function create(Webservice $webservice, $amount);

    public function update();
}