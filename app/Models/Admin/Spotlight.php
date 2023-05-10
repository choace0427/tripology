<?php

namespace App\Models\Admin;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class Spotlight extends Model
{
    protected $fillable = [
        'spotlight_heading',
        'spotlight_text',
        'spotlight_deal_text',
        'spotlight_facilities',
        'spotlight_facilities_photo'
    ];
}
