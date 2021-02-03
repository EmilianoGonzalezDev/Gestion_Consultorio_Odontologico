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

        <h2>Registros eliminados de historial de compras de insumo</h2>

        <table id="comprainsumos">
            <thead>
            <tr>
                <th>#N°</th>
                <th>Cód</th>
                <th>Insumo</th>
                <th>Marca</th>
                <th>Contenido</th>
                <th>Costo</th>
                <th>Comprado</th>
                <th>Fecha Compra</th>
                <th>Eliminado por</th>
                <th>Eliminado el</th>
                <th>Acciones</th>
            </tr>
            </thead>
            <tbody>
                <?php $__currentLoopData = $comprainsumos; $__env->addLoop($__currentLoopData); foreach($__currentLoopData as $compra): $__env->incrementLoopIndices(); $loop = $__env->getLastLoop(); ?>  <!-- En cada vuelta, guarda una fila de la tabla CompraInsumos en la variable $compra --> 
                    <?php if($compra->insumo): ?> 
                        <?php $insumo = $compra->insumo->find($compra->insumo_id) ?>
                        <tr>
                            <th scope="row"><?php echo e($compra->id); ?></th>
                            <td><?php echo e($compra->insumo_id); ?></td>
                            <td><?php echo e($insumo->nombre); ?></td>
                            <td><?php echo e($insumo->marca); ?></td>
                            <td><?php echo e($insumo->contenido_cantidad); ?> <?php echo e($insumo->contenido_unidad); ?></td>
                            <td>$<?php echo e($compra->precio_compra); ?></td>
                            <td><?php echo e($compra->cantidad_adquirida); ?></td>
                            <td><?php echo e($compra->fecha_compra->formatLocalized('%d/%m/%Y')); ?></td>
                            <td><?php echo e($compra->eliminado_por); ?></td>
                            <td><?php echo e($compra->deleted_at->formatLocalized('%d/%m/%Y')); ?></td>
                            <td>
                                    <div class="btn-group-sm" role="group" aria-label="Basic example">
                                        <form action="<?php echo e(route('comprainsumos.restore', $compra)); ?>" class="d-inline">
                                                <?php echo csrf_field(); ?>
                                                <input type=button class="btn btn-warning btn-sm btn-group" value="Restaurar"
                                                    onclick="if(confirm('Se restaurará este registro de compra de insumo ¿Continuar?')){this.form.submit();}"/>
                                        </form>
                                    </div>                  
                                </td>
                        </tr>
                    <?php endif; ?>
                <?php endforeach; $__env->popLoop(); $loop = $__env->getLastLoop(); ?>
            </tbody>
        </table>
        <a href="<?php echo e(route('comprainsumos.index')); ?>" class="btn btn-secondary btn-sm float-right">Volver</a>
    </div>

    <script>
    $(document).ready( function ()
    {
        $('#comprainsumos').DataTable
        ({
            "language": { "url": "//cdn.datatables.net/plug-ins/1.10.19/i18n/Spanish.json" },
            responsive: true
        });
    });

    </script>
  

<?php $__env->stopSection(); ?>
<?php echo $__env->make('layouts.app', \Illuminate\Support\Arr::except(get_defined_vars(), ['__data', '__path']))->render(); ?><?php /**PATH C:\laragon\www\odonto\resources\views/comprainsumos/eliminados.blade.php ENDPATH**/ ?>