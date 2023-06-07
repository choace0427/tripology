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
        'phone'

    ];

}
