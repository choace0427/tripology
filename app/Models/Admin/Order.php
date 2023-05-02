<?php

namespace App\Models\Admin;

use Illuminate\Database\Eloquent\Model;

class Order extends Model
{
    protected $fillable = [
        'traveller_id',
        'package_id',
        'txnid',
        'original_currency_name',
        'original_currency_sign',
        'original_price',
        'paid_amount',
        'fee_amount',
        'net_amount',
        'card_last4',
        'card_exp_month',
        'card_exp_year',
        'payment_method',
        'payment_status',
        'total_person',
        'order_no'
    ];

}
