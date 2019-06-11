<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use App\Documento;
use Auth;
class DocumentoController extends Controller
{
    public function index(Request $request)
    {
        if(!$request->ajax()) return redirect('/');
        $buscar = $request->buscar;
        $criterio = $request->criterio;
        
        if ($buscar==''|| $buscar=='undefined' || $criterio=='undefined'){
            $documentos = Documento::join('tipoDeDocumentos','documentos.idtipodocumento','=','tipoDeDocumentos.id')
            ->join('procesos','documentos.idproceso','=','procesos.id')
            ->select('documentos.id','documentos.idtipodocumento','documentos.idproceso','documentos.nombre','documentos.descripcion','documentos.ubicacion','documentos.condicion','tipoDeDocumentos.nombre as nombre_tipo','procesos.nombre as nombre_proceso')
            ->orderBy('documentos.id', 'desc')->paginate(10);
        }
        else{
            $documentos = Documento::join('tipoDeDocumentos','documentos.idtipodocumento','=','tipoDeDocumentos.id')
            ->select('documentos.id','documentos.idtipodocumento','documentos.idproceso','documentos.nombre','documentos.descripcion','documentos.ubicacion','documentos.condicion','tipoDeDocumentos.nombre as nombre_tipo')
            ->where('documentos.'.$criterio, 'like', '%'. $buscar . '%')->orderBy('id', 'desc')
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
    public function documentoCargo(Request $request)
    {
        if(!$request->ajax()) return redirect('/');
        $buscar = $request->buscar;
        $criterio = $request->criterio;
        
        if ($buscar==''){
            $documentos = Documento::join('tipoDeDocumentos','documentos.idtipodocumento','=','tipoDeDocumentos.id')
            ->join('procesos','documentos.idproceso','=','procesos.id')
            ->select('documentos.id','documentos.idtipodocumento','documentos.idproceso','documentos.nombre','documentos.descripcion','documentos.ubicacion','documentos.condicion','tipoDeDocumentos.nombre as nombre_tipo','procesos.nombre as nombre_proceso')
            ->where('procesos.iduser','=',Auth::id())
            ->orderBy('documentos.id', 'desc')->paginate(10);
        }
        else{
            $documentos = Documento::join('tipoDeDocumentos','documentos.idtipodocumento','=','tipoDeDocumentos.id')
            ->select('documentos.id','documentos.idtipodocumento','documentos.idproceso','documentos.nombre','documentos.descripcion','documentos.ubicacion','documentos.condicion','tipoDeDocumentos.nombre as nombre_tipo')
            ->where('articulos.'.$criterio, 'like', '%'. $buscar . '%')->orderBy('id', 'desc')
            ->where('procesos.iduser','=',Auth::id())
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
    //     if($request->file('file'))
    //    {
    //       $image = $request->file('file');
    //       $name = time().$image->getClientOriginalName();
    //       $image->move(public_path().'/images/', $name); 
    //     }
        $image=$request->pic;
        $name = time().$image->getClientOriginalName();
        $image->move(public_path().'/images/', $name);

        $documento = new Documento();
        $documento->idtipodocumento=$request->idtipodocumento;
        $documento->nombre=$request->nombre;
        $documento->descripcion=$request->descripcion;
        $documento->ubicacion=$name;
        $documento->idproceso=$request->idproceso;
        $documento->condicion='1';
        $documento->save();
   
    return response(['fileextension'=>$image]);

    }


    public function update(Request $request)
    {
        if(!$request->ajax()) return redirect('/');
        $documento=Documento::findOrFail($request->id);
        $documento->idtipodocumento=$request->idtipodocumento;
        $documento->nombre=$request->nombre;
        $documento->descripcion=$request->descripcion;
        $documento->idproceso=$request->idproceso;
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
    public function observar(Request $request){
        $documento=Documento::findOrFail($request->id);
        $pdf=$documento->ubicacion;
        return view('pdf',compact('pdf'));

    }
}
