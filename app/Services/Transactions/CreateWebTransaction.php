<?php


namespace App\Services\Transactions;

use App\Services\Transactions\Components\WebTransaction;

class CreateWebTransaction extends TransactionService
{
    public function __construct(WebTransaction $posTransaction)
    {
        parent::__construct($posTransaction);
    }
}