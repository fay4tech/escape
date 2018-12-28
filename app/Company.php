<?php

namespace App;

use Illuminate\Database\Eloquent\Model;

class Company extends Model
{
    protected $fillable = ['*'];
    public function rooms(){
        return $this->hasMany('App\Room');
    }
    public function users(){
        return$this->hasMany('App\User');
    }
}
