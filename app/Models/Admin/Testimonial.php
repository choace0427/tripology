<?php

namespace App\Models\Admin;

use Illuminate\Database\Eloquent\Model;

class Testimonial extends Model
{
    protected $fillable = [
        'name',
        'designation',
        'photo',
        'comment'
    ];

}
