<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use App\Share;
use Auth;
class ShareController extends Controller
{
    public function index(Request $request)
    {
        //if(!$request->ajax()) return redirect('/');
        $buscar = $request->buscar;
        $criterio = $request->criterio;
        
        if ($buscar==''){
            $shares = Share::join('documentos','shares.iddocumento','=','documentos.id')
            ->join('users','shares.iduser','=','users.id')
            ->join('procesos','documentos.idproceso','=','procesos.id')
            ->join('tipoDeDocumentos','documentos.idtipodocumento','=','tipoDeDocumentos.id')
            ->select('documentos.id as id_documento','documentos.nombre','documentos.descripcion','documentos.ubicacion','documentos.condicion','tipoDeDocumentos.nombre as nombre_tipo','procesos.nombre as nombre_proceso'
            ,'users.usuario','users.id as id_user','shares.id')
            ->where('shares.iduser','=',Auth::id())
            ->where('shares.condicion','=','1')
            ->orderBy('documentos.id', 'desc')->paginate(10);
        }
        else{
            $shares = Share::join('documentos','shares.iddocumento','=','documentos.id')
            ->join('users','shares.iduser','=','users.id')
            ->join('procesos','documentos.idproceso','=','procesos.id')
            ->join('tipoDeDocumentos','documentos.idtipodocumento','=','tipoDeDocumentos.id')
            ->select('documentos.id as id_documento','documentos.nombre','documentos.descripcion','documentos.condicion','tipoDeDocumentos.nombre as nombre_tipo','procesos.nombre as nombre_proceso'
            ,'users.usuario','users.id as id_user')
            ->where('documentos.'.$criterio, 'like', '%'. $buscar . '%')->orderBy('id', 'desc')
            ->where('shares.iduser','=',Auth::id())
            ->where('shares.condicion','=','1')
            ->orderBy('documentos.id', 'desc')->paginate(10);
        }
        return[
            'pagination' =>[
                'total'         => $shares->total(),
                'current_page'  => $shares->currentPage(),
                'per_page'      => $shares->perPage(),
                'last_page'     => $shares->lastPage(),
                'from'          =>$shares->firstItem(),
                'to'            =>$shares->lastItem(),
            ],
            'documentos'=>$shares
        ];
    }
    

    public function store(Request $request)
    {
        if(!$request->ajax()) return redirect('/');

        $share = new Share();
        $share->iduser=$request->iduser;
        $share->iddocumento=$request->iddocumento;
        $share->condcion='1';
        $share->save();
    }

    public function delete(Request $request){
        if(!$request->ajax()) return redirect('/');
        $share=Share::findOrFail($request->id);
        $share->condicion='0';
        $share->save();
    }
}
