<?php

namespace App\Http\Controllers\Api\V1;

use App\Http\Controllers\Controller;
use App\Http\Requests\TransactionRequest;
use App\Http\Resources\PosTransactionResource;
use App\Http\Resources\WebTransactionResource;
use App\Models\Webservice;
use App\Services\Transactions\CreateMobileTransaction;
use App\Services\Transactions\CreatePosTransaction;
use App\Services\Transactions\CreateWebTransaction;
use App\Tools\ResponseTool;
use Illuminate\Http\Resources\Json\JsonResource;

class TransactionController extends Controller
{

    public $posTransaction;

    public $webTransaction;

    public $mobileTransaction;

    public function __construct(
        CreatePosTransaction $posTransaction,
        CreateMobileTransaction $createMobileTransaction,
        CreateWebTransaction $createWebTransaction
    )
    {
        $this->posTransaction = $posTransaction;
        $this->mobileTransaction = $createMobileTransaction;
        $this->webTransaction = $createWebTransaction;
    }

    public function createPosTransaction(TransactionRequest $request)
    {
        $amount = $request->get('amount');
        $webservice = Webservice::query()->get()->first();
        return ResponseTool::response(
            200,
            new PosTransactionResource($this->posTransaction->create($webservice,$amount))
        );
    }

    public function createWebTransaction(TransactionRequest $request)
    {
        $amount = $request->get('amount');
        $webservice = Webservice::query()->get()->first();
        return ResponseTool::response(
            200,
            new WebTransactionResource($this->webTransaction->create($webservice,$amount))
        );
    }


    public function createMobileTransaction(TransactionRequest $request)
    {
        $amount = $request->get('amount');
        $webservice = Webservice::query()->get()->first();
        return ResponseTool::response(
            201,
            new WebTransactionResource($this->mobileTransaction->create($webservice,$amount))
        );
    }
}
