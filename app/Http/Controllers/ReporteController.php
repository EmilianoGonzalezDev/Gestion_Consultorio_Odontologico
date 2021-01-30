<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use App;
use DB;
use App\Exports\InsumosExport;
use App\Exports\PacientesExport;

use Maatwebsite\Excel\Facades\Excel;


class ReporteController extends Controller 
{
    public function __construct()
    {
        $this->middleware('auth');
    }

    
    /**
     * Display a listing of the resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function index()
    {
        //$atenciones = app\Atencion::get(); //obtener todos los atenciones      
        return view('reportes/index');
    }

    public function exportInsumosBajoStock() 
    {
        return Excel::download(new InsumosExport, 'insumos_con_bajo_stock.xlsx');
    }

    public function mostrarPacientesPorFecha(Request $request) 
    {
        $fechaInicial = $request->fechaincial;
        $fechaFinal = $request->fechafinal;
        $atenciones = App\Atencion::get();
        return view('reportes/pacientesatendidosfecha',compact('fechaInicial','fechaFinal','atenciones'));
    }

    public function exportPacientesPorFecha() 
    {
        return Excel::download(new PacientesExport, 'pacientes_atendidos_en_periodo.xlsx');
    }

    public function ingresoDeEfectivo() 
    {
        $anios =  DB::select('SELECT distinct YEAR(fecha) AS anio FROM pagos');
        $ganancias = DB::select('SELECT YEAR(fecha) AS anio, MONTH(fecha) AS mes, SUM(monto) AS monto FROM pagos GROUP BY YEAR(fecha), MONTH(fecha)');

        return view('reportes/ingresodeefectivo',compact('ganancias','anios'));
    }

    public function PacientesPorNacimiento() 
    {
        $años = DB::select('SELECT count(*) AS cantidad, year(fechanacimiento) AS anio FROM pacientes GROUP BY(year(fechanacimiento)) ');
        return view('reportes/pacientespornacimiento',compact('años'));
    }
}