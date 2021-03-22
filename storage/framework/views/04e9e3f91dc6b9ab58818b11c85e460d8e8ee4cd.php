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

    <?php if(Session::has('deleted')): ?>
    <div class="alert alert-warning alert-dismissable" role="alert">
        <button type="button" class="close" data-dismiss="alert" aria-label="Close">
            <span aria-hidden="true">&times;</span>
        </button>
        Registro de compra eliminado, si desea deshacer haga <a href="<?php echo e(route('comprainsumos.restore', [Session::get('deleted')])); ?>">Click aquí</a>
    </div>
    <?php endif; ?>
</div>

<!-- Título y botón "Nuevo" -->
<div class="div_titulo">
    <h2>Historial de compra de insumos</h2>
    <div class="my-4 btn-group-sm">
        <a href="<?php echo e(route('comprainsumos.create')); ?>" class="btn btn-primary">Nueva Compra</a>
        <a href="<?php echo e(route('insumos.index')); ?>" class="btn btn-secondary">Ver Insumos</a>
    </div>
</div>

<!-- Tabla -->
<div class="div_tabla">
    <table id="comprainsumos" class="table table-hover table-responsive">
        <thead class="thead-light">
            <tr>
                <th>#N°</th>
                <th>Cód</th>
                <th>Insumo</th>
                <th>Marca</th>
                <th>Contenido</th>
                <th>Costo</th>
                <th>Comprados</th>
                <th>Comprado por</th>
                <th>Registrado por</th>
                <th>Fecha Compra</th>
                <th>Acciones</th>
            </tr>
        </thead>
        <tbody>
            <?php $__currentLoopData = $comprainsumos; $__env->addLoop($__currentLoopData); foreach($__currentLoopData as $compra): $__env->incrementLoopIndices(); $loop = $__env->getLastLoop(); ?>
            <?php if($compra->insumo): ?>
            <!-- ( "Si existe el insumo para esta compra..." ) | evita error al intentar mostrar info sobre insumos eliminados -->
            <?php
            $insumo = App\Insumo::find($compra->insumo_id);
            $profesional = App\User::find($compra->user_id);
            ?>
            <tr>
                <th scope="row"><?php echo e($compra->id); ?></th>
                <td><?php echo e($compra->insumo_id); ?></td>
                <td><?php echo e($insumo->nombre); ?></td>
                <td><?php echo e($insumo->marca); ?></td>
                <td><?php echo e($insumo->contenido_cantidad); ?> <?php echo e($insumo->contenido_unidad); ?></td>
                <td>$<?php echo e($compra->precio_compra); ?></td>
                <td><?php echo e($compra->cantidad_adquirida); ?></td>
                <td><?php echo e($profesional->nombre); ?> <?php echo e($profesional->apellido); ?></td>
                <td><?php echo e($compra->creado_por); ?></td>
                <td><?php echo e($compra->fecha_compra->formatLocalized('%d/%m/%Y')); ?></td>
                <td>
                    <div class="btn-group-sm dt-col-nowrap" role="group" aria-label="Basic example">
                        <?php if($compra->cantidad_adquirida <= $insumo->stock ): ?>
                            <form action="<?php echo e(route('comprainsumos.destroy', $compra)); ?>" method="POST" class="d-inline">
                                <?php echo method_field('DELETE'); ?>
                                <?php echo csrf_field(); ?>
                                <input type="button" class="btn btn-danger btn-sm" value="Eliminar" onclick="if(confirm('Se eliminará este registro de compra de insumo ¿Continuar?')){this.form.submit();}" />
                            </form>
                            <?php endif; ?>
                    </div>
                </td>
            </tr>
            <?php endif; ?>
            <?php endforeach; $__env->popLoop(); $loop = $__env->getLastLoop(); ?>
        </tbody>
    </table>
    <a href="<?php echo e(route('comprainsumos.verEliminados')); ?>" class="btn btn-secondary btn-sm float-right">Ver Registros Eliminados</a>
</div>

<!-- Scripts -->
<script>
    $(document).ready(function() {
        $('#comprainsumos').DataTable({
            "language": {
                "url": "//cdn.datatables.net/plug-ins/1.10.19/i18n/Spanish.json"
            },
            responsive: true
        });
    });
</script>

<?php $__env->stopSection(); ?>
<?php echo $__env->make('layouts.app', \Illuminate\Support\Arr::except(get_defined_vars(), ['__data', '__path']))->render(); ?><?php /**PATH C:\laragon\www\odonto\resources\views/comprainsumos/index.blade.php ENDPATH**/ ?>