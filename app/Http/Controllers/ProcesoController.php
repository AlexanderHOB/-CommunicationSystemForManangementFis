<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use App\Proceso;
use Auth;
class ProcesoController extends Controller
{
    public function index(Request $request)
    {
       if(!$request->ajax()) return redirect('/');
        $buscar = $request->buscar;
        $criterio = $request->criterio;
        
        if ($buscar==''){
            $procesos = Proceso::join('users','procesos.iduser','=','users.id')
            ->select('procesos.nombre','procesos.periodo','procesos.id','users.id as userid','users.usuario','procesos.condicion')
            ->orderBy('procesos.id', 'desc')->paginate(10);
        }
        else{
            $procesos = Proceso::join('users','procesos.iduser','=','users.id')
            ->select('procesos.nombre','procesos.periodo','procesos.id','users.id as userid','users.usuario','procesos.condicion')
            ->where('procesos.'.$criterio, 'like', '%'. $buscar . '%')
            ->orderBy('procesos.id', 'desc')->paginate(10);
        }
        return[
            'pagination' =>[
                'total'         => $procesos->total(),
                'current_page'  => $procesos->currentPage(),
                'per_page'      => $procesos->perPage(),
                'last_page'     => $procesos->lastPage(),
                'from'          =>$procesos->firstItem(),
                'to'            =>$procesos->lastItem(),
            ],
            'procesos'=>$procesos
        ];
    }
    public function procesoCargo(Request $request)
    {
       if(!$request->ajax()) return redirect('/');
        $buscar = $request->buscar;
        $criterio = $request->criterio;
        
        if ($buscar==''){
            $procesos = Proceso::join('users','procesos.iduser','=','users.id')
            ->select('procesos.nombre','procesos.periodo','procesos.id','users.id as userid','users.usuario','procesos.condicion')
            ->where('users.id','=',Auth::id())
            ->orderBy('procesos.id', 'desc')->paginate(10);
        }
        else{
            $procesos = Proceso::join('users','procesos.iduser','=','users.id')
            ->select('procesos.nombre','procesos.periodo','users.id as userid','procesos.id', 'user.nombre as nombre_user','procesos.condicion')
            ->where('procesos.'.$criterio, 'like', '%'. $buscar . '%')
            ->where('users.id','=',Auth::id())
            ->orderBy('proceso.id', 'desc')->paginate(10);
        }
        return[
            'pagination' =>[
                'total'         => $procesos->total(),
                'current_page'  => $procesos->currentPage(),
                'per_page'      => $procesos->perPage(),
                'last_page'     => $procesos->lastPage(),
                'from'          =>$procesos->firstItem(),
                'to'            =>$procesos->lastItem(),
            ],
            'procesos'=>$procesos
        ];
    }
    public function selectProceso(){
        //if(!$request->ajax()) return redirect('/');
        $procesos=Proceso::where('condicion','=','1')
        ->select('id','nombre')->orderBy('nombre','asc')->get();
        return ['procesos'=>$procesos];
    }
    public function store(Request $request)
    {
        if(!$request->ajax()) return redirect('/');

        $proceso = new Proceso();
        $proceso->iduser=$request->iduser;
        $proceso->nombre=$request->nombre;
        $proceso->periodo=$request->periodo;
        $proceso->condicion='1';
        $proceso->save();

    }


    public function update(Request $request)
    {
        if(!$request->ajax()) return redirect('/');
        $proceso=Proceso::findOrFail($request->id);
        $proceso->iduser=$request->iduser;
        $proceso->nombre=$request->nombre;
        $proceso->periodo=$request->periodo;
        $proceso->condicion='1';
        $proceso->save();
        $proceso->save();
    }

    public function activar(Request $request){
        if(!$request->ajax()) return redirect('/');
        $proceso=Proceso::findOrFail($request->id);
        $proceso->condicion='1';
        $proceso->save();
    }
    public function desactivar (Request $request){
        if(!$request->ajax()) return redirect('/');
        $proceso=Proceso::findOrFail($request->id);
        $proceso->condicion='0';
        $proceso->save();
    }
}
