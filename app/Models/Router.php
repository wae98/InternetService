<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class Router extends Model
{
    use HasFactory;

    protected $fillable=['id', 'onu_number', 'onu_type','onu_position','identification','mac_address', 'ip_number', 'vlan', 'pon_number', 'slot', 'color_pictel', 'status_router_id'];

    protected $guarded = [];


    public function StatusRouter(){
        return $this->belongsTo('App\Models\StatusRouter');
    }

    public function ServiceProvider(){
        return $this->belongsTo('App\Models\ServiceProvider');
    }
}
