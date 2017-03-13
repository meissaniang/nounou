<?php

namespace App;

use Illuminate\Database\Eloquent\Model;

class Nanny extends Model
{
    protected $table = 'nannies';
    protected $fillable = ['user_id', 'licence', 'experience','feeding_bottle','kitchen','exam','animal','housework','guard'];

    public function user(){
        return $this->belongsTo('Cartalyst\Sentinel\Users\EloquentUser');
    }
    public function ads(){
        return $this->hasMany('App\Ad');
    }
}
