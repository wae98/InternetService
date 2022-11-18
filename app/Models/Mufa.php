<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class Mufa extends Model
{
    use HasFactory;

    protected $fillable = ['id', 'ubication', 'number', 'is_cable_onu', 'position_onu_olt', 'number_conexion'];

    protected $guarded = [];

    public function ServiceProvider(){
        return $this->belongsTo('App\Models\ServiceProvider');
    }

}
