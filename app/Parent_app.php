<?php

namespace App;

use Illuminate\Database\Eloquent\Model;

class Parent_app extends Model
{
    protected $table = 'parents';
    protected $fillable = ['user_id', 'nbre_child', 'baby','handicap','min_age','max_age'];
    public function user(){
        return $this->belongsTo('Cartalyst\Sentinel\Users\EloquentUser');
    }

}
