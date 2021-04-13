<?php

namespace App\Http\Controllers;
use Illuminate\Support\Facades\Hash;
use Carbon\Carbon;
use App;

use Illuminate\Http\Request;

class EmpleadoController extends Controller
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
        $empleados = App\User::get();
        return view('empleados/index',compact('empleados'));
    }

    /**
     * Show the form for creating a new resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function create()
    {
        return view('auth/register');
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
            'usuario' => ['required', 'string', 'max:20', 'unique:users'],
            'password' => ['required', 'string', 'min:6', 'max:25', 'confirmed'],
            'nombre' => ['required', 'string', 'max:25'],
            'apellido' => ['required', 'string', 'max:25'],
            'dni' => ['required', 'integer', 'min:1000000', 'max:99999999', 'unique:users'],
            'odontologo' => ['required', 'boolean'],
            'direccion' => ['nullable','string', 'max:60'],
            'fechanacimiento' => ['nullable','date'],
            'email' => ['nullable','email', 'max:45'],
            'telefono' => ['nullable','string', 'max:20'],
            'comentarios' => ['nullable','string', 'max:100'],
            'rol' => ['nullable','integer', 'min:1', 'max:9'],
        ]);
        
        $empleadoNuevo = new App\User;
        $empleadoNuevo->usuario = $request->usuario;
        $empleadoNuevo->password = Hash::make($request->password);
        $empleadoNuevo->nombre = $request->nombre;
        $empleadoNuevo->apellido = $request->apellido;
        $empleadoNuevo->dni = $request->dni;
        $empleadoNuevo->odontologo = $request->odontologo;
        $empleadoNuevo->direccion = $request->direccion;
        if ($request->fechanacimiento)
        {   $fechaNac = $request->fechanacimiento;
            $empleadoNuevo->fechanacimiento = Carbon::createFromFormat('Y-m-d', $fechaNac);
        }
        $empleadoNuevo->email = $request->email;
        $empleadoNuevo->telefono = $request->telefono;
        $empleadoNuevo->comentarios = $request->comentarios;
        $empleadoNuevo->rol = $request->rol; //del 1 al 9 //1=ADMIN
        $empleadoNuevo->creado_por = auth()->user()->usuario;
        $empleadoNuevo->save();

        return back()->with('mensaje', 'Empleado agregado correctamente');
    }

    /**
     * Display the specified resource.
     *
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function show($id)
    {
        $empleado = App\User::withTrashed()->findOrFail($id);
        return view('empleados/detalles',compact('empleado'));
    }

    /**
     * Show the form for editing the specified resource.
     *
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function edit($id)
    {
        $empleado = App\User::withTrashed()->findOrFail($id);
        return view('empleados/editar',compact('empleado'));
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
            'usuario' => ['required', 'string', 'max:20', 'unique:users,usuario,'.$id],
            'password' => ['string', 'min:6', 'max:25', 'confirmed'],
            'nombre' => ['required', 'string', 'max:25'],
            'apellido' => ['required', 'string', 'max:25'],
            'dni' => ['required', 'integer', 'min:1000000', 'max:99999999','unique:users,dni,'.$id],
            'odontologo' => ['required', 'boolean'],
            'direccion' => ['nullable','string', 'max:60'],
            'fechanacimiento' => ['nullable','date'],
            'email' => ['nullable','email', 'max:45'],
            'telefono' => ['nullable','string', 'max:20'],
            'comentarios' => ['nullable','string', 'max:100'],
            'rol' => ['nullable','integer', 'min:1', 'max:9'],
        ]);
        
        $empleado = App\User::withTrashed()->findOrFail($id);

        $empleado->usuario = $request->usuario;
        if ($request->password)
        {
            $empleado->password = Hash::make($request->password);
        }
        $empleado->nombre = $request->nombre;
        $empleado->apellido = $request->apellido;
        $empleado->odontologo = $request->odontologo;
        $empleado->dni = $request->dni;
        $empleado->direccion = $request->direccion;
        if ($request->fechanacimiento)
        {   $fechaNac = $request->fechanacimiento;
            $empleado->fechanacimiento = Carbon::createFromFormat('Y-m-d', $fechaNac);
        }
        $empleado->email = $request->email;
        $empleado->telefono = $request->telefono;
        $empleado->comentarios = $request->comentarios;
        $empleado->rol = $request->rol;
        $empleado->editado_por = auth()->user()->usuario;
        $empleado->save();

        return back()->with('mensaje', 'Empleado actualizado correctamente');
    }

    /**
     * Remove the specified resource from storage.
     *
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function destroy($id)
    {
        $empleado = App\User::findOrFail($id);
        $empleado->eliminado_por = auth()->user()->usuario;
        $empleado->save();
        $empleado->delete();
        return back()->with("deleted" , $id );
    }

    public function restore($id)
    {
        $empleado = App\User::withTrashed()->where('id', '=', $id)->first();
        $empleado->restore();  
        return back()->with('mensaje', 'Empleado restaurado correctamente');
    }

    public function verEliminados()
    {  
        $empleados = App\User::onlyTrashed()->get();
        return view('empleados/eliminados',compact('empleados'));
    }
}
