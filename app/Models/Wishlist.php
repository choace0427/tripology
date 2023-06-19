<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class Wishlist extends Model
{
    use HasFactory;

    protected $table = "wishlists";

    public function traveller(){
        return $this->belongsTo(Traveller::class);
    }

    public function package(){
        return $this->belongsTo('App\Models\Admin\Package'::class);
    }
}
