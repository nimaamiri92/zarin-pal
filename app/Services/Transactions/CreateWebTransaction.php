<?php


namespace App\Services\Transactions;

use App\Services\Transactions\TransactionTypes\WebTransaction;

class CreateWebTransaction extends TransactionService
{
    public function __construct(WebTransaction $posTransaction)
    {
        parent::__construct($posTransaction);
    }
}