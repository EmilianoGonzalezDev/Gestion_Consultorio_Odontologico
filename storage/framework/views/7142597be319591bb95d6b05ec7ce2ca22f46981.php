<!DOCTYPE html>
<html lang="<?php echo e(str_replace('_', '-', app()->getLocale())); ?>">
<head>
    <meta charset="utf-8">
    <meta name="viewport" content="width=device-width, initial-scale=1">

    <!-- CSRF Token -->
    <meta name="csrf-token" content="<?php echo e(csrf_token()); ?>">

    <title><?php echo e(config('app.name', 'Odontología Haenggi')); ?></title>

    <!-- Scripts -->
    <script src="<?php echo e(asset('js/app.js')); ?>"></script>
    <script src="https://code.jquery.com/jquery-3.4.1.js"></script>
    <script src="https://cdn.datatables.net/1.10.19/js/jquery.dataTables.min.js" defer></script>
    <script src="https://cdn.datatables.net/1.10.19/js/dataTables.bootstrap4.min.js" defer></script>
    <script src="https://cdn.datatables.net/responsive/2.2.6/js/dataTables.responsive.min.js" defer></script>



    <!-- Fonts -->
    <link rel="dns-prefetch" href="//fonts.gstatic.com">
    <link href="https://fonts.googleapis.com/css?family=Nunito" rel="stylesheet">

    <!-- Styles -->
    <link rel="stylesheet" href="https://cdnjs.cloudflare.com/ajax/libs/twitter-bootstrap/4.1.3/css/bootstrap.css">
    <link rel="stylesheet" href="https://cdn.datatables.net/1.10.19/css/dataTables.bootstrap4.min.css">
    <link rel="stylesheet" href="https://cdn.datatables.net/responsive/2.2.6/css/responsive.dataTables.min.css">
    <link href="<?php echo e(asset('css/app.css')); ?>" rel="stylesheet">
    
</head>
<body>
    <div id="app">
        <?php if(auth()->guard()->guest()): ?>
        <?php else: ?>
        <nav class="navbar navbar-expand-md navbar-light bg-white shadow-sm">
            <div class="container">
                
                <a class="navbar-brand" href="#"> <!-- <-Acá se puede poner un enlace -->
                   <!-- *Acá se puede poner un nombre* -->
                </a>

                <button class="navbar-toggler" type="button" data-toggle="collapse" data-target="#navbarSupportedContent" aria-controls="navbarSupportedContent" aria-expanded="false" aria-label="<?php echo e(__('Toggle navigation')); ?>">
                    <span class="navbar-toggler-icon"></span>
                </button>

                <div class="collapse navbar-collapse" id="navbarSupportedContent">
                    <!-- Left Side Of Navbar -->
                    <ul class="navbar-nav mr-auto">
                        <li class="nav-item"><a class="nav-link" href="<?php echo e(route('home')); ?>">Home</a></li>
                        <li class="nav-item"><a class="nav-link" href="<?php echo e(route('atenciones.index')); ?>">Atenciones</a></li>
                        <li class="nav-item"><a class="nav-link" href="<?php echo e(route('pacientes.index')); ?>">Pacientes</a></li>
                        <li class="nav-item"><a class="nav-link" href="<?php echo e(route('insumos.index')); ?>">Insumos</a></li>
                        <li class="nav-item"><a class="nav-link" href="<?php echo e(route('comprainsumos.index')); ?>">Compras</a></li>
                        <li class="nav-item"><a class="nav-link" href="<?php echo e(route('ortodoncias.index')); ?>">Fichas Ort</a></li>
                        <?php if(auth()->guard()->check()): ?>
                            <?php if(auth()->user()->rol == 1): ?>
                                <li class="nav-item"><a class="nav-link" href="<?php echo e(route('reportes.index')); ?>">Reportes</a></li>
                                <li class="nav-item"><a class="nav-link" href="<?php echo e(route('empleados.index')); ?>">Usuarios</a></li>
                            <?php endif; ?>
                        <?php endif; ?>
                    </ul>

                    <!-- Right Side Of Navbar -->
                    <ul class="navbar-nav ml-auto">
                        <!-- Authentication Links -->
                            <li class="nav-item dropdown">
                                <a id="navbarDropdown" class="nav-link dropdown-toggle" href="#" role="button" data-toggle="dropdown" aria-haspopup="true" aria-expanded="false" v-pre>
                                    <?php echo e(Auth::user()->nombre); ?> <span class="caret"></span>
                                </a>

                                <div class="dropdown-menu dropdown-menu-right" aria-labelledby="navbarDropdown">
                                    <a class="dropdown-item" href="<?php echo e(route('logout')); ?>"
                                       onclick="event.preventDefault();
                                                     document.getElementById('logout-form').submit();">
                                        <?php echo e(__('Salir')); ?>

                                    </a>

                                    <form id="logout-form" action="<?php echo e(route('logout')); ?>" method="POST" style="display: none;">
                                        <?php echo csrf_field(); ?>
                                    </form>
                                </div>
                            </li>
                        <?php endif; ?>
                    </ul>
                </div>
            </div>
        </nav>

        <main class="py-4">
            <?php echo $__env->yieldContent('content'); ?>
        </main>
    </div>
</body>
</html>
<?php /**PATH C:\laragon\www\odonto\resources\views/layouts/app.blade.php ENDPATH**/ ?>