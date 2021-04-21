<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class Transaction extends Model
{
    use HasFactory;
    protected $table = 'transactions';
    protected $fillable = [
        'client_id', 'paid_amount',
        'balance', 'payment_method', 'user_id',
        'transac_amount', 'transac_date'
    ];
}
