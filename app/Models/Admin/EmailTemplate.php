<?php

namespace App\Models\Admin;

use Illuminate\Database\Eloquent\Model;

class EmailTemplate extends Model
{
    protected $fillable = [
        'et_subject',
        'et_content',
        'et_name'
    ];

}
