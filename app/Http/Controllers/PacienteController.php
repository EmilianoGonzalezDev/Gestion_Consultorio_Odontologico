<?php

namespace App\Http\Controllers;


use Illuminate\Http\Request;
use Carbon\Carbon;
use App;

class PacienteController extends Controller
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
        $pacientes = App\Paciente::get();        
        return view('pacientes/index',compact('pacientes'));
    }


    /**
     * Show the form for creating a new resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function create()
    {
        return view('pacientes/crear');
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
            'nombre'    => 'required',
            'apellido'  => 'required',
            'dni'       => 'required|unique:pacientes,dni', //controla que dni sea requerido y único en tabla pacientes.
        ]);
        
        $pacienteNuevo = new App\Paciente;
        $pacienteNuevo->nombre = $request->nombre;
        $pacienteNuevo->apellido = $request->apellido;
        $pacienteNuevo->dni = $request->dni;
        $pacienteNuevo->direccion = $request->direccion;
        $pacienteNuevo->telefono = $request->telefono;
        $pacienteNuevo->email = $request->email;
        if ($request->fechanacimiento) $pacienteNuevo->fechanacimiento = $request->fechanacimiento;
        $pacienteNuevo->ocupacion = $request->ocupacion;
        $pacienteNuevo->estado_civil = $request->estado_civil;
        $pacienteNuevo->genero = $request->genero;
        $pacienteNuevo->cobertura = $request->cobertura;
        $pacienteNuevo->detalles = $request->detalles; //Como enfermedades, adicciones, medicación
        $pacienteNuevo->comentarios = $request->comentarios; //Algún comentario particular
        $pacienteNuevo->creado_por = auth()->user()->usuario;
        $pacienteNuevo->save();

        return back()->with('mensaje', 'paciente agregado correctamente');
    }

    /**
     * Display the specified resource.
     *
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function show($id)
    {
        //$atenciones = App\Atencion::get()->where('paciente_id', '=', $id);
        
        $paciente = App\Paciente::withTrashed()->findOrFail($id);
        $empleados = App\User::get();
        $pacientes = App\Paciente::get();
        $atenciones = App\Paciente::withTrashed()->find($id)->atenciones;
        $nomeclaturas = App\Nomeclatura::get();
        //$ortodoncia = App\Ortodoncia::find($id)->ortodoncia; //este falla cuando no hay ficha asociada
        $ortodoncia = App\Ortodoncia::get()->where('paciente_id', '=', $id)->first();
        //$deuda = App\Paciente::deuda(1); // NO
        return view('pacientes/detalles',compact('paciente','pacientes','atenciones','empleados','ortodoncia','nomeclaturas'));
    }

    /**
     * Show the form for editing the specified resource.
     *
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function edit($id)
    {
        $paciente = App\Paciente::findOrFail($id); //no es withTrashed()
        return view('pacientes/editar',compact('paciente'));
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
            'nombre' => 'required',
            'apellido' => 'required',
            'dni' => 'required|unique:pacientes,dni,'.$id, //controla que dni sea requerido y único en tabla pacientes
                                                          //excepto para el valor actual de dni (eso se logra con .$id)
        ]);
        
        $paciente = App\Paciente::findOrFail($id); //no es withTrashed()
        
        $paciente->nombre = $request->nombre;
        $paciente->apellido = $request->apellido;
        $paciente->dni = $request->dni;
        $paciente->direccion = $request->direccion;
        $paciente->telefono = $request->telefono;
        $paciente->email = $request->email;
        if ($request->fechanacimiento) $paciente->fechanacimiento = $request->fechanacimiento;
        $paciente->ocupacion = $request->ocupacion;
        if ($request->estado_civil) $paciente->estado_civil = $request->estado_civil;
        if ($request->genero) $paciente->genero = $request->genero;
        $paciente->cobertura = $request->cobertura;
        $paciente->detalles = $request->detalles; 
        $paciente->comentarios = $request->comentarios; 
        $paciente->editado_por = auth()->user()->usuario;
        $paciente->save();

        return back()->with('mensaje', 'paciente actualizado correctamente');
    }

    /**
     * Remove the specified resource from storage.
     *
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function destroy($id)
    {
        $paciente = App\Paciente::findOrFail($id);
        $paciente->eliminado_por = auth()->user()->usuario;
        $paciente->save(); //para que guarde la información de quién lo eliminó
        $paciente->delete();
        return back()->with("deleted" , $id ); //usa deleted para mostrar en la vista la opción de restaurarlo
    }

    public function restore($id) //restaurar un registro borrado
    {
        //Indicamos que la busqueda se haga en los registros eliminados con withTrashed
        $paciente = App\Paciente::withTrashed()->where('id', '=', $id)->first();
  
        //Restauramos el registro
        $paciente->eliminado_por = null;
        $paciente->editado_por = auth()->user()->usuario;
        $paciente->restore();
  
        return back()->with('mensaje', 'paciente restaurado correctamente');
    }

    public function verEliminados()
    {  
        $pacientes = App\Paciente::onlyTrashed()->get(); //obtener solo eliminados
        return view('pacientes/eliminados',compact('pacientes'));
    }

}
