<?php

namespace App;

use Illuminate\Database\Eloquent\Model;

class Aircraft extends Model
{
    protected $table = "aircrafts";
    public function prelim(){
        return $this->belongsToMany('App\Prelim');
        }
}
