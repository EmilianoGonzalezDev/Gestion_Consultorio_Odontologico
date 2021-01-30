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
                Ortodoncia eliminado, si desea deshacer haga <a href="<?php echo e(route('ortodoncias.restore', [Session::get('deleted')])); ?>">Click aquí</a> </div>
        <?php endif; ?>
     
        <h2>Ortodoncias</h2>
        <div class="my-4"><a href="<?php echo e(route('ortodoncias.create')); ?>" class="btn btn-primary btn-sm">Nuevo Ortodoncia</a></div>
        <table id="ortodoncias">
            <thead>
            <tr>
                <th>#N°</th>
                <th>Nombre</th>
                <th>Descripción</th>
                <th>Precio Recomendado</th>
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
                    <td><?php echo e($ortodoncia->nombre); ?></td>
                    <td><?php echo e($ortodoncia->descripcion); ?></td>
                    <td><?php echo e($ortodoncia->precio_recomendado); ?></td>
                    <td>
                            <div class="btn-group-sm" role="group" aria-label="Basic example">
                                <a href="<?php echo e(route('ortodoncias.edit', $ortodoncia)); ?>" class="btn btn-dark btn-group">Editar</a>
                                <form action="<?php echo e(route('ortodoncias.destroy', $ortodoncia)); ?>" method="POST" class="d-inline">
                                        <?php echo method_field('DELETE'); ?>
                                        <?php echo csrf_field(); ?>
                                        <input type=button class="btn btn-danger btn-sm btn-group" value="Eliminar"
                                               onclick="if(confirm('Se eliminará el ortodoncia ¿Continuar?')){this.form.submit();}"/>
                                </form>
                                <a href="<?php echo e(route('ortodoncias.show', $ortodoncia)); ?>" class="btn btn-info btn-group">+Info</a>
                            </div>                  
                        </td>
                </tr>
                <?php endforeach; $__env->popLoop(); $loop = $__env->getLastLoop(); ?>
            </tbody>
        </table>
        <a href="<?php echo e(route('ortodoncias.verEliminados')); ?>" class="btn btn-secondary btn-sm float-right">Ver Ortodoncias Eliminados</a>
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
<?php echo $__env->make('layouts.app', \Illuminate\Support\Arr::except(get_defined_vars(), ['__data', '__path']))->render(); ?><?php /**PATH C:\laragon\www\odonto\resources\views/ortodoncias/index.blade.php ENDPATH**/ ?>