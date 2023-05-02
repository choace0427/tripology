<?php

namespace App\Models\Admin;

use Illuminate\Database\Eloquent\Model;

class Slider extends Model
{
    protected $fillable = [
        'slider_heading',
        'slider_text',
        'slider_button_text',
        'slider_button_url',
        'slider_photo'
    ];

}
