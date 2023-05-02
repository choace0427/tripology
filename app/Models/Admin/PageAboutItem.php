<?php

namespace App\Models\Admin;

use Illuminate\Database\Eloquent\Model;

class PageAboutItem extends Model
{
    protected $fillable = [
        'name',
        'detail',
        'status',
        'seo_title',
        'seo_meta_description'
    ];

}
