<?php

namespace App\Models\Admin;

use Illuminate\Database\Eloquent\Model;

class Admin extends Model
{
    protected $fillable = [
        'name',
        'email',
        'password',
        'token',
        'photo',
        'company_name',
        'username',
        'website',
        'city',
        'country',
        'phone',
        'description',
        'company_legal_name',
        'head_office_location',   
        'address_1',
        'address_2',
        'base_currency',
        'best_describe_your_company',
        'sell_your_adventures',
        'adventures_days',
        'adventure_info',
        'employee_own_guides',
        'own_transport',
        'own_hotels',
        'full_name',
        'email_address',
        'location',
        'operation_hours'
    ];

}
