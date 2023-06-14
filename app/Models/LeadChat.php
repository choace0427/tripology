<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class LeadChat extends Model
{
    use HasFactory;

    protected $fillable = [
        'lead_id',
        'sender_id',
        'receiver_id',
        'message',
    ];
  
    public function package(){
        return $this->belongsTo('App\Models\Admin\Package');
    }

    public function chat()
    {
        return $this->belongsTo(Lead::class, 'lead_id');
    }
}
