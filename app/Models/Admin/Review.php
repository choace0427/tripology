<?php

namespace App\Models\Admin;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class Review extends Model
{
    use HasFactory;

    protected $fillable = [
        'package_id',
        'rating',
        'review',
        'reviewer_name',
        'reviewer_email',
    ];

    public function package(){
        return $this->belongsTo('App\Models\Admin\Package');
    }
}
