<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use App;

class NomeclaturaController extends Controller
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
        $nomeclaturas = App\Nomeclatura::get();        
        return view('nomeclaturas/index',compact('nomeclaturas'));
    }

    /**
     * Show the form for creating a new resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function create()
    {
        return view('nomeclaturas/crear');
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
            'nomeclatura' => ['required', 'string', 'max:12', 'unique:nomeclaturas'],
            'descripcion' => ['required', 'string', 'max:128'],
        ]);
        
        $nomeclaturaNuevo = new App\Nomeclatura;
        $nomeclaturaNuevo->nomeclatura = $request->nomeclatura;
        $nomeclaturaNuevo->descripcion = $request->descripcion;
        $nomeclaturaNuevo->save();

        return back()->with('mensaje', 'nomeclatura creada correctamente');
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
        $nomeclatura = App\Nomeclatura::findOrFail($id);
        return view('nomeclaturas/editar',compact('nomeclatura'));
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
            'nomeclatura' => ['required', 'string', 'max:12', 'unique:nomeclaturas,nomeclatura,'.$id],
            'descripcion' => ['required', 'string', 'max:128'],
        ]);
        
        $nomeclatura = App\Nomeclatura::findOrFail($id);
        $nomeclatura->nomeclatura = $request->nomeclatura;
        $nomeclatura->descripcion = $request->descripcion;
        $nomeclatura->save();

       return back()->with('mensaje', 'nomeclatura creada correctamente');
       //return redirect()->route('nomeclaturas.index')->with('mensaje', 'nomeclatura creada correctamente');
    }

    /**
     * Remove the specified resource from storage.
     *
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function destroy($id)
    {
        //
    }
}
