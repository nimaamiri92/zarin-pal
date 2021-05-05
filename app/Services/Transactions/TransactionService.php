<?php


namespace App\Services\Transactions;


use App\Contracts\Transactions\Components\TransactionTypeInterface;
use App\Contracts\Transactions\TransactionServiceInterface;
use App\Models\Webservice;

class TransactionService implements TransactionServiceInterface
{

    public $transaction;

    public function __construct(TransactionTypeInterface $transactionType)
    {
        $this->transaction = $transactionType;
    }

    public function create(Webservice $webservice,$amount)
    {
        return $this->transaction->createTransaction($webservice,$amount);
    }

    public function update()
    {
        // TODO: Implement update() method.
    }
}