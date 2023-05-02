<?php

namespace App\Models\Admin;

use Illuminate\Database\Eloquent\Model;

class Subscriber extends Model
{
    protected $fillable = [
        'subs_email',
        'subs_token',
        'subs_active'
    ];

}
