<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use Carbon\Carbon;
use App;

class CompraInsumoController extends Controller
{
    /**
     * Display a listing of the resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function index()
    {
        $comprainsumos = App\CompraInsumo::get(); //obtener todas las compras de insumos
        return view( 'comprainsumos/index',compact('comprainsumos') );
    }

    /**
     * Show the form for creating a new resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function create()
    {
        $insumos = App\Insumo::orderBy('nombre')->get();
        $empleados = App\User::orderBy('nombre')->get();
        return view('comprainsumos/crear',compact('insumos','empleados'));
    }

    public function crearDesdeListado($id)
    {
        $insumo = App\Insumo::findOrFail($id);
        $empleados = App\User::orderBy('nombre')->get();
        return view('comprainsumos/crear',compact('insumo','empleados'));
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
            'insumo_id'        => 'required',
            'user_id'        => 'required',
            'cantidad_adquirida' => 'required',
            'precio_compra'      => 'required',
        ]);
        
        $nuevaCompraInsumo = new App\CompraInsumo;
        $nuevaCompraInsumo->insumo_id = $request->insumo_id;
        $nuevaCompraInsumo->user_id = $request->user_id;
        if ($request->fecha_compra) { $nuevaCompraInsumo->fecha_compra = $request->fecha_compra; }
        else $nuevaCompraInsumo->fecha_compra = Carbon::today();
        $nuevaCompraInsumo->cantidad_adquirida = $request->cantidad_adquirida;
        $nuevaCompraInsumo->precio_compra = $request->precio_compra;
        $nuevaCompraInsumo->creado_por = auth()->user()->usuario;
        $nuevaCompraInsumo->save();

        $insumo = App\Insumo::withTrashed()->findOrFail($nuevaCompraInsumo->insumo_id);
        $insumo->stock += $request->cantidad_adquirida;
        $insumo->save();

        return back()->with('mensaje', 'Registrado correctamente');
    }

    /**
     * Display the specified resource.
     *
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function show($id)
    {
       //
    }

    /**
     * Show the form for editing the specified resource.
     *
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function edit($id)
    {
        //
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
        //
    }

    /**
     * Remove the specified resource from storage.
     *
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function destroy($id)
    {
        $comprainsumo = App\CompraInsumo::withTrashed()->findOrFail($id);
        $comprainsumo->eliminado_por = auth()->user()->usuario;
        $comprainsumo->save();
        $comprainsumo->delete();

        $insumo = App\Insumo::findOrFail($comprainsumo->insumo_id);
        $insumo->stock -= $comprainsumo->cantidad_adquirida;
        $insumo->save();

        return back()->with("deleted" , $id ); //usa deleted para mostrar en la vista la opción de restaurarlo
    }

    public function restore($id) //restaurar un registro borrado
    {
        $comprainsumo = App\CompraInsumo::withTrashed()->where('id', '=', $id)->first();
        $comprainsumo->eliminado_por = null;
        $comprainsumo->save();
        $comprainsumo->restore();

        $insumo = App\Insumo::findOrFail($comprainsumo->insumo_id);
        $insumo->stock += $comprainsumo->cantidad_adquirida;
        $insumo->save();

        return back()->with('mensaje', 'Registro de compra restaurado correctamente');
    }

    public function verEliminados()
    {  
        $comprainsumos = App\CompraInsumo::onlyTrashed()->get(); //obtener solo eliminados 
        return view('comprainsumos/eliminados',compact('comprainsumos'));
    }

}
