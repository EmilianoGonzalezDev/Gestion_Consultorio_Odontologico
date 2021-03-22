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
<h2 style="text-align: center;">Insumos - Registros Eliminados</h2>

<!-- Tabla -->
<div class="div_tabla my-4">
    <table id="insumos_elim" class="table table-hover table-responsive">
        <thead class="thead-light">
            <tr>
                <th>Cód</th>
                <th>Elemento</th>
                <th>Marca</th>
                <th>Contenido</th>
                <th>Detalles</th>
                <th>Stock</th>
                <th>Acciones</th>
            </tr>
        </thead>
        <tbody>
            <?php $__currentLoopData = $insumos; $__env->addLoop($__currentLoopData); foreach($__currentLoopData as $insumo): $__env->incrementLoopIndices(); $loop = $__env->getLastLoop(); ?>
            <tr>
                <th scope="row">
                    <a href="<?php echo e(route('insumos.show', $insumo)); ?>">
                        <?php echo e($insumo->id); ?>

                    </a>
                </th>
                <td><?php echo e($insumo->nombre); ?></td>
                <td><?php echo e($insumo->marca); ?></td>
                <td><?php echo e($insumo->contenido_cantidad); ?> <?php echo e($insumo->contenido_unidad); ?></td>
                <td><?php echo e($insumo->detalles); ?></td>
                <td><?php echo e($insumo->stock); ?></td>
                <td>
                    <div class="btn-group-sm dt-col-nowrap" role="group" aria-label="Basic example">
                        <a href="<?php echo e(route('insumos.show', $insumo)); ?>" class="btn btn-info btn-group">Ver</a>
                        <form action="<?php echo e(route('insumos.restore', $insumo)); ?>" class="d-inline">
                            <?php echo csrf_field(); ?>
                            <input type=button class="btn btn-warning btn-sm btn-group" value="Restaurar" onclick="if(confirm('Se restaurará el insumo ¿Continuar?')){this.form.submit();}" />
                        </form>
                    </div>
                </td>
            </tr>
            <?php endforeach; $__env->popLoop(); $loop = $__env->getLastLoop(); ?>
        </tbody>
    </table>
    <a href="<?php echo e(route('insumos.index')); ?>" class="btn btn-secondary btn-sm float-right my-4">Volver</a>
</div>

<script>
    $(document).ready(function() {
        $('#insumos_elim').DataTable({
            "language": {
                "url": "//cdn.datatables.net/plug-ins/1.10.19/i18n/Spanish.json"
            },
            responsive: true
        });
    });
</script>


<?php $__env->stopSection(); ?>
<?php echo $__env->make('layouts.app', \Illuminate\Support\Arr::except(get_defined_vars(), ['__data', '__path']))->render(); ?><?php /**PATH C:\laragon\www\odonto\resources\views/insumos/eliminados.blade.php ENDPATH**/ ?>