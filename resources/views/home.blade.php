@extends('layouts.app')

@section('content')
<div class="container">
    <div class="row justify-content-center">
        <div class="col-md-12">
            <div class="card">
                <div class="card-header">CONSULTORIO ODONTOLÓGICO HAENGGI</div>
                    @include('reportes.insumosbajostock')
                    <a href="{{ route('reportes.insumosbajostock') }}" class="btn btn-primary btn-lg">Descargar</a>

            </div>
        </div>
    </div>
</div>

@endsection
