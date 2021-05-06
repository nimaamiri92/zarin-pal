<?php


namespace App\Services\Transactions;


use App\Services\Transactions\TransactionTypes\MobileTransaction;

class CreateMobileTransaction extends TransactionService
{
    public function __construct(MobileTransaction $posTransaction)
    {
        parent::__construct($posTransaction);
    }
}