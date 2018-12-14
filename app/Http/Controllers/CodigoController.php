<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use App\Codigo;
class CodigoController extends Controller
{
    public function index(Request $request)
    {
        if(!$request->ajax()) return redirect('/');
        $buscar = $request->buscar;
        $criterio = $request->criterio;
        
        if ($buscar==''){
            $codigos = Codigo::orderBy('id', 'desc')->paginate(10);
        }
        else{
            $codigos = Codigo::where($criterio, 'like', '%'. $buscar . '%')->orderBy('id', 'desc')->paginate(10);
        }
        return[
            'pagination' =>[
                'total'         => $codigos->total(),
                'current_page'  => $codigos->currentPage(),
                'per_page'      => $codigos->perPage(),
                'last_page'     => $codigos->lastPage(),
                'from'          =>$codigos->firstItem(),
                'to'            =>$codigos->lastItem(),
            ],
            'codigos'=>$codigos
        ];
    }

    public function store(Request $request)
    {
        if(!$request->ajax()) return redirect('/');

        $codigo = new Codigo();
        $codigo->nombre=$request->nombre;
        $codigo->descripcion=$request->descripcion;
        $codigo->condicion='1';
        $codigo->save();

    }


    public function update(Request $request)
    {
        if(!$request->ajax()) return redirect('/');
        $codigo=Codigo::findOrFail($request->id);
        $codigo->nombre=$request->nombre;
        $codigo->descripcion=$request->descripcion;
        $codigo->condicion='1';
        $codigo->save();
    }

    public function activar(Request $request){
        if(!$request->ajax()) return redirect('/');
        $codigo=Codigo::findOrFail($request->id);
        $codigo->condicion='1';
        $codigo->save();
    }
    public function desactivar (Request $request){
        if(!$request->ajax()) return redirect('/');
        $codigo=Codigo::findOrFail($request->id);
        $codigo->condicion='0';
        $codigo->save();
    }
}
