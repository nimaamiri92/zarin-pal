<?php

namespace App\Http\Requests;

use Illuminate\Foundation\Http\FormRequest;

class TransactionRequest extends BaseRequest
{
    public function postRule()
    {
        return [
          'amount' => [
              'required',
              'integer'
          ]
        ];
    }
}
