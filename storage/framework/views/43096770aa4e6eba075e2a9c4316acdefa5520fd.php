<?php $__env->startSection('content'); ?>
<?php if(auth()->guard()->check()): ?>
    <?php if(auth()->user()->rol == 1): ?>
        <div class="container my-4">
            <?php if( session('mensaje') ): ?> 
                <div class="alert alert-success alert-dismissable">
                        <button type="button" class="close" data-dismiss="alert" aria-label="Close">
                                <span aria-hidden="true">&times;</span>
                        </button>
                    <?php echo e(session('mensaje')); ?>

                </div>
            <?php endif; ?>

            <?php if(Session::has('deleted')): ?>
                <div class="alert alert-warning alert-dismissable" role="alert">
                        <button type="button" class="close" data-dismiss="alert" aria-label="Close">
                                <span aria-hidden="true">&times;</span>
                        </button>
                    Empleado eliminado, si desea deshacer haga <a href="<?php echo e(route('empleados.restore', [Session::get('deleted')])); ?>">Click aquí</a> </div>
            <?php endif; ?>
        
            <h2>Usuarios</h2>
            <div class="my-4"><a href="<?php echo e(route('empleados.create')); ?>" class="btn btn-primary btn-sm">Nuevo Usuario</a></div>
            <table id="empleados" class="display nowrap" cellspacing="0">
                <thead>
                <tr>
                    <th>Cód</th>
                    <th>Usuario</th>
                    <th>Nombre</th>
                    <th>Apellido</th>
                    <th>DNI</th>
                    <th>Teléfono</th>
                    <th>Odont.</th>
                    <th>E-mail</th>
                    <th>Rol</th>
                    <th>Acciones</th>
                </tr>
                </thead>
                <tbody>
                    <?php $__currentLoopData = $empleados; $__env->addLoop($__currentLoopData); foreach($__currentLoopData as $empleado): $__env->incrementLoopIndices(); $loop = $__env->getLastLoop(); ?>  <!-- En cada vuelta, guarda una fila de la tabla Empleados en la variable $empleado -->
                    <tr>
                        <th scope="row">
                            <a href="<?php echo e(route('empleados.show', $empleado)); ?>">
                                <?php echo e($empleado->id); ?>

                            </a>
                        </th>
                        <td><?php echo e($empleado->usuario); ?></td>
                        <td><?php echo e($empleado->nombre); ?></td>
                        <td><?php echo e($empleado->apellido); ?></td>
                        <td><?php echo e($empleado->dni); ?></td>
                        <td><?php echo e($empleado->telefono); ?></td>
                        <td><?php if($empleado->odontologo): ?> Si <?php else: ?> No <?php endif; ?></td>
                        <td><?php echo e($empleado->email); ?></td>
                        <td><?php echo e($empleado->rol); ?></td>
                        <td>
                                <div class="btn-group-sm" role="group" aria-label="Basic example">
                                    <a href="<?php echo e(route('empleados.show', $empleado)); ?>" class="btn btn-info btn-group">Ver</a>
                                    <a href="<?php echo e(route('empleados.edit', $empleado)); ?>" class="btn btn-dark btn-group">Editar</a>
                                    <form action="<?php echo e(route('empleados.destroy', $empleado)); ?>" method="POST" class="d-inline">
                                            <?php echo method_field('DELETE'); ?>
                                            <?php echo csrf_field(); ?>
                                            <input type=button class="btn btn-danger btn-sm btn-group" value="Eliminar"
                                                onclick="if(confirm('Se eliminará el empleado ¿Continuar?')){this.form.submit();}"/>
                                    </form>
                                </div>                  
                            </td>
                    </tr>
                    <?php endforeach; $__env->popLoop(); $loop = $__env->getLastLoop(); ?>
                </tbody>
            </table>
            <a href="<?php echo e(route('empleados.verEliminados')); ?>" class="btn btn-secondary btn-sm float-right">Ver Usuarios Eliminados</a>
        </div>

        <script>
        $(document).ready( function ()
        {
            $('#empleados').DataTable
            ({
                "language": { "url": "//cdn.datatables.net/plug-ins/1.10.19/i18n/Spanish.json" },
                responsive: true
            });
        });
        </script>
    
    <?php endif; ?>
<?php endif; ?>
<?php $__env->stopSection(); ?>
<?php echo $__env->make('layouts.app', \Illuminate\Support\Arr::except(get_defined_vars(), ['__data', '__path']))->render(); ?><?php /**PATH C:\laragon\www\odonto\resources\views/empleados/index.blade.php ENDPATH**/ ?>