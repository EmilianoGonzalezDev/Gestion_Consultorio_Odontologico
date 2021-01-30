<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use App;
use Carbon\Carbon;
use App\CompraInsumo;
use App\ReduccionStock;

class InsumoController extends Controller
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
        $insumos = App\Insumo::get(); //obtener todos los insumos
        return view('insumos/index',compact('insumos'));
    }

    /**
     * Show the form for creating a new resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function create()
    {
        return view('insumos/crear');
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
            'nombre' => 'required',
            'marca' => 'required',
            'stock_bajo' => 'required',
            'contenido_cantidad' => 'required',
        ]);
        
        $insumoNuevo = new App\Insumo; //crea nueva instancia de insumo
        $insumoNuevo->nombre = $request->nombre; //guarda lo del formulario
        $insumoNuevo->marca = $request->marca;
        $insumoNuevo->stock = 0;
        $insumoNuevo->contenido_cantidad = $request->contenido_cantidad;
        $insumoNuevo->contenido_unidad = $request->contenido_unidad;
        $insumoNuevo->detalles = $request->detalles;
        if($request->stock_bajo) $insumoNuevo->stock_bajo = $request->stock_bajo;
        else $insumoNuevo->stock_bajo = 0;
        $insumoNuevo->creado_por = auth()->user()->usuario;
        $insumoNuevo->save();

        return back()->with('mensaje', 'Insumo agregado correctamente');
    }

    /**
     * Display the specified resource.
     *
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function show($id)
    {
        $insumo = App\Insumo::withTrashed()->findOrFail($id);
        $compras = App\CompraInsumo::get()->where('insumo_id', '=', $id);
        $reducciones = App\ReduccionStock::get()->where('insumo_id', '=', $id);
        return view('insumos/detalles',compact('insumo','compras','reducciones'));
    }

    /**
     * Show the form for editing the specified resource.
     *
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function edit($id)
    {
        $insumo = App\Insumo::withTrashed()->findOrFail($id);
        return view('insumos/editar',compact('insumo'));
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
            'marca' => 'required',
            'contenido_cantidad' => 'required',
        ]);

        $insumo = App\Insumo::withTrashed()->findOrFail($id);
        
        $insumo->nombre = $request->nombre; //guarda lo del formulario
        $insumo->marca = $request->marca;
        $insumo->contenido_cantidad = $request->contenido_cantidad;
        $insumo->contenido_unidad = $request->contenido_unidad;
        $insumo->detalles = $request->detalles;
        $insumo->stock_bajo = $request->stock_bajo;
        $insumo->editado_por = auth()->user()->usuario;
        $insumo->save();

        return back()->with('mensaje', 'Insumo actualizado correctamente');
    }

    /**
     * Remove the specified resource from storage.
     *
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function destroy($id)
    {
        $insumo = App\Insumo::findOrFail($id);
        $insumo->eliminado_por = auth()->user()->usuario;
        $insumo->save(); //para que guarde la información de quién lo eliminó
        $insumo->delete();
        return back()->with("deleted" , $id ); //usa deleted para mostrar en la vista la opción de restaurarlo
    }

    public function restore($id) //restaurar un registro borrado
    {
        //Indicamos que la busqueda se haga en los registros eliminados con withTrashed
        $insumo = App\Insumo::withTrashed()->where('id', '=', $id)->first();
  
        //Restauramos el registro
        $insumo->eliminado_por = null;
        $insumo->editado_por = auth()->user()->usuario;
        $insumo->restore();
  
        return back()->with('mensaje', 'Restaurado correctamente');
    }

    public function verEliminados()
    {  
        $insumos = App\Insumo::onlyTrashed()->get(); //obtener solo eliminados 
        return view('insumos/eliminados',compact('insumos'));
    }

    public function precio($id)
    {
        //return Insumo::find($id);
        return Insumo::where('id', $id)->get();
    }

    public function reducirStock($id)
    {  
        $insumo = App\Insumo::findOrFail($id);
        return view('insumos/reducirstock',compact('insumo'));
    }

    public function guardarReducirStock(Request $request)
    { 
        $reduccionStock = new App\ReduccionStock; //crea nueva instancia de reduccionInsumo
        $reduccionStock->insumo_id = $request->insumo_id;
        $reduccionStock->fecha = Carbon::now();
        $reduccionStock->cantidad = $request->cantidad;
        $reduccionStock->creado_por = auth()->user()->usuario;
        $reduccionStock->save();

        $insumo = App\Insumo::findOrFail($request->insumo_id);
        $insumo->stock -= $request->cantidad;
        $insumo->save();    
        
        return back()->with('mensaje', 'Stock Reducido correctamente');
    }

    public function deshacerReduccion($id)
    {
        $reduccion = App\ReduccionStock::findOrFail($id);
        $reduccion->delete();

        $insumo = App\Insumo::findOrFail($reduccion->insumo_id);
        $insumo->stock += $reduccion->cantidad;
        $insumo->save();

        return back()->with("deleted" , $id ); //usa deleted para mostrar en la vista la opción de restaurarlo
    }

    public function restaurarReduccion($id) //restaurar un registro borrado
    {
        $reduccion = App\ReduccionStock::withTrashed()->where('id', '=', $id)->first();
        $reduccion->restore();

        $insumo = App\Insumo::findOrFail($reduccion->insumo_id);
        $insumo->stock -= $reduccion->cantidad;
        $insumo->save();
  
        return back()->with('mensaje', 'Restaurado correctamente');
    }
    
}
