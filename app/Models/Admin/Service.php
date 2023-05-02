<?php

namespace App\Models\Admin;

use Illuminate\Database\Eloquent\Model;

class Service extends Model
{
    protected $fillable = [
        'name',
        'slug',
        'description',
        'short_description',
        'photo',
        'icon',
        'seo_title',
        'seo_meta_description'
    ];

}
