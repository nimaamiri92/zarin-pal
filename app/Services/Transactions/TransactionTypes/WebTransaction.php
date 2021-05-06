<?php


namespace App\Services\Transactions\TransactionTypes;


use App\Contracts\Services\Transactions\Components\TransactionTypeInterface;
use App\Models\Webservice;

class WebTransaction implements TransactionTypeInterface
{
    const WEB_TRANSACTION = 0;

    public function createTransaction(Webservice $webservice, $amount)
    {
        return $webservice->transactions()->create([
            'amount' => $amount,
            'type' => self::WEB_TRANSACTION
        ]);
    }
}