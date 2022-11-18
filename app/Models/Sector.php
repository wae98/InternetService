<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class Sector extends Model
{
    use HasFactory;

    protected $fillable = ['id', 'name', 'payment_date'];

    protected $guarded = [];

    public function customer(){
        return $this->hasMany('App\Models\Customer');
    }
}
