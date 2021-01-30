<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use App;
use App\User;
use App\Paciente;

class OrtodonciaController extends Controller
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
        $ortodoncias = App\Ortodoncia::get(); //obtener todos los ortodoncias      
        return view('ortodoncias/index',compact('ortodoncias'));
    }

    /**
     * Show the form for creating a new resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function create()
    {
        $empleados = App\User::get();
        $pacientes = App\Paciente::get();
        return view('ortodoncias/crear',compact('empleados','pacientes'));
    }

    /**
     * Store a newly created resource in storage.
     *
     * @param  \Illuminate\Http\Request  $request
     * @return \Illuminate\Http\Response
     */
    public function store(Request $request)
    {
        $request->validate([
            'paciente_id'    => 'required|unique:ortodoncias,paciente_id',
        ]);
        
        $ortodonciaNuevo = new App\Ortodoncia;
        $ortodonciaNuevo->paciente_id = $request->paciente_id;
        $ortodonciaNuevo->motivo = $request->motivo;
        $ortodonciaNuevo->diagnostico = $request->diagnostico;
        $ortodonciaNuevo->objetivos = $request->objetivos;
        $ortodonciaNuevo->plan_tratamiento = $request->plan_tratamiento;
        $ortodonciaNuevo->aparatologia = $request->aparatologia;
        $ortodonciaNuevo->presupuesto = $request->presupuesto;
        $ortodonciaNuevo->inicial = $request->inicial;
        $ortodonciaNuevo->cuota = $request->cuota;
        $ortodonciaNuevo->creado_por = auth()->user()->usuario;
        $ortodonciaNuevo->save();
        return back()->with('mensaje', 'Creado correctamente');
    }

    /**
     * Display the specified resource.
     *
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function show($id)
    {
        $ortodoncia = App\Ortodoncia::withTrashed()->findOrFail($id);
        return view('ortodoncias/detalles',compact('ortodoncia'));
    }

    /**
     * Show the form for editing the specified resource.
     *
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function edit($id)
    {
        $ortodoncia = App\Ortodoncia::withTrashed()->findOrFail($id);
        return view('ortodoncias/editar',compact('ortodoncia'));
    }

    /**
     * Update the specified resource in storage.
     *
     * @param  \Illuminate\Http\Request  $request
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function update(Request $request, $id)
    {
        $request->validate([
            'nombre'   => 'required|unique:ortodoncias,nombre,'.$id,
            'precio_recomendado' => 'required',
        ]);
        
        $ortodoncia = App\Ortodoncia::withTrashed()->findOrFail($id);

        $ortodoncia->nombre = $request->nombre;
        $ortodoncia->descripcion = $request->descripcion;
        $ortodoncia->precio_recomendado = $request->precio_recomendado;
        $ortodoncia->editado_por = auth()->user()->usuario;
        $ortodoncia->save();
        return back()->with('mensaje', 'Ortodoncia actualizado correctamente');
    }

    /**
     * Remove the specified resource from storage.
     *
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function destroy($id)
    {
        $ortodoncia = App\Ortodoncia::findOrFail($id);
        $ortodoncia->eliminado_por = auth()->user()->usuario;
        $ortodoncia->save(); //para que guarde la información de quién lo eliminó
        $ortodoncia->delete();
        return back()->with("deleted" , $id ); //usa deleted para mostrar en la vista la opción de restaurarlo
    }

    public function restore($id) //restaurar un registro borrado
    {
        //Indicamos que la busqueda se haga en los registros eliminados con withTrashed
        $ortodoncia = App\Ortodoncia::withTrashed()->where('id', '=', $id)->first();
  
        //Restauramos el registro
        $ortodoncia->eliminado_por = null;
        $ortodoncia->editado_por = auth()->user()->usuario;
        $ortodoncia->restore();
  
        return back()->with('mensaje', 'Ortodoncia restaurado correctamente');
    }

    public function verEliminados()
    {  
        $ortodoncias = App\Ortodoncia::onlyTrashed()->get(); //obtener solo eliminados 
        return view('ortodoncias/eliminados',compact('ortodoncias'));
    }
}
