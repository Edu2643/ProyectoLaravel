<!-- Formulario de edición del cliente -->
{!! Form::model($perfil, ['route' => ['perfiles.update', $perfil->id], 'method' => 'PUT']) !!}
    <div class="form-group">
        {!! Form::label('nombre', 'Nombre del perfil', ['class' => 'titulo-blanco']) !!}
        {!! Form::text('nombre', null, ['class' => 'form-control', 'placeholder' => 'Nombre del perfil...']) !!}
    </div>
    
    {!! Form::submit('Guardar Cambios', ['class' => 'btn btn-primary']) !!}
{!! Form::close() !!}

<style>
    .titulo-blanco {
    color: #ffffff; /* Color blanco */
}
</style>