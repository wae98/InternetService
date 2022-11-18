<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class PersonalReference extends Model
{
    use HasFactory;

    protected $fillable = ['id', 'names', 'phone_number', 'customer_id'];

    protected $guarded = [];

    public function customer(){
        return $this->belongsTo('App\Models\Customer');
    }

}
