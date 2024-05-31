@extends('master')

@section('titulo', 'Listado de Perfiles')
@section('contenido')
    <div class="container text-center">
    <h1>Listado de Perfiles</h1>
    
    {!! Form::open(['route' => 'perfiles.index', 'method' => 'GET', 'class' => 'navbar-form']) !!}
    <div class="input-group">
        {!! Form::text('nombre', null, ['class' => 'form-control', 'id' => 'nombre', 'placeholder' => 'Buscar Perfil']) !!}
        <br>
        {!! Form::submit('Buscar Perfil', ['class' => 'btn btn-primary']) !!}
        <a href="{{ route('perfiles.index') }}" class="btn btn-primary">Restablecer Perfiles</a>
    </div>
    <br>
{!! Form::close() !!}





    <!-- Botón para abrir el modal -->
<button type="button" class="btn btn-success" data-bs-toggle="modal" data-bs-target="#crearClienteModal">
    Crear Nuevo Perfil
</button>

<!-- Modal para crear un nuevo cliente -->
<div class="modal fade" id="crearClienteModal" tabindex="-1" aria-labelledby="exampleModalLabel" aria-hidden="true">
    <div class="modal-dialog">
        <div class="modal-content">
            <div class="modal-header">
                <h5 class="modal-title">Crear Cliente</h5>
                <button type="button" class="btn-close" data-bs-dismiss="modal" aria-label="Close"></button>
            </div>
            <div class="modal-body">
                <!-- Aquí sSe carga la vista crear.blade.php -->
                @include('perfiles.crear')
            </div>
        </div>
    </div>
</div>

    <br>
    <table class="table table-striped table-bordered table-hover table-success">
    <br>
    <div class="container">
            <thead>
                <tr>
                    <th scope="col">Actualizar</th>
                    <th scope="col">Eliminar</th>
                    <th scope="col">Nombre</th>
                    
                </tr>
            </thead>
            <tbody>
                <!-- Aquí deberías agregar tus filas de datos si tienes alguna -->
            </tbody>

            @foreach($perfiles as $perfil)
            <tr>
                <td>
                    <!-- Botón para abrir el modal de edición de cliente -->
                    <a class="bi bi-pencil-square btn btn-primary" data-bs-toggle="modal" data-bs-target="#editarClienteModal{{ $perfil->id }}"></a>
                    

                    <!-- Modal para editar un cliente -->
                    <div class="modal fade" id="editarClienteModal{{ $perfil->id }}" tabindex="-1" aria-labelledby="exampleModalLabel" aria-hidden="true">
                        <div class="modal-dialog">
                            <div class="modal-content">
                                <div class="modal-header">
                                    <h5 class="modal-title">Editar Cliente</h5>
                                    <button type="button" class="btn-close" data-bs-dismiss="modal" aria-label="Close"></button>
                                </div>
                                <div class="modal-body">
                                    <!-- Incluir el formulario de edición de cliente aquí -->
                                    @include('perfiles.editar')
                                </div>
                            </div>
                        </div>
                    </div>
                </td>
                <td>
                    <!-- Formulario para eliminar un cliente -->
                    <button type="button" class="btn btn-danger" data-bs-toggle="modal" data-bs-target="#eliminarClienteModal{{$perfil->id}}">
<i class="bi bi-trash"></i>
</button>

<!-- Modal para confirmar eliminación del cliente -->
<div class="modal fade" id="eliminarClienteModal{{$perfil->id}}" tabindex="-1" aria-labelledby="eliminarClienteModalLabel{{$perfil->id}}" aria-hidden="true">
<div class="modal-dialog">
    <div class="modal-content">
        <div class="modal-header">
            <h5 class="modal-title" id="eliminarClienteModalLabel{{$perfil->id}}">Eliminar Perfil</h5>
            <button type="button" class="btn-close" data-bs-dismiss="modal" aria-label="Close"></button>
        </div>
        <div class="modal-body text-white">
¿Estás seguro de que deseas eliminar este Perfil?
    </div>

        <div class="modal-footer">
            <!-- Formulario para eliminar cliente -->
            {!! Form::open(['route' => ['perfiles.destroy', $perfil->id], 'method' => 'DELETE']) !!}
                <button type="submit" class="btn btn-danger">Eliminar</button>
            {!! Form::close() !!}
            <button type="button" class="btn btn-secondary" data-bs-dismiss="modal">Cancelar</button>
        </div>
    </div>
</div>
</div>
                </td>
                
                <!--<td>{{ $perfil->id }}</td>-->
                <td>{{ $perfil->nombre }}</td>

            </tr>
            @endforeach            </table>
            {{ $perfiles->links() }} 
    </div>
<br>
@endsection
