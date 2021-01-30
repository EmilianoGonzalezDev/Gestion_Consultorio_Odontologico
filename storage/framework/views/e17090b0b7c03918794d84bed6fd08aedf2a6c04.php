<?php $__env->startSection('content'); ?>

<div class="container my-4">

    <?php if(Session::has('deleted')): ?>
    <div class="alert alert-warning alert-dismissable" role="alert">
            <button type="button" class="close" data-dismiss="alert" aria-label="Close">
                    <span aria-hidden="true">&times;</span>
            </button>
        Registro eliminado, si desea deshacer haga <a href="<?php echo e(route('insumos.restaurarReduccion', [Session::get('deleted')])); ?>">Click aquí</a> </div>
    <?php endif; ?>    

    <a href="<?php echo e(route('insumos.index')); ?>" class="btn btn-primary btn-sm" role="button">Volver</a>
    <a href="<?php echo e(route('comprainsumos.crearDesdeListado', $insumo)); ?>" class="btn btn-warning btn-sm">Agregar stock</a>
    <h1><br>#<?php echo e($insumo->id); ?> - <?php echo e($insumo->nombre); ?> <?php echo e($insumo->marca); ?></h1>
    
    <!-- AVISO DE ELIMINADO -->
    <div class="col-md-8">
        <?php if( $insumo->deleted_at != null ): ?>
            <div class="alert alert-danger">
                Elemento dado de baja (eliminado)
            </div>
        <?php endif; ?>

        <!-- DATOS -->
        <div class="card">
            <div class="card-header">Detalles</div>
            <div class="card-body">
                    <table>
                    <tr><td><b>Stock restante:</b></td><td>  <?php echo e($insumo->stock); ?></td></tr>
                    <tr><td><b>Stock bajo en:</b></td><td>  <?php echo e($insumo->stock_bajo); ?></td></tr>
                    <tr><td><b>Contenido:</b></td><td>  <?php echo e($insumo->contenido_cantidad); ?> <?php echo e($insumo->contenido_unidad); ?></td></tr>
                    <tr><td><b>Detalles:</b></td><td>  <?php echo e($insumo->detalles); ?></td></tr>
                    </table>
                    <br><i><b>Creado:</b> <?php echo e($insumo->created_at->formatLocalized('%d/%m/%Y %H:%M')); ?> por <?php echo e($insumo->creado_por); ?></i>
                    <?php if( $insumo->eliminado_por != null ): ?>
                    <br><i><b>Eliminado:</b> <?php echo e($insumo->deleted_at->formatLocalized('%d/%m/%Y %H:%M')); ?> por <?php echo e($insumo->eliminado_por); ?></i>
                    <?php elseif( $insumo->editado_por != null ): ?>
                    <br><b>Actualizado:</b> <?php echo e($insumo->updated_at->formatLocalized('%A %d de %B de %Y a las %H:%M')); ?> por <?php echo e($insumo->editado_por); ?>

                    <?php endif; ?>
            </div>
        </div>
    </div>
        
    <!-- HISTORIAL COMPRAS  -->
    <div style="display: inline-block;"> 
    <br>
    <h4>Historial de Compras</h4>
    <table id="historial_stock" border=1>
            <thead>
                <tr>
                    <th>#</th>
                    <th>Fecha</th>
                    <th>Cantidad</th>
                    <th>Precio $</th>
                    <th>Registrado por</th>
                </tr>
            </thead>
            <tbody>           
                <?php $__currentLoopData = $compras; $__env->addLoop($__currentLoopData); foreach($__currentLoopData as $compra): $__env->incrementLoopIndices(); $loop = $__env->getLastLoop(); ?>
                            <tr>
                                <th scope="row"><?php echo e($compra->id); ?></th>
                                <th><?php echo e($compra->fecha_compra->formatLocalized('%d/%m/%Y %H:%M')); ?></th>
                                <th><?php echo e($compra->cantidad_adquirida); ?></th>
                                <th><?php echo e($compra->precio_compra); ?></th>
                                <th><?php echo e($compra->creado_por); ?></th>
                            </tr>
                <?php endforeach; $__env->popLoop(); $loop = $__env->getLastLoop(); ?>
            </tbody>
    </table>
    </div>

     <!-- HISTORIAL Reducciones Stock  -->
    <div style="display: inline-block;">
    <br>
    <h4>Reducciones de Stock</h4>
    <table id="reducciones_stock" border=1>
            <thead>
                <tr>
                    <th>#</th>
                    <th>Fecha</th>
                    <th>Cantidad</th>
                    <th>Registrado por</th>
                    <th>Acciones</th>
                </tr>
            </thead>
            <tbody>           
                <?php $__currentLoopData = $reducciones; $__env->addLoop($__currentLoopData); foreach($__currentLoopData as $reduccion): $__env->incrementLoopIndices(); $loop = $__env->getLastLoop(); ?>
                            <tr>
                                <th scope="row"><?php echo e($reduccion->id); ?></th>
                                <th><?php echo e($reduccion->fecha->formatLocalized('%d/%m/%Y %H:%M')); ?></th>
                                <th><?php echo e($reduccion->cantidad); ?></th>
                                <th><?php echo e($reduccion->creado_por); ?></th>
                                <td>
                                    <div class="btn-group-sm" role="group" aria-label="Basic example">
                                        <form action="<?php echo e(route('insumos.deshacerReduccion', $reduccion)); ?>" method="POST" class="d-inline">
                                                <?php echo method_field('DELETE'); ?>
                                                <?php echo csrf_field(); ?>
                                                <input type=button class="btn btn-danger btn-sm btn-group" value="Eliminar"
                                                        onclick="if(confirm('Se eliminará la acción ¿Continuar?')){this.form.submit();}"/>
                                        </form>
                                    </div>                  
                                </td>
                            </tr>
                <?php endforeach; $__env->popLoop(); $loop = $__env->getLastLoop(); ?>
            </tbody>
    </table>
    </div>


</div>

<?php $__env->stopSection(); ?>
<?php echo $__env->make('layouts.app', \Illuminate\Support\Arr::except(get_defined_vars(), ['__data', '__path']))->render(); ?><?php /**PATH C:\laragon\www\odonto\resources\views/insumos/detalles.blade.php ENDPATH**/ ?>