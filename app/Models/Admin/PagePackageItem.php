<?php

namespace App\Models\Admin;

use Illuminate\Database\Eloquent\Model;

class PagePackageItem extends Model
{
    protected $fillable = [
        'name',
        'detail',
        'status',
        'seo_title',
        'seo_meta_description'
    ];

}
