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
     
        <h2>Fichas de ortodoncia eliminadas</h2>

        <table id="ortodoncias">
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
                <th>Eliminado por</th>
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
                    <td><?php echo e($ortodoncia->eliminado_por); ?> el <?php echo e($ortodoncia->deleted_at->formatLocalized('%d/%m/%Y %H:%M')); ?></td>
                    <td>
                            <div class="btn-group-sm" role="group" aria-label="Basic example">
                                <a href="<?php echo e(route('pacientes.show', $ortodoncia->paciente_id)); ?>" class="btn btn-info btn-group">Ver</a>
                                <form action="<?php echo e(route('ortodoncias.restore', $ortodoncia)); ?>" class="d-inline">
                                        <?php echo csrf_field(); ?>
                                        <input type=button class="btn btn-danger btn-sm btn-group" value="Restaurar"
                                               onclick="if(confirm('Se restaurará la ficha de ortodoncia ¿Continuar?')){this.form.submit();}"/>
                                </form>
                            </div>                  
                        </td>
                </tr>
                <?php endforeach; $__env->popLoop(); $loop = $__env->getLastLoop(); ?>
            </tbody>
        </table>
        <a href="<?php echo e(route('ortodoncias.index')); ?>" class="btn btn-secondary btn-sm float-right">Volver</a>
    </div>

    <script>
    $(document).ready( function ()
    {
        $('#ortodoncias').DataTable
        ({
            "language": { "url": "//cdn.datatables.net/plug-ins/1.10.19/i18n/Spanish.json" }
        });
    });

    </script>
  

<?php $__env->stopSection(); ?>
<?php echo $__env->make('layouts.app', \Illuminate\Support\Arr::except(get_defined_vars(), ['__data', '__path']))->render(); ?><?php /**PATH C:\laragon\www\odonto\resources\views/ortodoncias/eliminados.blade.php ENDPATH**/ ?>