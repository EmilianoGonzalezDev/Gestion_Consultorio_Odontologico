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
                Registro eliminado, si desea deshacer haga <a href="<?php echo e(route('ortodoncias.restore', [Session::get('deleted')])); ?>">Click aquí</a> </div>
        <?php endif; ?>
     
        <h2>Fichas de ortodoncia</h2>
        <div class="my-4"><a href="<?php echo e(route('ortodoncias.create')); ?>" class="btn btn-primary btn-sm">Crear nueva</a></div>
        <table id="ortodoncias" class="display nowrap" cellspacing="0">
            <thead>
            <tr>
                <th>#Ficha</th>
                <th>Paciente</th>
                <th>Nombre</th>
                <th>Apellido</th>
                <th>Aparatología</th>
                <th>Presupuesto</th>
                <th>Inicial</th>
                <th>Cuota</th>
                <th>Acciones</th>
            </tr>
            </thead>
            <tbody>
                <?php $__currentLoopData = $ortodoncias; $__env->addLoop($__currentLoopData); foreach($__currentLoopData as $ortodoncia): $__env->incrementLoopIndices(); $loop = $__env->getLastLoop(); ?>  <!-- En cada vuelta, guarda una fila de la tabla Ortodoncias en la variable $ortodoncia -->
                <tr>
                    <th scope="row">
                        <a href="<?php echo e(route('ortodoncias.show', $ortodoncia)); ?>">
                            <?php echo e($ortodoncia->id); ?>

                        </a></th>
                    <td>Pac #<?php echo e($ortodoncia->paciente_id); ?></td>
                    <td><a href="<?php echo e(route('pacientes.show', $ortodoncia->paciente_id)); ?>"><?php echo e(App\Paciente::paciente($ortodoncia->paciente_id)->nombre); ?></td>
                    <td><a href="<?php echo e(route('pacientes.show', $ortodoncia->paciente_id)); ?>"><?php echo e(App\Paciente::paciente($ortodoncia->paciente_id)->apellido); ?></a></td>
                    <td><?php echo e($ortodoncia->aparatologia); ?></td>
                    <td><?php echo e($ortodoncia->presupuesto); ?></td>
                    <td><?php echo e($ortodoncia->inicial); ?></td>
                    <td><?php echo e($ortodoncia->cuota); ?></td>
                    <td>
                            <div class="btn-group-sm" role="group" aria-label="Basic example">
                                <a href="<?php echo e(route('pacientes.show', $ortodoncia->paciente_id)); ?>" class="btn btn-info btn-group">Ver</a>
                                <a href="<?php echo e(route('ortodoncias.edit', $ortodoncia)); ?>" class="btn btn-dark btn-group">Editar</a>
                                <form action="<?php echo e(route('ortodoncias.destroy', $ortodoncia)); ?>" method="POST" class="d-inline">
                                        <?php echo method_field('DELETE'); ?>
                                        <?php echo csrf_field(); ?>
                                        <input type=button class="btn btn-danger btn-sm btn-group" value="Eliminar"
                                               onclick="if(confirm('Se eliminará el ortodoncia ¿Continuar?')){this.form.submit();}"/>
                                </form>
                            </div>                  
                        </td>
                </tr>
                <?php endforeach; $__env->popLoop(); $loop = $__env->getLastLoop(); ?>
            </tbody>
        </table>
        <a href="<?php echo e(route('ortodoncias.verEliminados')); ?>" class="btn btn-secondary btn-sm float-right">Ver Eliminados</a>
    </div>

    <script>
    $(document).ready( function ()
    {
        $('#ortodoncias').DataTable
        ({
            "language": { "url": "//cdn.datatables.net/plug-ins/1.10.19/i18n/Spanish.json" },
            responsive: true
        });
    });

    </script>
  

<?php $__env->stopSection(); ?>
<?php echo $__env->make('layouts.app', \Illuminate\Support\Arr::except(get_defined_vars(), ['__data', '__path']))->render(); ?><?php /**PATH C:\laragon\www\odonto\resources\views/ortodoncias/index.blade.php ENDPATH**/ ?>