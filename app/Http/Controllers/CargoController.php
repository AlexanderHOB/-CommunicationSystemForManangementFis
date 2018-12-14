<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use App\Cargo;

class CargoController extends Controller
{
    /**
     * Display a listing of the resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function index(Request $request)
    {
        if(!$request->ajax()) return redirect('/');
        $buscar = $request->buscar;
        $criterio = $request->criterio;
        
        if ($buscar==''){
            $cargos = Cargo::orderBy('id', 'desc')->paginate(10);
        }
        else{
            $cargos = Cargo::where($criterio, 'like', '%'. $buscar . '%')->orderBy('id', 'desc')->paginate(10);
        }
        return[
            'pagination' =>[
                'total'         => $cargos->total(),
                'current_page'  => $cargos->currentPage(),
                'per_page'      => $cargos->perPage(),
                'last_page'     => $cargos->lastPage(),
                'from'          =>$cargos->firstItem(),
                'to'            =>$cargos->lastItem(),
            ],
            'cargos'=>$cargos
        ];
    }
    public function selectCargo(Request $request){
        $cargos=Cargo::where('condicion','=','1')
        ->select('id','nombre')
        ->orderBy('nombre','asc')->get();

        return ['cargos'=>$cargos];
    }
    public function store(Request $request)
    {
        if(!$request->ajax()) return redirect('/');

        $cargo = new Cargo();
        $cargo->nombre=$request->nombre;
        $cargo->descripcion=$request->descripcion;
        $cargo->condicion='1';
        $cargo->save();

    }


    public function update(Request $request)
    {
        if(!$request->ajax()) return redirect('/');
        $cargo=Cargo::findOrFail($request->id);
        $cargo->nombre=$request->nombre;
        $cargo->descripcion=$request->descripcion;
        $cargo->condicion='1';
        $cargo->save();
    }

    public function activar(Request $request){
        if(!$request->ajax()) return redirect('/');
        $cargo=Cargo::findOrFail($request->id);
        $cargo->condicion='1';
        $cargo->save();
    }
    public function desactivar (Request $request){
        if(!$request->ajax()) return redirect('/');
        $cargo=Cargo::findOrFail($request->id);
        $cargo->condicion='0';
        $cargo->save();
    }
}
