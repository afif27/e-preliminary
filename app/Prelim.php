<?php

namespace App;

use Illuminate\Database\Eloquent\Model;

class Prelim extends Model
{
    protected $table = "prelims";
    public function aircraft(){
        return $this->belongsToMany('App\Aircraft');
        }
}
