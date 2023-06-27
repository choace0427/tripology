<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class Lead extends Model
{
    use HasFactory;

    protected $fillable = [
        'package_id',
        'traveller_id',
        'agency_id',
        'first_name',
        'last_name',
        'phone_number',
        'email', 
        'start_date',
        'end_date'
    ];
  
    public function package(){
        return $this->belongsTo('App\Models\Admin\Package');
    }

    public function operator(){
        return $this->belongsTo('App\Models\Admin\Admin','agency_id');
    }

    public function chat()
    {
        return $this->hasMany(LeadChat::class);
    }

    public function traveller()
    {
        return $this->belongsTo(Traveller::class);
    }
}
