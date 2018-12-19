<?php

namespace App;

use Illuminate\Database\Eloquent\Model;

class Share extends Model
{

    protected $table = 'shares';
    protected $fillable=['id','iduser','iddocumento','condicion'];
    public function user(){
        return $this->belongsTo('App\User');
    }
    public function documento(){
        return $this->belongsTo('App\Documento');
    }
}
