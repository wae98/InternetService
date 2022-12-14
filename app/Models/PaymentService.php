<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class PaymentService extends Model
{
    use HasFactory;

    protected $fillable = ['id', 'date', 'observations', 'total', 'user_id', 'service_provider_id'];

    protected $guarded = [];

    public function user(){
        return $this->belongsTo('App\Models\User');
    }

    public function ServiceProvider(){
        return $this->belongsTo('App\Models\ServiceProvider');
    }
}
