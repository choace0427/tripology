<?php

namespace App\Models\Admin;

use Illuminate\Database\Eloquent\Model;

class Blog extends Model
{
    protected $fillable = [
        'category_id',
        'blog_title',
        'blog_slug',
        'blog_content',
        'blog_content_short',
        'blog_photo',
        'comment_show',
        'seo_title',
        'seo_meta_description'
    ];

    public function category()
    {
        return $this->belongsTo('App\Models\Admin\Category');
    }

}
