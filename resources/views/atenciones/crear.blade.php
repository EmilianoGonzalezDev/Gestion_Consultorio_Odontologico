@extends('layouts.app')

@section('content')

@yield('parte_superior')
<!-- este yield es para poder agregar este formulario de creación de atenciones en alguna otra vista -->


<div class="container">
    <div class="row justify-content-center">
        <div class="col-md-8">
            <div class="card" id="form_crear_atencion">
                <div class="card-header">Registrar nueva atención</div>

                <div class="card-body">
                    <form method="POST" action="{{ route('atenciones.store') }}">
                        @csrf

                        <div class="form-group row">
                            <label for="user_id" class="col-md-4 col-form-label text-md-right">Profesional</label>
                            <div class="select col-md-6">
                                <select name="user_id" id="user_id" required class="form-control">
                                    <option value=""></option>
                                    @foreach ($empleados as $empleado)
                                    @if($empleado->odontologo)
                                    <option value="{{$empleado->id}}">{{$empleado->nombre}} {{$empleado->apellido}}</option>
                                    @endif
                                    @endforeach
                                </select>
                            </div>
                        </div>

                        <div class="form-group row">
                            <label for="paciente_id" class="col-md-4 col-form-label text-md-right">Paciente</label>
                            <div class="select col-md-6">
                                    <select name="paciente_id" id="paciente_id" class="form-control" required>
                                    
                                    @if (isset($paciente)) <!-- Si se llegó desde la ficha de detalles de un paciente -->
                                        <option value="{{$paciente->id}}">{{$paciente->nombre}} {{$paciente->apellido}} - cód. {{$paciente->id}}</option>
                                    
                                    @else <!-- Si se llegó desde atenciones => nueva atención -->
                                        <option value=""></option>
                                        @foreach ($pacientes as $paciente)
                                        <option value="{{$paciente->id}}">{{$paciente->nombre}} {{$paciente->apellido}} - cód. {{$paciente->id}}</option>
                                        @endforeach
                                    @endif
                                </select>
                            </div>
                        </div>

                        <div class="form-group row">
                            <label for="importe" class="col-md-4 col-form-label text-md-right">Importe $</label>
                            <div class="col-md-6">
                                <input id="importe" type="number" min="0" max="999999" class="form-control @error('importe') is-invalid @enderror" name="importe" value="{{ old('importe') }}" autocomplete="off" placeholder=0>
                                @error('importe')
                                <span class="invalid-feedback" role="alert">
                                    <strong>{{ $message }}</strong>
                                </span>
                                @enderror
                            </div>
                        </div>

                        <div class="form-group row">
                            <label for="monto" class="col-md-4 col-form-label text-md-right">Pago $</label>

                            <div class="col-md-3">
                                <input id="monto" type="number" min="0" max="999999" class="form-control @error('monto') is-invalid @enderror" name="monto" value="{{ old('monto') }}" autocomplete="off" placeholder=0>
                                @error('monto')
                                <span class="invalid-feedback" role="alert">
                                    <strong>{{ $message }}</strong>
                                </span>
                                @enderror
                            </div>

                            <label for="cubierto_obra_social" class="col-md-2 col-form-label text-md-right">Cubierto O.S.</label>

                            <div class="col-md-1">
                                <input id="cubierto_obra_social" type="checkbox" class="form-control @error('cubierto_obra_social') is-invalid @enderror" name="cubierto_obra_social">
                                @error('cubierto_obra_social')
                                <span class="invalid-feedback" role="alert">
                                    <strong>{{ $message }}</strong>
                                </span>
                                @enderror
                            </div>
                        </div>

                        <div class="form-group row">
                            <label for="detalle" class="col-md-4 col-form-label text-md-right">Detalle pago:</label>
                            <div class="col-md-6">
                                <input id="detalle" type="text" maxlength="40" class="form-control @error('detalle') is-invalid @enderror" name="detalle" value="{{ old('detalle') }}" autocomplete>
                                @error('detalle')
                                <span class="invalid-feedback" role="alert">
                                    <strong>{{ $message }}</strong>
                                </span>
                                @enderror
                            </div>
                        </div>

                        <div class="form-group row">
                            <label for="fecha" class="col-md-4 col-form-label text-md-right">Fecha y hora</label>

                            <div class="col-md-3">
                                <input id="fecha" type="date" class="form-control @error('fecha') is-invalid @enderror" name="fecha" value="<?php echo date("Y-m-d"); ?>" required>
                                @error('fecha')
                                <span class="invalid-feedback" role="alert">
                                    <strong>{{ $message }}</strong>
                                </span>
                                @enderror
                            </div>
                            <div class="col-md-3">
                                <input id="hora" type="time" class="form-control @error('hora') is-invalid @enderror" name="hora" value="{{ old('hora') }}" required>
                                @error('hora')
                                <span class="invalid-feedback" role="alert">
                                    <strong>{{ $message }}</strong>
                                </span>
                                @enderror
                            </div>
                        </div>

                        <div class="form-group row">
                            <label for="proximo_turno" class="col-md-4 col-form-label text-md-right">Próximo turno</label>
                            <div class="col-md-6">
                                <input id="proximo_turno" type="date" class="form-control @error('proximo_turno') is-invalid @enderror" name="proximo_turno" value="{{ old('proximo_turno') }}">
                                @error('proximo_turno')
                                <span class="invalid-feedback" role="alert">
                                    <strong>{{ $message }}</strong>
                                </span>
                                @enderror
                            </div>
                        </div>

                        <div class="form-group row">
                            <label for="nomeclaturas_select" class="col-md-4 col-form-label text-md-right">Servicios prestados</label>
                            <div class="select col-md-6">
                                <select name="nomeclaturas_select" id="nomeclaturas_select" class="form-control" onchange="habilitarDeshabilitarBotonAgregar()">
                                    <option value="" selected></option>
                                    @foreach ($nomeclaturas as $nomeclatura)
                                    <option value="{{$nomeclatura->id}}">{{$nomeclatura->nomeclatura}} - {{$nomeclatura->descripcion}}</option>
                                    @endforeach
                                </select>
                            </div>
                            <input type="button" id="btn_agregar_servicio" class="btn btn-outline-success btn-sm" value="Agregar">
                        </div>

                        <div class="form-group row">
                            <label for="piezas_dentales" class="col-md-4 col-form-label text-md-right">Pieza/s</label>
                            <div class="col-md-6" name="piezas_dentales" id="piezas_dentales">
                                <div>
                                    <input type="checkbox" id="pieza_11" name="pieza_11" value="11"> <label for="pieza_11">11</label>
                                    <input type="checkbox" id="pieza_12" name="pieza_12" value="12"> <label for="pieza_12">12</label>
                                    <input type="checkbox" id="pieza_13" name="pieza_13" value="13"> <label for="pieza_13">13</label>
                                    <input type="checkbox" id="pieza_14" name="pieza_14" value="14"> <label for="pieza_14">14</label>
                                    <input type="checkbox" id="pieza_15" name="pieza_15" value="15"> <label for="pieza_15">15</label>
                                    <input type="checkbox" id="pieza_16" name="pieza_16" value="16"> <label for="pieza_16">16</label>
                                    <input type="checkbox" id="pieza_17" name="pieza_17" value="17"> <label for="pieza_17">17</label>
                                    <input type="checkbox" id="pieza_18" name="pieza_18" value="18"> <label for="pieza_18">18</label>
                                </div>
                                <div>
                                    <input type="checkbox" id="pieza_21" name="pieza_21" value="21"> <label for="pieza_21">21</label>
                                    <input type="checkbox" id="pieza_22" name="pieza_22" value="22"> <label for="pieza_22">22</label>
                                    <input type="checkbox" id="pieza_23" name="pieza_23" value="23"> <label for="pieza_23">23</label>
                                    <input type="checkbox" id="pieza_24" name="pieza_24" value="24"> <label for="pieza_24">24</label>
                                    <input type="checkbox" id="pieza_25" name="pieza_25" value="25"> <label for="pieza_25">25</label>
                                    <input type="checkbox" id="pieza_26" name="pieza_26" value="26"> <label for="pieza_26">26</label>
                                    <input type="checkbox" id="pieza_27" name="pieza_27" value="27"> <label for="pieza_27">27</label>
                                    <input type="checkbox" id="pieza_28" name="pieza_28" value="28"> <label for="pieza_28">28</label>
                                </div>
                                <div>
                                    <input type="checkbox" id="pieza_31" name="pieza_31" value="31"> <label for="pieza_31">31</label>
                                    <input type="checkbox" id="pieza_32" name="pieza_32" value="32"> <label for="pieza_32">32</label>
                                    <input type="checkbox" id="pieza_33" name="pieza_33" value="33"> <label for="pieza_33">33</label>
                                    <input type="checkbox" id="pieza_34" name="pieza_34" value="34"> <label for="pieza_34">34</label>
                                    <input type="checkbox" id="pieza_35" name="pieza_35" value="35"> <label for="pieza_35">35</label>
                                    <input type="checkbox" id="pieza_36" name="pieza_36" value="36"> <label for="pieza_36">36</label>
                                    <input type="checkbox" id="pieza_37" name="pieza_37" value="37"> <label for="pieza_37">37</label>
                                    <input type="checkbox" id="pieza_38" name="pieza_38" value="38"> <label for="pieza_38">38</label>
                                </div>
                                <div>
                                    <input type="checkbox" id="pieza_41" name="pieza_41" value="41"> <label for="pieza_41">41</label>
                                    <input type="checkbox" id="pieza_42" name="pieza_42" value="42"> <label for="pieza_42">42</label>
                                    <input type="checkbox" id="pieza_43" name="pieza_43" value="43"> <label for="pieza_43">43</label>
                                    <input type="checkbox" id="pieza_44" name="pieza_44" value="44"> <label for="pieza_44">44</label>
                                    <input type="checkbox" id="pieza_45" name="pieza_45" value="45"> <label for="pieza_45">45</label>
                                    <input type="checkbox" id="pieza_46" name="pieza_46" value="46"> <label for="pieza_46">46</label>
                                    <input type="checkbox" id="pieza_47" name="pieza_47" value="47"> <label for="pieza_47">47</label>
                                    <input type="checkbox" id="pieza_48" name="pieza_48" value="48"> <label for="pieza_48">48</label>
                                </div>
                                <div>
                                    <input type="checkbox" id="0" name="0" value="0"> <label for="0">N/A</label>
                                </div>
                            </div>
                        </div>

                        <div id="div_servicios_prestados" class="col-md-12 offset-md-2"> 
                        </div>

                        <div class="form-group row mb-0">
                            <div class="col-md-6 offset-md-4">
                                <button type="submit" id="btn_enviar" class="btn btn-primary" disabled>
                                    Enviar
                                </button>
                                <a href="{{ route('atenciones.index') }}" class="btn btn-secondary">Volver</a>
                            </div>
                        </div>

                    </form>
                </div>
            </div>
        </div>
    </div>
