<?php

namespace App;

use Illuminate\Database\Eloquent\Model;

class Nanny extends Model
{
    protected $table = 'nannies';
    protected $fillable = ['user_id', 'licence', 'experience','Feeding_bottle','kitchen','exam','animal','Housework','guard'];

    public function user(){
        return $this->belongsTo('Cartalyst\Sentinel\Users\EloquentUser');
    }
}
