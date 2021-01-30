<?php $__env->startSection('content'); ?>

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
                Registro eliminado, si desea deshacer haga <a href="<?php echo e(route('atenciones.restore', [Session::get('deleted')])); ?>">Click aquí</a> </div>
        <?php endif; ?>
     
        <h2>Atenciones</h2>
        <div class="my-4 btn-group-sm">
            <a href="<?php echo e(route('atenciones.create')); ?>" class="btn btn-primary">Registrar Nueva</a>
        </div>
        <table id="atenciones">
            <thead>
            <tr>
                <th>#Atenc</th>
                <th>Profesional</th>
                <th>Paciente</th>
                <th>Nombre</th>
                <th>Apellido</th>
                <th>Importe</th>
                <th>Pago</th>
                <th>Saldo</th>
                <th>Fecha</th>
                <th>Hora</th>
                <th>Acciones</th>
            </tr>
            </thead>
            <tbody>
                <?php $__currentLoopData = $atenciones; $__env->addLoop($__currentLoopData); foreach($__currentLoopData as $atencion): $__env->incrementLoopIndices(); $loop = $__env->getLastLoop(); ?>  <!-- En cada vuelta, guarda una fila de la tabla Atencion en la variable $atencion -->
                
                <tr>
                    <th scope="row">
                            <a href="<?php echo e(route('atenciones.show', $atencion)); ?>">
                                <?php echo e($atencion->id); ?>

                            </a>
                        </th>
                    <td><?php echo e(App\User::empleado($atencion->user_id)->nombre); ?> <?php echo e(App\User::empleado($atencion->user_id)->apellido); ?></td>
                    <td>Pac #<?php echo e($atencion->paciente_id); ?></a></td>
                    <td><a href="<?php echo e(route('pacientes.show', $atencion->paciente_id)); ?>"><?php echo e(App\Paciente::paciente($atencion->paciente_id)->nombre); ?></td>
                    <td><a href="<?php echo e(route('pacientes.show', $atencion->paciente_id)); ?>"><?php echo e(App\Paciente::paciente($atencion->paciente_id)->apellido); ?></a></td>
                    <td>$<?php echo e($atencion->importe); ?></td>
                    <td>$<?php echo e($atencion->pago); ?></td>
                    <td>$<?php echo e($atencion->importe - $atencion->pago); ?></td>
                    <td><?php echo e($atencion->fecha->formatLocalized('%d/%m/%Y')); ?></td>
                    <td><?php echo e(\Carbon\Carbon::parse($atencion->hora)->formatLocalized('%H:%M')); ?></td>
                    <td>
                            <div class="btn-group-sm" role="group" aria-label="Basic example">
                                <a href="<?php echo e(route('atenciones.show', $atencion)); ?>" class="btn btn-info btn-group">Ver</a>
                                <a href="<?php echo e(route('atenciones.edit', $atencion)); ?>" class="btn btn-dark btn-group">Editar</a>
                                <form action="<?php echo e(route('atenciones.destroy', $atencion)); ?>" method="POST" class="d-inline">
                                        <?php echo method_field('DELETE'); ?>
                                        <?php echo csrf_field(); ?>
                                        <input type=button class="btn btn-danger btn-sm btn-group" value="Eliminar"
                                               onclick="if (confirm('Se eliminará este registro de atencion incluyendo el importe y los pagos ¿Continuar?')){this.form.submit();}"/>
                                </form>
                                <?php if($atencion->importe > $atencion->pago): ?>
                                    <a href="<?php echo e(route('atenciones.nuevoPago',$atencion )); ?>" class="btn btn-warning btn-group">pago</a>
                                <?php endif; ?>
                            </div>                  
                    </td>
                </tr>
                <?php endforeach; $__env->popLoop(); $loop = $__env->getLastLoop(); ?>
            </tbody>
        </table>
        <a href="<?php echo e(route('atenciones.verEliminados')); ?>" class="btn btn-secondary btn-sm float-right">Ver Eliminados</a>
    </div>

    <script>
    $(document).ready( function ()
    {
        $('#atenciones').DataTable
        ({
            "language": { "url": "//cdn.datatables.net/plug-ins/1.10.19/i18n/Spanish.json" }
        });
    });
    </script>
  

<?php $__env->stopSection(); ?>
<?php echo $__env->make('layouts.app', \Illuminate\Support\Arr::except(get_defined_vars(), ['__data', '__path']))->render(); ?><?php /**PATH C:\laragon\www\odonto\resources\views/atenciones/index.blade.php ENDPATH**/ ?>