<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class Service extends Model
{
    use HasFactory;
    protected $fillable=['id','name', 'description', 'price','installation_price', 'cable_type_id'];

    protected $guarded = [];

    public function CableType(){
        return $this->belongsTo('App\Models\CableType');
    }

    public function ServiceProvider(){
        return $this->hasMany('App\Models\ServiceProvider');
    }
}
