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
                Paciente eliminado, si desea deshacer haga <a href="<?php echo e(route('pacientes.restore', [Session::get('deleted')])); ?>">Click aquí</a> </div>
        <?php endif; ?>
     
        <h2>Pacientes</h2>
        <div class="my-4"><a href="<?php echo e(route('pacientes.create')); ?>" class="btn btn-primary btn-sm">Nuevo Paciente</a></div>
        <table id="pacientes" class="display nowrap" cellspacing="0">
            <thead>
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
                <?php $__currentLoopData = $pacientes; $__env->addLoop($__currentLoopData); foreach($__currentLoopData as $paciente): $__env->incrementLoopIndices(); $loop = $__env->getLastLoop(); ?>  <!-- En cada vuelta, guarda una fila de la tabla Pacientes en la variable $paciente -->
                <tr>
                    <th scope="row">
                        <a href="<?php echo e(route('pacientes.show', $paciente)); ?>">
                            <?php echo e($paciente->id); ?>

                        </a></th>
                    <td><?php echo e($paciente->nombre); ?></td>
                    <td><?php echo e($paciente->apellido); ?></td>
                    <td><?php echo e($paciente->dni); ?></td>
                    <td><?php echo e($paciente->telefono); ?></td>
                    <td><?php echo e($paciente->email); ?></td>
                    <td>
                        <div class="btn-group-sm" role="group" aria-label="Basic example">
                            <a href="<?php echo e(route('pacientes.show', $paciente)); ?>" class="btn btn-info btn-group">Ver</a>
                            <a href="<?php echo e(route('pacientes.edit', $paciente)); ?>" class="btn btn-dark btn-group">Editar</a>
                            <form action="<?php echo e(route('pacientes.destroy', $paciente)); ?>" method="POST" class="d-inline">
                                    <?php echo method_field('DELETE'); ?>
                                    <?php echo csrf_field(); ?>
                                    <input type=button class="btn btn-danger btn-sm btn-group" value="Eliminar"
                                            onclick="if(confirm('Se eliminará el paciente ¿Continuar?')){this.form.submit();}"/>
                            </form>
                        </div>                  
                    </td>
                </tr>
                <?php endforeach; $__env->popLoop(); $loop = $__env->getLastLoop(); ?>
            </tbody>
        </table>
        <a href="<?php echo e(route('pacientes.verEliminados')); ?>" class="btn btn-secondary btn-sm float-right">Ver Pacientes Eliminados</a>
    </div>

    <script>
    $(document).ready( function ()
    {
        $('#pacientes').DataTable
        ({
            "language": { "url": "//cdn.datatables.net/plug-ins/1.10.19/i18n/Spanish.json" },
            responsive: true
        });
    });

    </script>
  

<?php $__env->stopSection(); ?>
<?php echo $__env->make('layouts.app', \Illuminate\Support\Arr::except(get_defined_vars(), ['__data', '__path']))->render(); ?><?php /**PATH C:\laragon\www\odonto\resources\views/pacientes/index.blade.php ENDPATH**/ ?>