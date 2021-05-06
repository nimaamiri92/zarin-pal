<?php


namespace App\Repositories\Transactions;

use App\Models\Transaction;
use App\Repositories\BaseRepository;
use Carbon\Carbon;
use Illuminate\Support\Facades\DB;
use \stdClass as newObject;

class TransactionRepository extends BaseRepository
{
    public function __construct(Transaction $transaction)
    {
        parent::__construct($transaction);
        $this->model = $transaction;
    }


    public function getLastMonthStatistics()
    {
        $result =  new newObject();
        $result->totalStatistics = $this->getLastMonthTotalTransactionStatistics();
        $result->lastMonthTransactionBaseOnPrice = $this->getLastMonthTransactionBaseOnPrice();

        return $result;
    }


    /********************************************************************************************
     *                          private functions
     ********************************************************************************************/
    private function getLastMonthTransactionBaseOnPrice()
    {
        return DB::select("
                            select range_query.price_group, sum(amount) as sum from (
                                select amount,
                                    case
                                        when amount between 0 and 5000 then '0to5000'
                                        when amount between 5000 and 10000 then '5000to10000'
                                        when amount between 10000 and 100000 then '10000to100000'
                                        else '100000toup' 
                                    end as price_group
                                from transactions 
                            ) range_query
                    group by range_query.price_group
                ");
    }

    private function getLastMonthTotalTransactionStatistics()
    {
        return $this
            ->model
            ->newQuery()
            ->select([
                DB::raw('SUM("amount")'),
                DB::raw('COUNT("type")'),
                'type',
            ])
            ->groupBy('type')
            ->get();
    }
}