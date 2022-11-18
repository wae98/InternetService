<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class StatusRouter extends Model
{
    use HasFactory;

    protected $fillable=['id', 'name', 'description'];

    protected $guarded = [];

    public function router(){
        return $this->hasMany('App\Models\Router');
    }

}
