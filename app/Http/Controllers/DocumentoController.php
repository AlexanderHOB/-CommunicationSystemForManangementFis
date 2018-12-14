<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use App\Documento;
class DocumentoController extends Controller
{
    public function index(Request $request)
    {
       // if(!$request->ajax()) return redirect('/');
        $buscar = $request->buscar;
        $criterio = $request->criterio;
        
        if ($buscar==''){
            $documentos = Documento::join('tipoDeDocumentos','documentos.idtipodocumento','=','tipoDeDocumentos.id')
            ->join('procesos','documentos.idproceso','=','procesos.id')
            ->select('documentos.id','documentos.idtipodocumento','documentos.idproceso','documentos.nombre','documentos.descripcion','documentos.ubicacion','documentos.condicion','tipoDeDocumentos.nombre as nombre_tipo','procesos.nombre as nombre_proceso')
            ->orderBy('documentos.id', 'desc')->paginate(10);
        }
        else{
            $documentos = Documento::join('tipoDeDocumentos','documentos.idtipodocumento','=','tipoDeDocumentos.id')
            ->select('documentos.id','documentos.idtipodocumento','documentos.idproceso','documentos.nombre','documentos.descripcion','documentos.ubicacion','documentos.condicion','tipoDeDocumentos.nombre as nombre_tipo')
            ->where('articulos.'.$criterio, 'like', '%'. $buscar . '%')->orderBy('id', 'desc')
            ->orderBy('documentos.id', 'desc')->paginate(10);
        }
        return[
            'pagination' =>[
                'total'         => $documentos->total(),
                'current_page'  => $documentos->currentPage(),
                'per_page'      => $documentos->perPage(),
                'last_page'     => $documentos->lastPage(),
                'from'          =>$documentos->firstItem(),
                'to'            =>$documentos->lastItem(),
            ],
            'documentos'=>$documentos
        ];
    }

    public function store(Request $request)
    {
        if(!$request->ajax()) return redirect('/');

        $documento = new Documento();
        $documento->idtipodocumento=$request->idtipodocumento;
        $documento->nombre=$request->nombre;
        $documento->descripcion=$request->descripcion;
        $documento->ubicacion=$request->ubicacion;
        $documento->idproceso='1';
        $documento->condicion='1';
        $documento->save();

    }


    public function update(Request $request)
    {
        if(!$request->ajax()) return redirect('/');
        $documento=Documento::findOrFail($request->id);
        $documento->idtipodocumento=$request->idtipodocumento;
        $documento->nombre=$request->nombre;
        $documento->descripcion=$request->descripcion;
        $documento->ubicacion=$request->ubicacion;
        $documento->condicion='1';
        $documento->save();
    }

    public function activar(Request $request){
        if(!$request->ajax()) return redirect('/');
        $documento=Documento::findOrFail($request->id);
        $documento->condicion='1';
        $documento->save();
    }
    public function desactivar (Request $request){
        if(!$request->ajax()) return redirect('/');
        $documento=Documento::findOrFail($request->id);
        $documento->condicion='0';
        $documento->save();
    }
}
