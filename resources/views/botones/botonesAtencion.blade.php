<div class='btn-group-sm dt-col-nowrap' role='group'>

    <a href='{{ route('atenciones.show',$id) }}' class='btn btn-info'>Ver</a>

    <a href='{{ route('atenciones.edit', $id) }}' class='btn btn-dark'>Editar</a>

    <form action='{{ route('atenciones.destroy', $id) }}' method='POST' class='d-inline'>
        @method('DELETE')
        @csrf
        <input type='button' class='btn btn-danger btn-sm' value='Eliminar' onclick='if (confirm("Se eliminará el registro ¿Continuar?")){this.form.submit();}' />
    </form>

    @if (($importe > $pago) && (auth()->user()->rol != 1))
    <a href='{{ route('atenciones.nuevoPago',$id ) }}' class='btn btn-warning'>pago</a>
    @endif
    
</div>