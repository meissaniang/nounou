<?php

namespace App;

use Illuminate\Database\Eloquent\Model;

class Planning extends Model
{
    protected $table = 'plannings';
    protected $fillable = ['planning', 'nanny_id'];
    public function nany(){
        return $this->belongsTo('App\Nanny');
    }
}
