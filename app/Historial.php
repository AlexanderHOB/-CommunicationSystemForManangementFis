<?php

namespace App;

use Illuminate\Database\Eloquent\Model;

class Historial extends Model
{
    protected $table ='historial';
    protected $fillable=[
        'usuario_id',
        'date_login'
    ];
    public $timestamps=false;

    public function user(){
        return $this->belongsTo('App\User');
    }
}
