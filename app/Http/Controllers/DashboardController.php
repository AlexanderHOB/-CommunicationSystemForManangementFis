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

        $cargos=DB::table('procesos as p')
        ->select(DB::raw('MONTH(v.fecha_hora) as mes'),
        DB::raw('YEAR(v.fecha_hora) as anio'),
        DB::raw('SUM(v.total) as total'))
        ->whereYear('v.fecha_hora',$anio)
        ->groupBy(DB::raw('MONTH(v.fecha_hora)'),DB::raw('YEAR(v.fecha_hora)'))
        ->get();

        return ['ingresos'=>$ingresos,'anio'=>$anio];      

    }
}
