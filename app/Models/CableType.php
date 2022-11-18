<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class CableType extends Model
{
    use HasFactory;

    protected $fillable=['id','name'];

    protected $guarded = [];

    public function service(){
        return $this->hasMany('App\Models\Service');
    }
}
