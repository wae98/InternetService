<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class Fail extends Model
{
    use HasFactory;

    protected $fillable = ['id', 'service_provider_id', 'status', 'user_id', 'date_repair', 'date_report'];

    protected $guarded = [];

    public function ServiceProvider(){
        return $this->belongsTo('App\Models\ServiceProvider');
    }

    public function user(){
        return $this->belongsTo('App\Models\User');
    }
}
