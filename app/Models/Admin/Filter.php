<?php

namespace App\Models\Admin;

use Illuminate\Database\Eloquent\Model;

class Filter extends Model
{
    protected $table = 'filter_option';

    protected $fillable = [
        'filter_name',
        'filter_type',
        'filter_slug',
    ];
}