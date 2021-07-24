@extends('layouts.app')

@section('content')

<div class="container">
    <div class="row justify-content-center">
        <div class="col-md-8">
            <div class="card">
                <div class="card-header">Editar Paciente</div>

                <div class="card-body">
                    <form method="POST" action="{{ route('pacientes.update', $paciente->id) }}">
                        @method('PATCH')
                        @csrf

                        <div class="form-group row">
                            <label for="nombre" class="col-md-4 col-form-label text-md-right">Nombre *</label>
                            <div class="col-md-6">
                                <input id="nombre" type="text" maxlength="25" class="form-control @error('nombre') is-invalid @enderror" name="nombre" value="{{ $paciente->nombre }}" required autocomplete="nombre" autofocus>
                                @error('nombre') <span class="invalid-feedback" role="alert"><strong>{{ $message }}</strong></span> @enderror
                            </div>
                        </div>

                        <div class="form-group row">
                            <label for="apellido" class="col-md-4 col-form-label text-md-right">Apellido *</label>
                            <div class="col-md-6">
                                <input id="apellido" type="text" maxlength="25" class="form-control @error('apellido') is-invalid @enderror" name="apellido" value="{{ $paciente->apellido }}" required autocomplete="apellido" >
                                @error('apellido') <span class="invalid-feedback" role="alert"><strong>{{ $message }}</strong></span> @enderror
                            </div>
                        </div>

                        <div class="form-group row">
                            <label for="dni" class="col-md-4 col-form-label text-md-right">DNI *</label>
                            <div class="col-md-6">
                                <input id="dni" type="number" min="0" max="999999999" class="form-control @error('dni') is-invalid @enderror" name="dni" value="{{ $paciente->dni }}" required autocomplete="off" >
                                @error('dni') <span class="invalid-feedback" role="alert"><strong>{{ $message }}</strong></span> @enderror
                            </div>
                        </div>

                        <hr />

                        <div class="form-group row">
                            <label for="direccion" class="col-md-4 col-form-label text-md-right">Dirección</label>
                            <div class="col-md-6">
                                <input id="direccion" type="text" maxlength="60" class="form-control @error('direccion') is-invalid @enderror" name="direccion" value="{{ $paciente->direccion }}" autocomplete="off">
                                @error('direccion') <span class="invalid-feedback" role="alert"><strong>{{ $message }}</strong></span> @enderror
                            </div>
                        </div>

                        <div class="form-group row">
                                <label for="telefono" class="col-md-4 col-form-label text-md-right">Teléfono</label>
    
                                <div class="col-md-6">
                                    <input id="telefono" type="text" maxlength="35" class="form-control @error('telefono') is-invalid @enderror" name="telefono" value="{{ $paciente->telefono }}" autocomplete="off">
    
                                    @error('telefono')
                                        <span class="invalid-feedback" role="alert">
                                            <strong>{{ $message }}</strong>
                                        </span>
                                    @enderror
                                </div>
                        </div>

                        <div class="form-group row">
                            <label for="email" class="col-md-4 col-form-label text-md-right">E-Mail</label>
                            <div class="col-md-6">
                                <input id="email" type="email" maxlength="45" class="form-control @error('email') is-invalid @enderror" name="email" autocomplete="off" value="{{ $paciente->email }}">
                                @error('email') <span class="invalid-feedback" role="alert"><strong>{{ $message }}</strong></span> @enderror
                            </div>
                        </div>

                        <hr />

                        <div class="form-group row">
                            <label for="fechanacimiento" class="col-md-4 col-form-label text-md-right">Fecha de nacimiento</label>
                            <div class="col-md-6">
                                <input id="fechanacimiento" type="date" class="form-control @error('fechanacimiento') is-invalid @enderror" name="fechanacimiento" value="{{$paciente->fechanacimiento}}">
                                @error('fechanacimiento') <span class="invalid-feedback" role="alert"><strong>{{ $message }}</strong></span> @enderror
                            </div>
                        </div>

                        <div class="form-group row">
                            <label for="ocupacion" class="col-md-4 col-form-label text-md-right">Ocupación</label>
                            <div class="col-md-6">
                                <input id="ocupacion" type="text" maxlength="60" class="form-control @error('ocupacion') is-invalid @enderror" name="ocupacion" value="{{ $paciente->ocupacion }}" autocomplete="off">
                                @error('ocupacion') <span class="invalid-feedback" role="alert"><strong>{{ $message }}</strong></span> @enderror
                            </div>
                        </div>

                        <div class="form-group row">
                        <label for="estado_civil" class="col-md-4 col-form-label text-md-right">Estado Civil</label>

                            <div class="col-md-3">
                                <select name="estado_civil" id="estado_civil" class="form-control">
                                    <option value=""></option>
                                    <option @if($paciente->estado_civil == "Soltero") selected="true" @endif value="Soltero">Soltero</option>
                                    <option @if($paciente->estado_civil == "Casado") selected="true" @endif value="Casado">Casado</option>
                                    <option @if($paciente->estado_civil == "Separado") selected="true" @endif value="Separado">Separado</option>
                                    <option @if($paciente->estado_civil == "Divorciado") selected="true" @endif value="Divorciado">Divorciado</option>
                                    <option @if($paciente->estado_civil == "Otro") selected="true" @endif value="Otro">Otro</option>
                                </select>
                                @error('estado_civil') <span class="invalid-feedback" role="alert"><strong>{{ $message }}</strong></span> @enderror
                            </div>
                            
                            <label for="genero" class="col-form-label text-md">Género</label>

                            <div class="col-md-2">
                                <select name="genero" id="genero" class="form-control">
                                    <option value=""></option>
                                    <option @if($paciente->genero == "M") selected="true" @endif value="M">Masc.</option>
                                    <option @if($paciente->genero == "F") selected="true" @endif value="F">Femen.</option>
                                    <option @if($paciente->genero == "O") selected="true" @endif value="O">Otro</option>
                                </select>
                                @error('genero') <span class="invalid-feedback" role="alert"><strong>{{ $message }}</strong></span> @enderror
                            </div>
                        </div>

                        <div class="form-group row">
                            <label for="cobertura" class="col-md-4 col-form-label text-md-right">Cobertura médica</label>
                            <div class="col-md-6">
                                <input id="cobertura" type="text" maxlength="100" class="form-control @error('cobertura') is-invalid @enderror" name="cobertura" value="{{ $paciente->cobertura }}">
                                @error('cobertura') <span class="invalid-feedback" role="alert"><strong>{{ $message }}</strong></span> @enderror
                            </div>
                        </div>

                        <div class="form-group row">
                            <label for="detalles" class="col-md-4 col-form-label text-md-right">Detalles</label>
                            <div class="col-md-6">
                                <input id="detalles" type="text" maxlength="100" class="form-control @error('detalles') is-invalid @enderror" name="detalles" value="{{ $paciente->detalles }}" autocomplete="off">
                                @error('detalles') <span class="invalid-feedback" role="alert"><strong>{{ $message }}</strong></span> @enderror
                            </div>
                        </div>

                        <div class="form-group row">
                            <label for="comentarios" class="col-md-4 col-form-label text-md-right">Comentario</label>
                            <div class="col-md-6">
                                <input id="comentarios" type="text" maxlength="40" class="form-control @error('comentarios') is-invalid @enderror" name="comentarios" value="{{ $paciente->comentarios }}" autocomplete="off">
                                @error('comentarios') <span class="invalid-feedback" role="alert"><strong>{{ $message }}</strong></span> @enderror
                            </div>
                        </div>

                        <div class="form-group row mb-0">
                            <div class="col-md-6 offset-md-4">
                                <button type="submit" class="btn btn-primary">Aceptar</button>
                                <a href="{{ route('pacientes.index') }}" class="btn btn-secondary" role="button">Volver</a>
                            </div>
                        </div>
                    </form>
                </div>
            </div>
        </div>
    </div>
</div>



<script>
    $(document).ready(function(){
        //estado_civil.value = {{ $paciente->estado_civil }}.value;
        

    })
</script>

<script>
    // Si el usuario actual es odontologo, colocarlo automaticamente en el select de crear atencion
        $(document).ready
        (function(){
            var selectEstadoCivil = document.getElementById('estado_civil');
            selectEstadoCivil.value = {{ $paciente->estado_civil }};
        });
    </script>
@endsection