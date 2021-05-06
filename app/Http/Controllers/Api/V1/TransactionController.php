<?php

namespace App\Http\Controllers\Api\V1;

use App\Http\Controllers\Controller;
use App\Http\Requests\TransactionRequest;
use App\Http\Resources\LastMonthTransactionStatisticsResource;
use App\Http\Resources\PosTransactionResource;
use App\Http\Resources\WebTransactionResource;
use App\Repositories\Transactions\TransactionRepository;
use App\Repositories\Webservices\WebserviceRepository;
use App\Services\Transactions\CreateMobileTransaction;
use App\Services\Transactions\CreatePosTransaction;
use App\Services\Transactions\CreateWebTransaction;
use App\Tools\ResponseTool;

class TransactionController extends Controller
{

    public $posTransaction;

    public $webTransaction;

    public $mobileTransaction;

    public $transactionRepository;

    public $webserviceRepository;

    public function __construct(
        CreatePosTransaction $posTransaction,
        CreateMobileTransaction $createMobileTransaction,
        CreateWebTransaction $createWebTransaction,
        TransactionRepository $transactionRepository,
        WebserviceRepository $webserviceRepository,
    )
    {
        $this->posTransaction = $posTransaction;
        $this->mobileTransaction = $createMobileTransaction;
        $this->webTransaction = $createWebTransaction;
        $this->transactionRepository = $transactionRepository;
        $this->webserviceRepository = $webserviceRepository;
    }

    //we get transaction number one because The Test(in pdf) doesn't specify
    // we should create transactions for which one of Webservices
    public function createPosTransaction(TransactionRequest $request)
    {
        $amount = $request->get('amount');
        $webservice = $this->webserviceRepository->find(1);
        return ResponseTool::response(
            200,
            new PosTransactionResource($this->posTransaction->create($webservice,$amount))
        );
    }


    //we get transaction number one because The Test(in pdf) doesn't specify
    // we should create transactions for which one of Webservices
    public function createWebTransaction(TransactionRequest $request)
    {
        $amount = $request->get('amount');
        $webservice = $this->webserviceRepository->find(1);
        return ResponseTool::response(
            200,
            new WebTransactionResource($this->webTransaction->create($webservice,$amount))
        );
    }

    //we get transaction number one because The Test(in pdf) doesn't specify
    // we should create transactions for which one of Webservices
    public function createMobileTransaction(TransactionRequest $request)
    {
        $amount = $request->get('amount');
        $webservice = $this->webserviceRepository->find(1);
        return ResponseTool::response(
            201,
            new WebTransactionResource($this->mobileTransaction->create($webservice,$amount))
        );
    }




    public function transactions()
    {
        return ResponseTool::response(
            200,
            new LastMonthTransactionStatisticsResource($this->transactionRepository->getLastMonthStatistics())
        );
    }
}
