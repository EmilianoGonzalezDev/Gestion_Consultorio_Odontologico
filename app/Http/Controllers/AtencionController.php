<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use App;
use App\User;
use App\Paciente;
use App\Insumo;
use App\Pago;
use App\Nomeclatura;
use Carbon\Carbon;
use Maatwebsite\Excel\Concerns\ToArray;

use function Complex\add;

class AtencionController extends Controller
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
        $atenciones = app\Atencion::get(); //obtener todos los atenciones      
        return view('atenciones/index', compact('atenciones'));
    }

    /**
     * Show the form for creating a new resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function create()
    {
        //$empleados = App\User::orderBy('nombre')->get();
        $empleados = App\User::get();
        $pacientes = App\Paciente::get();
        $nomeclaturas = App\Nomeclatura::orderBy('nomeclatura')->get();
        return view('atenciones/crear', compact('empleados', 'pacientes','nomeclaturas'));
    }

    public function createByID($id)
    {
        $empleados = App\User::get();
        $paciente = App\Paciente::findOrFail($id);
        $nomeclaturas = App\Nomeclatura::get();
        return view('atenciones/crear', compact('empleados', 'paciente','nomeclaturas'));
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
            'user_id' => ['required', 'integer'],
            'paciente_id' => ['required', 'integer'],
            'importe' => ['nullable', 'integer', 'min:0', 'max:999999'],
            'pago' => ['nullable', 'integer', 'min:0', 'max:999999'], //To-Do: limitarlo (menos que importe)
            //To-Do: *Nomeclaturas*
            //'cubierto_obra_social' => ['required', 'boolean'],
            'detalle' => ['nullable', 'string', 'max:40'],
            'fecha' => ['required','date'],
            'hora' => ['required','string'],
            'proximo_turno' => ['nullable','date'],
        ]);

        $atencionNuevo = new app\Atencion; //crea nueva instancia de atencion
        $atencionNuevo->user_id = $request->user_id; //guarda lo del formulario
        $atencionNuevo->paciente_id = $request->paciente_id;
        //To-Do: Guardar Listado de Serviciosprestados (Nomeclaturas)
        if ($request->importe) {
            $atencionNuevo->importe = $request->importe;
        } else {
            $atencionNuevo->importe = 0;
        }
        $atencionNuevo->pago = 0; //luego se aumenta con la función guardarPago()
        $atencionNuevo->fecha = $request->fecha;
        $atencionNuevo->hora = $request->hora;
        $atencionNuevo->proximo_turno = $request->proximo_turno;
        $atencionNuevo->creado_por = auth()->user()->usuario;
        $atencionNuevo->save();

        //Guardar Pago
        if ($request->monto > 0) {
            $request->atencion_id = $atencionNuevo->id;
            $this->guardarPago($request);
        }

        //Guardar Servicios prestados (nomeclaturas)
        if (isset($request->serviciosPrestados))
        {
            $this->guardarServiciosPrestados($request->serviciosPrestados,$atencionNuevo->id);
        }

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
        $atencion = App\Atencion::withTrashed()->findOrFail($id);
        $paciente = App\Paciente::withTrashed()->findOrFail($atencion->paciente_id);
        $profesional = App\User::withTrashed()->findOrFail($atencion->user_id);
        $pagos = App\Pago::get()->where('atencion_id', '=', $id);
        return view('atenciones/detalles', compact('atencion', 'paciente', 'profesional', 'pagos'));
    }

    /**
     * Show the form for editing the specified resource.
     *
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function edit($id)
    {
        $atencion = App\Atencion::findOrFail($id); //no es withTrashed()
        return view('atenciones/editar', compact('atencion'));
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
        $atencion = App\Atencion::findOrFail($id); //no es withTrashed()
        //To-Do: Editar nomeclaturas/servicios prestados
        $atencion->proximo_turno = $request->proximo_turno;
        $atencion->editado_por = auth()->user()->usuario;
        $atencion->save();

        return back()->with('mensaje', 'registro de atención actualizado correctamente');
    }

    /**
     * Remove the specified resource from storage.
     *
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function destroy($id)
    {
        $atencion = App\Atencion::findOrFail($id);
        $atencion->eliminado_por = auth()->user()->usuario;
        $atencion->save(); //para que guarde la información de quién lo eliminó
        $atencion->delete();
        return back()->with("deleted", $id); //usa deleted para mostrar en la vista la opción de restaurarlo
    }

    public function restore($id) //restaurar un registro borrado
    {
        $atencion = App\Atencion::withTrashed()->where('id', '=', $id)->first();
        //$atencion = App\Atencion::findOrFail($id);
        $atencion->eliminado_por = null;
        $atencion->restore();

        return back()->with('mensaje', 'registro restaurado correctamente');
    }

    public function verEliminados()
    {
        $atenciones = App\Atencion::onlyTrashed()->get(); //con trashed da error
        return view('atenciones/eliminados', compact('atenciones'));
    }

    public function nuevoPago($id)
    {
        $atencion = App\Atencion::findOrFail($id);
        $paciente = App\Paciente::findOrFail($atencion->paciente_id);
        return view('atenciones/nuevopago', compact('atencion', 'paciente'));
    }

    public function guardarPago(Request $request)
    {
        $pagoNuevo = new app\Pago; //crea nueva instancia de pago
        $pagoNuevo->atencion_id = $request->atencion_id;
        //$pagoNuevo->monto = $request->monto;

        $pagoNuevo->detalle = $request->detalle;

        if ($request->monto) {
            $pagoNuevo->monto = $request->monto;
        } else {
            $pagoNuevo->monto = 0;
        }

        if ($request->cubierto_obra_social) {
            $pagoNuevo->cubierto_obra_social = true;
        } //Si se selecciona el checkbox
        else {
            $pagoNuevo->cubierto_obra_social = false;
        } //Si NO se selecciona el checkbox

        if ($request->fecha) {
            $pagoNuevo->fecha = $request->fecha;
        } else {
            $pagoNuevo->fecha = Carbon::today();
        }

        $pagoNuevo->creado_por = auth()->user()->usuario;
        $pagoNuevo->save();

        $atencion = App\Atencion::findOrFail($request->atencion_id);
        $atencion->pago += $request->monto;
        $atencion->save();

        return back()->with('mensaje', 'pago registrado correctamente');
    }

    public function eliminarPago($id)
    {
        $pago = App\Pago::findOrFail($id);
        $pago->eliminado_por = auth()->user()->usuario;
        $pago->save();
        $pago->delete();

        $atencion = App\Atencion::findOrFail($pago->atencion_id);
        $atencion->pago -= $pago->monto;
        $atencion->save();

        return back()->with("deleted", $id); //usa deleted para mostrar en la vista la opción de restaurarlo
    }

    public function restaurarPago($id)
    {
        $pago = App\Pago::withTrashed()->where('id', '=', $id)->first();
        $pago->eliminado_por = null;
        $pago->restore();

        $atencion = App\Atencion::findOrFail($pago->atencion_id);
        $atencion->pago += $pago->monto;
        $atencion->save();

        return back()->with('mensaje', 'pago restaurado correctamente');
    }

    public function guardarServiciosPrestados($serviciosPrestados, $id_atencion)
    {
        $arrayServPrestados = explode(",", $serviciosPrestados); //ej: $serviciosPrestados => "2,3,5" //explode() separa los elementos, en este caso con el caracter ","

        foreach($arrayServPrestados as $servicio_id)
        {
            $serviciosPrestadosNuevo = new app\ServicioPrestado;
            $serviciosPrestadosNuevo->atencion_id = $id_atencion;
            $serviciosPrestadosNuevo->nomeclatura_id = $servicio_id;
            $serviciosPrestadosNuevo->save();
        }
    }
}
