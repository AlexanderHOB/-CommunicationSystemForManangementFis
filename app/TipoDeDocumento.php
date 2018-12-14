<?php

namespace App;

use Illuminate\Database\Eloquent\Model;

class TipoDeDocumento extends Model
{
    protected $table = 'tipodedocumentos';
    protected $fillable=['nombre','descripcion','condicion'];

    public function documentos(){
        return $this->hasMany('App\Documento');
    }
}
