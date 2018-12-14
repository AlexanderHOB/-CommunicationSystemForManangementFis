<?php

namespace App;

use Illuminate\Database\Eloquent\Model;

class Persona extends Model
{
    protected $fillable=['iduser','nombre','email','celular'];
    
    public function cargo(){
        return $this->belongsTo('App\Cargo');
    }
    public function user(){
        return $this->hasOne('App\User');
    }
}
