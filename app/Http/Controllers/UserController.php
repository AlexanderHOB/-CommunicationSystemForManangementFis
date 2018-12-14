<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use App\{User,Persona};
use Illuminate\Support\Facades\DB;
class UserController extends Controller
{
    public function index(Request $request)
    {
        //if(!$request->ajax()) return redirect('/');
        $buscar = $request->buscar;
        $criterio = $request->criterio;
        
        if ($buscar==''){
            $users = User::join('personas','users.id','=','personas.id')
            ->join('roles','users.idrol','=','roles.id')
            ->join('cargos','personas.idcargo','=','cargos.id')
            ->select('personas.id','personas.nombre','personas.email','personas.celular','users.usuario','users.password','users.condicion','roles.nombre as nombre_rol','cargos.nombre as nombre_cargo')
            ->orderBy('id', 'desc')->paginate(10);
        }
        else{
            $users = $users = User::join('personas','user.id','=','personas.id')
            ->join('roles','users.idrol','=','roles.id')
            ->join('cargos','personas.idcargo','=','cargos.id')
            ->select('personas.id','personas.nombre','personas.email','personas.celular','users.usuario','users.password','users.condicion','roles.nombre as nombre_rol','cargos.nombre as nombre_cargo')
            ->where('personas.'.$criterio, 'like', '%'. $buscar . '%')
            ->orderBy('personas.id', 'desc')
            ->paginate(10);
        }
        return[
            'pagination' =>[
                'total'         => $users->total(),
                'current_page'  => $users->currentPage(),
                'per_page'      => $users->perPage(),
                'last_page'     => $users->lastPage(),
                'from'          =>$users->firstItem(),
                'to'            =>$users->lastItem(),
            ],
            'users'=>$users
        ];
    }
    public function selectUser(Request $request){
        if(!$request->ajax()) return redirect('/');
        $users=User::where('condicion','=','1')
        ->select('id','usuario')->orderBy('usuario','asc')->get();
        return ['users'=>$users];
    }
    public function store(Request $request)
    {
        if(!$request->ajax()) return redirect('/');
        try{
            $persona = new Persona();
            $persona->nombre=$request->nombre;
            $persona->email=$request->email;
            $persona->celular=$request->celular;
            $persona->idcargo=$request->idcargo;
            $persona->save();

            $user=new User();
            $user->usuario=$request->usuario;
            $user->password=bcrypt($request->password);
            $user->condicion='1';
            $user->idrol=$request->idrol;
            $user->id=$persona->id;
            $user->save();

            DB::commit();
        }catch(Exception $e){
            DB:rollBack();
        }
        
    }


    public function update(Request $request)
    {
        if(!$request->ajax()) return redirect('/');
        $user=User::findOrFail($request->id);

        $persona=Persona::findOrFail($user->id);
        $persona->nombre=$request->nombre;
        $persona->email=$request->email;
        $persona->celular=$request->celular;
        $persona->idcargo=$request->idcargo;
        $persona->save();

        $user->usuario=$request->usuario;
        $user->password=bcrypt($request->password);
        $user->condicion='1';
        $user->idrol=$request->idrol;
        $user->save();
    }
    public function activar(Request $request){
        if(!$request->ajax()) return redirect('/');
        $user=User::findOrFail($request->id);
        $user->condicion='1';
        $user->save();
    }
    public function desactivar (Request $request){
        if(!$request->ajax()) return redirect('/');
        $user=User::findOrFail($request->id);
        $user->condicion='0';
        $user->save();
    }
}
