<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class Customer extends Model
{
    use HasFactory;

    protected $fillable = ['id', 'names', 'phone_number', 'address', 'references_address', 'sector_id', 'user_id'];

    protected $guarded = [];

    public function sector(){
        return $this->belongsTo('App\Models\Sector');
    }

    public function user(){
        return $this->belongsTo('App\Models\User');
    }

    public function PersonalReference(){
        return $this->hasMany('App\Models\PersonalReference');
    }
    public function ServiceProvider(){
        return $this->hasMany('App\Models\ServiceProvider');
    }


}
