@extends('layouts.app')

@section('content')
@auth
@if (auth()->user()->rol == 1)

<div class="container">
    <div class="row justify-content-center">
        <div class="col-md-8">
            <div class="card">
                <div class="card-header">{{ __('Editar Usuario') }}</div>

                <div class="card-body">
                    <form method="POST" action="{{ route('empleados.update', $empleado->id) }}">
                        @method('PATCH')
                        @csrf

                        <div class="form-group row">
                            <label for="usuario" class="col-md-4 col-form-label text-md-right">{{ __('Usuario') }} *</label>
                            <div class="col-md-6">
                                <input id="usuario" type="text" maxlength="20" class="form-control @error('usuario') is-invalid @enderror" name="usuario" value="{{ $empleado->usuario }}" autocomplete="off" required autofocus>
                                @error('usuario') <span class="invalid-feedback" role="alert"><strong>{{ $message }}</strong></span> @enderror
                            </div>
                        </div>

                        <div class="form-group row">
                            <label for="password" class="col-md-4 col-form-label text-md-right">{{ __('Contraseña') }} *</label>
                            <div class="col-md-6">
                                <input id="password" type="password" maxlength="25" class="form-control @error('password') is-invalid @enderror" name="password" autocomplete="new-password">
                                @error('password') <span class="invalid-feedback" role="alert"><strong>{{ $message }}</strong></span> @enderror
                            </div>
                        </div>

                        <div class="form-group row">
                            <label for="password-confirm" class="col-md-4 col-form-label text-md-right">{{ __('Confirmar contraseña') }} *</label>
                            <div class="col-md-6">
                                <input id="password-confirm" type="password" maxlength="25" class="form-control" name="password_confirmation">
                            </div>
                        </div>

                        <hr />

                        <div class="form-group row">
                            <label for="nombre" class="col-md-4 col-form-label text-md-right">{{ __('Nombre') }} *</label>
                            <div class="col-md-6">
                                <input id="nombre" type="text" maxlength="25" class="form-control @error('nombre') is-invalid @enderror" name="nombre" value="{{ $empleado->nombre }}" autocomplete="nombre" required>
                                @error('nombre') <span class="invalid-feedback" role="alert"><strong>{{ $message }}</strong></span> @enderror
                            </div>
                        </div>

                        <div class="form-group row">
                            <label for="apellido" class="col-md-4 col-form-label text-md-right">{{ __('Apellido') }} *</label>
                            <div class="col-md-6">
                                <input id="apellido" type="text" maxlength="25" class="form-control @error('apellido') is-invalid @enderror" name="apellido" value="{{ $empleado->apellido }}" required autocomplete="apellido">
                                @error('apellido') <span class="invalid-feedback" role="alert"><strong>{{ $message }}</strong></span> @enderror
                            </div>
                        </div>

                        <div class="form-group row">
                            <label for="dni" class="col-md-4 col-form-label text-md-right">{{ __('DNI') }} *</label>
                            <div class="col-md-6">
                                <input id="dni" type="number" min="1000000" max="99999999" class="form-control @error('dni') is-invalid @enderror" name="dni" autocomplete="off" value="{{ $empleado->dni }}" required>
                                @error('dni') <span class="invalid-feedback" role="alert"><strong>{{ $message }}</strong></span> @enderror
                            </div>
                        </div>

                        <div class="form-group row">
                            <label for="odontologo" class="col-md-4 col-form-label text-md-right">{{ __('Odontólogo') }} *</label>
                            <div class="col-md-6">
                                <select name="odontologo" id="odontologo" class="form-control" required>
                                    <option value=1 @if($empleado->odontologo) selected @endif>Si</option>
                                    <option value=0 @if(!$empleado->odontologo) selected @endif>No</option>
                                </select>
                                @error('odontologo') <span class="invalid-feedback" role="alert"> <strong>{{ $message }}</strong></span> @enderror
                            </div>
                        </div>

                        <hr />

                        <div class="form-group row">
                            <label for="direccion" class="col-md-4 col-form-label text-md-right">{{ __('Dirección') }}</label>
                            <div class="col-md-6">
                                <input id="direccion" type="text" maxlength="60" class="form-control @error('direccion') is-invalid @enderror" name="direccion" autocomplete="new-text" value="{{ $empleado->direccion }}">
                                @error('direccion') <span class="invalid-feedback" role="alert"><strong>{{ $message }}</strong></span> @enderror
                            </div>
                        </div>

                        <div class="form-group row">
                            <label for="fechanacimiento" class="col-md-4 col-form-label text-md-right">{{ __('Fecha de nacimiento') }}</label>
                            <div class="col-md-6">
                                <input id="fechanacimiento" type="date" class="form-control @error('fechanacimiento') is-invalid @enderror" name="fechanacimiento" value="{{ $empleado->fechanacimiento }}">
                                @error('fechanacimiento') <span class="invalid-feedback" role="alert"><strong>{{ $message }}</strong></span> @enderror
                            </div>
                        </div>

                        <div class="form-group row">
                            <label for="email" class="col-md-4 col-form-label text-md-right">{{ __('E-Mail') }}</label>
                            <div class="col-md-6">
                                <input id="email" type="email" maxlength="45" class="form-control @error('email') is-invalid @enderror" name="email" autocomplete="new-text" value="{{ $empleado->email }}">
                                @error('email') <span class="invalid-feedback" role="alert"><strong>{{ $message }}</strong></span> @enderror
                            </div>
                        </div>

                        <div class="form-group row">
                            <label for="telefono" class="col-md-4 col-form-label text-md-right">{{ __('Teléfono') }}</label>
                            <div class="col-md-6">
                                <input id="telefono" type="text" maxlength="20" class="form-control @error('telefono') is-invalid @enderror" name="telefono" autocomplete="off" value="{{ $empleado->telefono }}">
                                @error('telefono') <span class="invalid-feedback" role="alert"><strong>{{ $message }}</strong></span> @enderror
                            </div>
                        </div>

                        <div class="form-group row">
                            <label for="comentarios" class="col-md-4 col-form-label text-md-right">{{ __('Comentarios') }}</label>
                            <div class="col-md-6">
                                <input id="comentarios" type="text" maxlength="100" class="form-control @error('comentarios') is-invalid @enderror" name="comentarios" autocomplete="off" value="{{ $empleado->comentarios }}">
                                @error('comentarios') <span class="invalid-feedback" role="alert"><strong>{{ $message }}</strong></span> @enderror
                            </div>
                        </div>

                        <div class="form-group row">
                            <label for="rol" class="col-md-4 col-form-label text-md-right">{{ __('Rol') }}</label>
                            <div class="col-md-6">
                                <input id="rol" type="number" min="1" max="9" class="form-control @error('rol') is-invalid @enderror" name="rol" value="{{ $empleado->rol }}">
                                @error('rol') <span class="invalid-feedback" role="alert"><strong>{{ $message }}</strong></span> @enderror
                            </div>
                        </div>

                        <div class="form-group row mb-0">
                            <div class="col-md-6 offset-md-4">
                                <button type="submit" class="btn btn-primary">{{ __('Enviar') }}</button>
                                <a href="{{ route('empleados.index') }}" class="btn btn-secondary" role="button">Volver</a>
                            </div>
                        </div>
                    </form>
                </div>
            </div>
        </div>
    </div>
</div>
@endif
@endauth
@endsection