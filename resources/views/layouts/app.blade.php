<head>
    <meta charset="utf-8">
    <meta name="viewport" content="width=device-width, initial-scale=1">

    <!-- CSRF Token -->
    <meta name="csrf-token" content="{{ csrf_token() }}">

    <title>{{ config('app.name', 'Odontología Haenggi') }}</title>

    <!-- Scripts -->
    <script src="{{ asset('js/app.js') }}"></script>
    <script src="https://code.jquery.com/jquery-3.6.0.min.js" integrity="sha256-/xUj+3OJU5yExlq6GSYGSHk7tPXikynS7ogEvDej/m4=" crossorigin="anonymous"></script>

    <script src="https://cdn.datatables.net/1.10.23/js/jquery.dataTables.min.js" defer></script>
    <script src="https://cdn.datatables.net/1.10.23/js/dataTables.bootstrap4.min.js" defer></script>
    <script src="https://cdn.datatables.net/responsive/2.2.7/js/dataTables.responsive.min.js" defer></script>
    <script src="https://cdn.datatables.net/responsive/2.2.7/js/responsive.bootstrap4.min.js" defer></script>




    <!-- Fonts -->
    <link rel="dns-prefetch" href="//fonts.gstatic.com">
    <link href="https://fonts.googleapis.com/css?family=Nunito" rel="stylesheet">

    <!-- Styles -->
    <link rel="stylesheet" href="https://cdn.jsdelivr.net/npm/bootstrap@4.6.0/dist/css/bootstrap.min.css" integrity="sha384-B0vP5xmATw1+K9KRQjQERJvTumQW0nPEzvF6L/Z6nronJ3oUOFUFpCjEUQouq2+l" crossorigin="anonymous">
    <link rel="stylesheet" href="https://cdn.datatables.net/1.10.23/css/dataTables.bootstrap4.min.css">
    <link rel="stylesheet" href="https://cdn.datatables.net/responsive/2.2.7/css/responsive.bootstrap4.min.css">




    <link href="{{ asset('css/app.css') }}" rel="stylesheet">
    <link href="{{ asset('css/odonto.css') }}" rel="stylesheet">
</head>

<body>
    <div id="app">
        @guest
        @else
        <nav class="navbar navbar-expand-md navbar-light bg-white shadow-sm">
            <div class="container">

                <a class="navbar-brand" href="#">
                    <!-- <-Acá se puede poner un enlace -->
                    <!-- *Acá se puede poner un nombre* -->
                </a>

                <button class="navbar-toggler" type="button" data-toggle="collapse" data-target="#navbarSupportedContent" aria-controls="navbarSupportedContent" aria-expanded="false" aria-label="{{ __('Toggle navigation') }}">
                    <span class="navbar-toggler-icon"></span>
                </button>

                <div class="collapse navbar-collapse" id="navbarSupportedContent">
                    <!-- Left Side Of Navbar -->
                    <ul class="navbar-nav mr-auto">
                        <li class="nav-item"><a class="nav-link" href="{{ route('home') }}">Home</a></li>
                        <li class="nav-item"><a class="nav-link" href="{{ route('atenciones.index') }}">Atenciones</a></li>
                        <li class="nav-item"><a class="nav-link" href="{{ route('pacientes.index') }}">Pacientes</a></li>
                        <li class="nav-item"><a class="nav-link" href="{{ route('insumos.index') }}">Insumos</a></li>
                        <li class="nav-item"><a class="nav-link" href="{{ route('comprainsumos.index') }}">Compras</a></li>
                        <li class="nav-item"><a class="nav-link" href="{{ route('ortodoncias.index') }}">Fichas Ort</a></li>
                        <li class="nav-item"><a class="nav-link" href="{{ route('nomeclaturas.index') }}">Nomeclaturas</a></li>
                        @auth
                        @if (auth()->user()->rol == 1)
                        <li class="nav-item"><a class="nav-link" href="{{ route('reportes.index') }}">Reportes</a></li>
                        <li class="nav-item"><a class="nav-link" href="{{ route('empleados.index') }}">Usuarios</a></li>
                        @endif
                        @endauth
                    </ul>

                    <!-- Right Side Of Navbar -->
                    <ul class="navbar-nav ml-auto">
                        <!-- Authentication Links -->
                        <li class="nav-item dropdown">
                            <a id="navbarDropdown" class="nav-link dropdown-toggle" href="#" role="button" data-toggle="dropdown" aria-haspopup="true" aria-expanded="false" v-pre>
                                {{ Auth::user()->nombre }} <span class="caret"></span>
                            </a>

                            <div class="dropdown-menu dropdown-menu-right" aria-labelledby="navbarDropdown">
                                @if (auth()->user()->rol != 1)
                                    <a class="dropdown-item" href="{{ route('empleados.configuracion') }}"> Configuración </a>
                                @endif
                                <a class="dropdown-item" href="{{ route('logout') }}" onclick="event.preventDefault();
                                                     document.getElementById('logout-form').submit();">
                                    {{ __('Salir') }}
                                </a>

                                <form id="logout-form" action="{{ route('logout') }}" method="POST" style="display: none;">
                                    @csrf
                                </form>
                            </div>
                        </li>
                        @endguest
                    </ul>
                </div>
            </div>
        </nav>

        <main class="py-4">
            @if ( session('mensaje') )
            <div class="container">
                <div class="row justify-content-center">
                    <div class="col-md-8">
                        <div class="alert alert-success alert-dismissable">
                            <button type="button" class="close" data-dismiss="alert" aria-label="Close">
                                <span aria-hidden="true">&times;</span>
                            </button>
                            {{ session('mensaje') }}
                        </div>
                    </div>
                </div>
            </div>
            @endif
            @yield('content')
        </main>
    </div>
</body>

</html>