</div>


<script>
// Si el usuario actual es odontologo, colocarlo automaticamente en el select de crear atencion
    $(document).ready
    (function(){
        var selectEmpleado = document.getElementById('user_id');
        if ({{ Auth::user()->odontologo }}) selectEmpleado.value = {{ Auth::user()->id }};
    });
</script>


<script>
// Agregar dinámicamente servicios prestados y guardarlos en BD al enviar el formulario
    var listaIdServiciosPrestados = new Array();
    var botonEnviar = document.getElementById('btn_enviar');
    var divServiciosPrestados = document.getElementById('div_servicios_prestados');
    var bAgregar = document.getElementById('btn_agregar_servicio');
    /* separar esto en otra funcion */
    const _inputServicios = document.createElement("input");  
        _inputServicios.type = "hidden";
        _inputServicios.name = "serviciosPrestados";
        divServiciosPrestados.appendChild(_inputServicios);
    bAgregar.addEventListener("click", agregarServicioPrestado);

    function habilitarDeshabilitarBotonAgregar(){
        if(servicioYaFueAgregado()){
            bAgregar.disabled = true;
        }
        else{
            bAgregar.disabled = false;
        }
    }

    function agregarServicioPrestado(){
        if(!servicioYaFueAgregado() && hayUnElementoSeleccionado()){
            agregarServicio();
        }
        vaciarInputServicios();
    }

    function servicioYaFueAgregado(){
        var listaServiciosPrestados = divServiciosPrestados.querySelectorAll('p');
        var elementoExiste = false;
        var idServicioAgregar = $("#nomeclaturas_select").val();
        listaServiciosPrestados.forEach(function(servicioYaAgregado){
            if(servicioYaAgregado.id == idServicioAgregar){
                elementoExiste = true;
            }
        });
        return elementoExiste;
    }

    function hayUnElementoSeleccionado(){
        return $("#nomeclaturas_select").val() != "";
    }

    function agregarServicio(){
        const pServicio = document.createElement("p");
        var idNomeclatura = $("#nomeclaturas_select").val();
        pServicio.id = idNomeclatura;
        pServicio.className = "servicio-prestado"
        pServicio.textContent = $("#nomeclaturas_select option:selected").text();
        pServicio.addEventListener("mouseover", function () {this.style = "text-decoration: line-through; color: red";});
        pServicio.addEventListener("mouseout", function () {this.style = "text-decoration: none";} );
        pServicio.addEventListener("click", quitarServicioPrestado);
        divServiciosPrestados.appendChild(pServicio);
        listaIdServiciosPrestados.push(idNomeclatura);
        _inputServicios.value = listaIdServiciosPrestados;
        botonEnviar.disabled = false;
    }

    function vaciarInputServicios(){
        $("#nomeclaturas_select").val("");
    }
        
    function quitarServicioPrestado(){
        this.parentNode.removeChild(this);
        var idEliminar = this.id;
        var nuevaLista = listaIdServiciosPrestados.filter( function(id){ return id !== idEliminar;} );
        listaIdServiciosPrestados = nuevaLista;
        _inputServicios.value = nuevaLista;
        if(_inputServicios.value == ""){
            botonEnviar.disabled = true;
        }
        if($("#nomeclaturas_select option:selected").val() == this.id){
            bAgregar.disabled = false;
        }
    }
    
</script>

@endsection