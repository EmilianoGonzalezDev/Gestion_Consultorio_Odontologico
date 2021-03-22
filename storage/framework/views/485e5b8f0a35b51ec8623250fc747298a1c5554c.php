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
<h2 style="text-align: center;">Pacientes - Registros Eliminados</h2>

<!-- Tabla -->
<div class="div_tabla my-4">
    <table id="pacientes_elim" class="table table-hover table-responsive">
        <thead class="thead-light">
            <tr>
                <th>Cód</th>
                <th>Nombre</th>
                <th>Apellido</th>
                <th>DNI</th>
                <th>Teléfono</th>
                <th>E-mail</th>
                <th>Acciones</th>
            </tr>
        </thead>
        <tbody>
            <?php $__currentLoopData = $pacientes; $__env->addLoop($__currentLoopData); foreach($__currentLoopData as $paciente): $__env->incrementLoopIndices(); $loop = $__env->getLastLoop(); ?>
            <tr>
                <th scope="row">
                    <a href="<?php echo e(route('pacientes.show', $paciente)); ?>">
                        <?php echo e($paciente->id); ?>

                    </a>
                </th>
                <td><?php echo e($paciente->nombre); ?></td>
                <td><?php echo e($paciente->apellido); ?></td>
                <td><?php echo e($paciente->dni); ?></td>
                <td><?php echo e($paciente->telefono); ?></td>
                <td><?php echo e($paciente->email); ?></td>
                <td>
                    <div class="btn-group-sm dt-col-nowrap" role="group" aria-label="Basic example">
                        <a href="<?php echo e(route('pacientes.show', $paciente)); ?>" class="btn btn-info btn-group">Ver</a>
                        <form action="<?php echo e(route('pacientes.restore', $paciente)); ?>" class="d-inline">
                            <?php echo csrf_field(); ?>
                            <input type=button class="btn btn-warning btn-sm btn-group" value="Restaurar" onclick="if(confirm('Se restaurará el paciente ¿Continuar?')){this.form.submit();}" />
                        </form>
                    </div>
                </td>
            </tr>
            <?php endforeach; $__env->popLoop(); $loop = $__env->getLastLoop(); ?>
        </tbody>
    </table>
    <a href="<?php echo e(route('pacientes.index')); ?>" class="btn btn-secondary btn-sm float-right">Volver</a>
</div>

<!-- Scripts -->
<script>
    $(document).ready(function() {
        $('#pacientes_elim').DataTable({
            "language": {
                "url": "//cdn.datatables.net/plug-ins/1.10.19/i18n/Spanish.json"
            },
            responsive: true
        });
    });
</script>
<?php $__env->stopSection(); ?>
<?php echo $__env->make('layouts.app', \Illuminate\Support\Arr::except(get_defined_vars(), ['__data', '__path']))->render(); ?><?php /**PATH C:\laragon\www\odonto\resources\views/pacientes/eliminados.blade.php ENDPATH**/ ?>