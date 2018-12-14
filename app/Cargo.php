<?php

namespace App;

use Illuminate\Database\Eloquent\Model;

class Cargo extends Model
{
    protected $fillable=['nombre','descripcion','condicion'];
    public function personas(){
        return $this->hasMany('App\Persona');
    }
}
