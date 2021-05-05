<?php


namespace App\Contracts\Transactions\Components;


use App\Models\Webservice;

interface TransactionTypeInterface
{
    public function createTransaction(Webservice $webservice,$amount);
}