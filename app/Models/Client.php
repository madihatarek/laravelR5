<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;
use Illuminate\Database\Eloquent\SoftDeletes;

class Client extends Model
{
    use HasFactory, SoftDeletes;
    protected $fillable = [
        'clientName',
        'phone',
        'email',
        'website',
        'city_id',
        'active',
        'image',
        'address',
    ];
     public function city(){
        return $this->belongsTo(City::class);
        
     } 
}
