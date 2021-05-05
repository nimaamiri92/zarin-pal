<?php


namespace App\Services\Transactions;


use App\Services\Transactions\Components\PosTransaction;

class CreatePosTransaction extends TransactionService
{
    public function __construct(PosTransaction $posTransaction)
    {
        parent::__construct($posTransaction);
    }
}