<?php

namespace App;

use Illuminate\Database\Eloquent\Model;

class Prelim extends Model
{
    public function Aircraft(){
        return $this->belongsToMany('App\Aircraft');
        }
}
