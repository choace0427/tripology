<?php

namespace App\Models\Admin;

use Illuminate\Database\Eloquent\Model;

class Faq extends Model
{
    protected $fillable = [
        'faq_title',
        'faq_content',
        'faq_order'
    ];

}
