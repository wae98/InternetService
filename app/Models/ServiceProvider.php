<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class ServiceProvider extends Model
{
    use HasFactory;

    protected $fillable = ['id', 'customer_id', 'service_id', 'router_id', 'user_id', 'mufa_id', 'status', 'observations'];

    protected $guarded = [];

    public function service(){
        return $this->belongsTo('App\Models\Service');
    }

    public function router(){
        return $this->belongsTo('App\Models\Router');
    }

    public function customer(){
        return $this->belongsTo('App\Models\Customer');
    }

    public function mufa(){
        return $this->belongsTo('App\Models\Mufa');
    }

    public function user(){
        return $this->belongsTo('App\Models\User');
    }

    public function fail(){
        return $this->hasMany('App\Models\Fail');
    }

    public function PaymentService(){
        return $this->hasMany('App\Models\PaymentService');
    }

}
