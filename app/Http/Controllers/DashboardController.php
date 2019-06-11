<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use Illuminate\Support\Facades\DB;

class DashboardController extends Controller
{
    public function __invoke(Request $request)
    {
        $anio=date('Y');
        $ingresos=DB::table('documentos as d')
        ->select(DB::raw('DAY(d.updated_at) as dia'),
        DB::raw('MONTH(d.updated_at) as mes'),
        DB::raw('COUNT(d.id) as cantidad'))
        ->whereYear('d.updated_at',$anio)
        ->groupBy(DB::raw('DAY(d.updated_at)'),DB::raw('MONTH(d.updated_at)'))
        ->get();

        $logeo=DB::table('historial as h')
        ->join('users','users.id','=','h.usuario_id')
        ->select(DB::raw('COUNT(h.usuario_id) as logeos, users.usuario'),
        DB::raw('DAY(h.date_login) as dia'))
        ->whereYear('h.date_login',$anio)
        ->groupBy(DB::raw('DAY(h.date_login)'),DB::raw('h.usuario_id'),DB::raw('users.usuario'))
        ->get();

        return ['ingresos'=>$ingresos,'anio'=>$anio,'logeo'=>$logeo];      

    }
}
