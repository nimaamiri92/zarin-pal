<?php


namespace App\Contracts\Services\Transactions\Components;


use App\Models\Webservice;

interface TransactionTypeInterface
{
    public function createTransaction(Webservice $webservice,$amount);
}