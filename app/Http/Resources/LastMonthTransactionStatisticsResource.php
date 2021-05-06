<?php

namespace App\Http\Resources;

use App\Services\Transactions\TransactionTypes\MobileTransaction;
use App\Services\Transactions\TransactionTypes\PosTransaction;
use App\Services\Transactions\TransactionTypes\WebTransaction;
use Illuminate\Http\Resources\Json\JsonResource;
use \stdClass as newObject;

class LastMonthTransactionStatisticsResource extends JsonResource
{

    public function toArray($request)
    {
        return [
            'transactions' => $this->parseLastMonthTransactionBaseOnPrice(),
            'summary' => $this->parseTotalStatistics()
        ];
    }

    private function parseLastMonthTransactionBaseOnPrice()
    {
        $result = new newObject;
        foreach ($this->lastMonthTransactionBaseOnPrice as $eachPriceRange){
            $result->{$eachPriceRange->price_group} = $eachPriceRange->sum;
        }

        return $result;
    }


    private function parseTotalStatistics()
    {
        $result = new newObject;
        $result->amount = 0;

        foreach ($this->totalStatistics as $eachStatistic) {
            $result->amount += $eachStatistic->sum;

            switch ($eachStatistic->type){
                case MobileTransaction::Mobile_TRANSACTION:
                    $result->mobile_count = $eachStatistic->count;
                    break;
                case WebTransaction::WEB_TRANSACTION:
                    $result->web_count = $eachStatistic->count;
                    break;
                case PosTransaction::POS_TRANSACTION:
                    $result->pos_count = $eachStatistic->count;
                    break;
            }
        }


        return $result;
    }
}
