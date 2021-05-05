<?php


namespace App\Services\Transactions\Components;


use App\Contracts\Transactions\Components\TransactionTypeInterface;
use App\Models\Webservice;

class PosTransaction implements TransactionTypeInterface
{
    const POS_TRANSACTION = 2;

    public function createTransaction(Webservice $webservice, $amount)
    {
        return $webservice->transactions()->create([
            'amount' => $amount,
            'type' => self::POS_TRANSACTION
        ]);
    }
}