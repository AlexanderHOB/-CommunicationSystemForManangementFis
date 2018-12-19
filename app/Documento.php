<?php

namespace App;

use Illuminate\Database\Eloquent\Model;

class Documento extends Model
{
    protected $fillable=['idtipodocumento','nombre','descripcion','ubicacion','condicion','idproceso'];
    public function tipoDeDocumento(){
        return $this->belongsTo('App\TipoDeDocumento');
    }
    public function proceso(){
        return $this->belongsTo('App\Proceso');
    }
    public function shares(){
        return $this->hasMany('App\Share');
    }
}
