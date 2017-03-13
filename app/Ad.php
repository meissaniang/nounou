<?php

namespace App;

use Illuminate\Database\Eloquent\Model;

class Ad extends Model
{
    protected $table = 'ads';
    protected $fillable = ['title', 'ad', 'frequence','occasional_price','full_time_price','nanny_id'];
    public function nanny(){
        return $this->belongsTo('App\Nanny');
    }
}
