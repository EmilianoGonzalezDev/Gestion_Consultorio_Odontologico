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
                Elemento eliminado, si desea deshacer haga <a href="<?php echo e(route('insumos.restore', [Session::get('deleted')])); ?>">Click aquí</a> </div>
        <?php endif; ?>
     
        <h2>Insumos</h2>
        <div class="my-4 btn-group-sm">
            <a href="<?php echo e(route('insumos.create')); ?>" class="btn btn-primary">Nuevo Insumo</a>
            <a href="<?php echo e(route('comprainsumos.index')); ?>" class="btn btn-secondary">Ver Compras</a>
        </div>
        <table id="insumos">
            <thead>
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
                <?php $__currentLoopData = $insumos; $__env->addLoop($__currentLoopData); foreach($__currentLoopData as $insumo): $__env->incrementLoopIndices(); $loop = $__env->getLastLoop(); ?>  <!-- En cada vuelta, guarda una fila de Insumos en la variable $insumo -->
                <tr>
                    <th scope="row">
                        <a href="<?php echo e(route('insumos.show', $insumo)); ?>">
                            <?php echo e($insumo->id); ?>

                        </a></th>
                    <td><?php echo e($insumo->nombre); ?></td>
                    <td><?php echo e($insumo->marca); ?></td>
                    <td><?php echo e($insumo->contenido_cantidad); ?> <?php echo e($insumo->contenido_unidad); ?></td>
                    <td><?php echo e($insumo->detalles); ?></td>
                    <td><?php echo e($insumo->stock); ?></td>
                    <td>
                            <div class="btn-group-sm" role="group" aria-label="Basic example">
                                <a href="<?php echo e(route('insumos.show', $insumo)); ?>" class="btn btn-info btn-group">Ver</a>
                                <a href="<?php echo e(route('insumos.edit', $insumo)); ?>" class="btn btn-dark btn-group">Editar</a>
                                <a href="<?php echo e(route('comprainsumos.crearDesdeListado', $insumo)); ?>" class="btn btn-warning btn-group">Agregar</a>
                                <?php if( $insumo->stock == 0): ?>
                                    <form action="<?php echo e(route('insumos.destroy', $insumo)); ?>" method="POST" class="d-inline">
                                            <?php echo method_field('DELETE'); ?>
                                            <?php echo csrf_field(); ?>
                                            <input type=button class="btn btn-danger btn-sm btn-group" value="Eliminar"
                                                onclick="if (confirm('Se eliminará el insumo y todo el historial de compras (stock) ¿Continuar?')){this.form.submit();}"/>
                                    </form>
                                <?php else: ?>
                                    <a href="<?php echo e(route('insumos.reducirStock', $insumo)); ?>" class="btn btn-danger btn-group">Reducir</a>
                                <?php endif; ?>
                            </div>                  
                        </td>
                </tr>
                <?php endforeach; $__env->popLoop(); $loop = $__env->getLastLoop(); ?>
            </tbody>
        </table>
        <a href="<?php echo e(route('insumos.verEliminados')); ?>" class="btn btn-secondary btn-sm float-right">Ver Eliminados</a>
    </div>

    <script>
    $(document).ready( function ()
    {
        $('#insumos').DataTable
        ({
            "language": { "url": "//cdn.datatables.net/plug-ins/1.10.19/i18n/Spanish.json" }
        });
    });

    </script>
  

<?php $__env->stopSection(); ?>
<?php echo $__env->make('layouts.app', \Illuminate\Support\Arr::except(get_defined_vars(), ['__data', '__path']))->render(); ?><?php /**PATH C:\laragon\www\odonto\resources\views/insumos/index.blade.php ENDPATH**/ ?>