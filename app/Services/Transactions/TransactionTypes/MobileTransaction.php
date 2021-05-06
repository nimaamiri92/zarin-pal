<?php


namespace App\Services\Transactions\TransactionTypes;

use App\Contracts\Services\Transactions\Components\TransactionTypeInterface;
use App\Models\Webservice;

class MobileTransaction implements TransactionTypeInterface
{
    const Mobile_TRANSACTION = 1;

    public function createTransaction(Webservice $webservice, $amount)
    {
        return $webservice->transactions()->create([
            'amount' => $amount,
            'type' => self::Mobile_TRANSACTION
        ]);
    }
}