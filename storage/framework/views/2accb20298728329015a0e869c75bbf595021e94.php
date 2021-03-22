<?php $__env->startSection('content'); ?>

<!-- Mensajes post acción -->
<div class="container my-4">
    <?php if( session('mensaje') ): ?>
    <div class="alert alert-success alert-dismissable">
        <button type="button" class="close" data-dismiss="alert" aria-label="Close">
            <span aria-hidden="true">&times;</span>
        </button>
        <?php echo e(session('mensaje')); ?>

    </div>
    <?php endif; ?>
</div>

<!-- Título -->
<h2 style="text-align: center;">Atenciones - Registros Eliminados</h2>

<!-- Tabla -->
<div class="div_tabla my-4">
    <table id="atenciones_elim" class="table table-hover table-responsive">
        <thead class="thead-light">
            <tr>
                <th>#</th>
                <th>Profesional</th>
                <th>Paciente</th>
                <th>Nombre P.</th>
                <th>Apellido P.</th>
                <th>Importe</th>
                <th>Pago</th>
                <th>Saldo</th>
                <th>Fecha</th>
                <th>Hora</th>
                <th>Acciones</th>
            </tr>
        </thead>
        <tbody>
            <?php $__currentLoopData = $atenciones; $__env->addLoop($__currentLoopData); foreach($__currentLoopData as $atencion): $__env->incrementLoopIndices(); $loop = $__env->getLastLoop(); ?>
            <tr>
                <th scope="row"><a href="<?php echo e(route('atenciones.show', $atencion)); ?>"><?php echo e($atencion->id); ?></a></th>
                <td><?php echo e(App\User::empleado($atencion->user_id)->nombre); ?> <?php echo e(App\User::empleado($atencion->user_id)->apellido); ?></td>
                <td><a href="<?php echo e(route('pacientes.show', $atencion->paciente_id)); ?>">Pac #<?php echo e($atencion->paciente_id); ?></a></td>
                <td><?php echo e(App\Paciente::paciente($atencion->paciente_id)->nombre); ?></td>
                <td><?php echo e(App\Paciente::paciente($atencion->paciente_id)->apellido); ?></td>
                <td>$<?php echo e($atencion->importe); ?></td>
                <td>$<?php echo e($atencion->pago); ?></td>
                <td>$<?php echo e($atencion->importe - $atencion->pago); ?></td>
                <td><?php echo e($atencion->fecha->formatLocalized('%d/%m/%Y')); ?></td>
                <td><?php echo e($atencion->hora); ?></td>
                <td>
                    <div class="btn-group-sm dt-col-nowrap" role="group" aria-label="Basic example">
                        <a href="<?php echo e(route('atenciones.show', $atencion)); ?>" class="btn btn-info btn-group">Ver</a>
                        <form action="<?php echo e(route('atenciones.restore', $atencion)); ?>" class="d-inline">
                            <?php echo csrf_field(); ?>
                            <input type=button class="btn btn-warning btn-sm btn-group" value="Restaurar" onclick="if (confirm('Se restaurará este registro de atencion incluyendo el importe y el pago ¿Continuar?')){this.form.submit();}" />
                        </form>
                    </div>
                </td>
            </tr>
            <?php endforeach; $__env->popLoop(); $loop = $__env->getLastLoop(); ?>
        </tbody>
    </table>
    <a href="<?php echo e(route('atenciones.index')); ?>" class="btn btn-secondary btn-sm float-right my-4">Volver</a>
</div>

<!-- Scripts -->
<script>
    $(document).ready(function() {
        $('#atenciones_elim').DataTable({
            "language": {
                "url": "//cdn.datatables.net/plug-ins/1.10.19/i18n/Spanish.json"
            },
            responsive: true
        });
    });
</script>
<?php $__env->stopSection(); ?>
<?php echo $__env->make('layouts.app', \Illuminate\Support\Arr::except(get_defined_vars(), ['__data', '__path']))->render(); ?><?php /**PATH C:\laragon\www\odonto\resources\views/atenciones/eliminados.blade.php ENDPATH**/ ?>