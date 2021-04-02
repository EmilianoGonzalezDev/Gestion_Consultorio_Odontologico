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
                            <label for="arcada_superior" class="col-md-4 col-form-label text-md-right">Arcada Superior</label>
                            <div class="col-md-6">
                                <input id="arcada_superior" type="text" maxlength="40" class="form-control @error('arcada_superior') is-invalid @enderror" name="arcada_superior" value="{{ old('arcada_superior') }}" autocomplete="off">
                                @error('arcada_superior')
                                <span class="invalid-feedback" role="alert">
                                    <strong>{{ $message }}</strong>
                                </span>
                                @enderror
                            </div>
                        </div>

                        <div class="form-group row">
                            <label for="arcada_inferior" class="col-md-4 col-form-label text-md-right">Arcada Inferior</label>
                            <div class="col-md-6">
                                <input id="arcada_inferior" type="text" maxlength="40" class="form-control @error('arcada_inferior') is-invalid @enderror" name="arcada_inferior" value="{{ old('arcada_inferior') }}" autocomplete="off">
                                @error('arcada_inferior')
                                <span class="invalid-feedback" role="alert">
                                    <strong>{{ $message }}</strong>
                                </span>
                                @enderror
                            </div>
                        </div>

                        <div class="form-group row">
                            <label for="operacion_prevista" class="col-md-4 col-form-label text-md-right">Operación Prevista</label>
                            <div class="col-md-6">
                                <input id="operacion_prevista" type="text" maxlength="40" class="form-control @error('operacion_prevista') is-invalid @enderror" name="operacion_prevista" value="{{ old('operacion_prevista') }}" autocomplete="off">
                                @error('operacion_prevista')
                                <span class="invalid-feedback" role="alert">
                                    <strong>{{ $message }}</strong>
                                </span>
                                @enderror
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

                        <div class="form-group row mb-0">
                            <div class="col-md-6 offset-md-4">
                                <button type="submit" class="btn btn-primary">
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
    $(document).ready(function() //Si el usuario actual es odontÃ³logo, lo pone automÃ¡ticamente en el select de crear atenciÃ³n
        {
            var selectEmpleado = document.getElementById('user_id');
            if ({
                    {
                        Auth::user() - > odontologo
                    }
                }) selectEmpleado.value = {
                {
                    Auth::user() - > id
                }
            };
        });
</script>

@endsection