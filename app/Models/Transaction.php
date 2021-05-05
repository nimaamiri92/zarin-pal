<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class Transaction extends Model
{
    use HasFactory;

    protected $table = 'transactions';

    protected $fillable = [
        'amount',
        'type',
        'webservice_id'
    ];

    public function webservices()
    {
        return $this->hasMany(Transaction::class);
    }
}
