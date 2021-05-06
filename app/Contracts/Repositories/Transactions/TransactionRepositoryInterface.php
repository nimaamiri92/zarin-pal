<?php


namespace App\Contracts\Repositories\Transactions;


interface TransactionRepositoryInterface
{
    public function show();

    public function index();
}