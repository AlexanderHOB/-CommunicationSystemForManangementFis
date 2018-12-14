<?php

namespace App;

use Illuminate\Database\Eloquent\Model;

class Proceso extends Model
{
    protected $fillable=[
        'id',
        'nombre',
        'periodo',
        'iduser'];

    public function user(){
        return $this->belongsTo('App\User');
    }
    public function documentos(){
        return $this->hasMany('App\Documento');
    }
}
