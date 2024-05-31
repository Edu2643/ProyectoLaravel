@extends('master')

@section('titulo', 'Listado de Usuarios')
@section('contenido')
    <div class="container text-center">
    <h1>Listado de Usuarios</h1>
    
    {!! Form::open(['route' => 'usuarios.index', 'method' => 'GET', 'class' => 'navbar-form']) !!}
    <div class="input-group">
        {!! Form::text('name', null, ['class' => 'form-control', 'id' => 'numero', 'placeholder' => 'Buscar Usuario']) !!}
        <br>
        {!! Form::submit('Buscar Nombre', ['class' => 'btn btn-primary']) !!}
        <a href="{{ route('usuarios.index') }}" class="btn btn-primary">Restablecer Usuarios</a>
    </div>
    <br>
{!! Form::close() !!}





    <!-- Botón para abrir el modal -->
<button type="button" class="btn btn-success" data-bs-toggle="modal" data-bs-target="#crearClienteModal">
    Crear Nuevo Usuario
</button>

<!-- Modal para crear un nuevo cliente -->
<div class="modal fade" id="crearClienteModal" tabindex="-1" aria-labelledby="exampleModalLabel" aria-hidden="true">
    <div class="modal-dialog">
        <div class="modal-content">
            <div class="modal-header">
                <h5 class="modal-title">Crear Usuario</h5>
                <button type="button" class="btn-close" data-bs-dismiss="modal" aria-label="Close"></button>
            </div>
            <div class="modal-body">
                <!-- Aquí sSe carga la vista crear.blade.php -->
                <form action="{{ route('usuarios.store') }}" method="POST">
    @csrf
    <div class="mb-3">
        <label for="name" class="form-label">Nombre</label>
        <input type="text" class="form-control" id="name" name="name" placeholder="Nombre del Usuario" required>
    </div>
    <div class="mb-3">
        <label for="email" class="form-label">Correo Electrónico</label>
        <input type="email" class="form-control" id="email" name="email" placeholder="Correo Electrónico" required>
    </div>
    <div class="mb-3">
        <label for="password" class="form-label">Contraseña</label>
        <input type="password" class="form-control" id="password" name="password" placeholder="Contraseña" required>
    </div>
    <div class="mb-3">
        <label for="password_confirmation" class="form-label">Confirmar Contraseña</label>
        <input type="password" class="form-control" id="password_confirmation" name="password_confirmation" placeholder="Confirmar Contraseña" required>
    </div>
    
    <div class="form-group">
         {!! Form::label('idperfil', 'Perfil:') !!}
           {!! Form::select('idperfil', $perfiles, null, ['class' => 'form-control']) !!}
        </div>
    <button type="submit" class="btn btn-primary">Guardar Usuario</button>
</form>

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
                    <th scope="col">Corre</th>
                    <th scope="col">ID Perfil</th>
                    
                </tr>
            </thead>
            <tbody>
                <!-- Aquí deberías agregar tus filas de datos si tienes alguna -->
            </tbody>

            @foreach($usuarios as $usuario)
            <tr>
                <td>
                    <!-- Botón para abrir el modal de edición de cliente -->
                    <a class="bi bi-pencil-square btn btn-primary" data-bs-toggle="modal" data-bs-target="#editarClienteModal{{ $usuario->id }}"></a>
                    

                    <!-- Modal para editar un cliente -->
                    <div class="modal fade" id="editarClienteModal{{ $usuario->id }}" tabindex="-1" aria-labelledby="exampleModalLabel" aria-hidden="true">
                        <div class="modal-dialog">
                            <div class="modal-content">
                                <div class="modal-header">
                                    <h5 class="modal-title">Editar Usuario</h5>
                                    <button type="button" class="btn-close" data-bs-dismiss="modal" aria-label="Close"></button>
                                </div>
                                <div class="modal-body">
                                    <!-- Incluir el formulario de edición de cliente aquí -->
                                    <div class="container">
    
    {!! Form::model($usuario, ['route' => ['usuarios.update', $usuario->id], 'method' => 'PUT']) !!}
        <div class="form-group">
            {!! Form::label('name', 'Nombre') !!}
            {!! Form::text('name', null, ['class'=>'form-control', 'required'=>'required', 'placeholder'=>'Nombre...']) !!}
        </div>
        <div class="form-group">
            {!! Form::label('email', 'Correo Electrónico') !!}
            {!! Form::email('email', null, ['class'=>'form-control', 'required'=>'required', 'placeholder'=>'Correo Electrónico...']) !!}
        </div>
        <div class="form-group">
            {!! Form::label('password', 'Contraseña') !!}
            {!! Form::password('password', ['class'=>'form-control', 'placeholder'=>'Contraseña...']) !!}
            <small class="form-text text-muted">Dejar en blanco para mantener la contraseña actual.</small>
        </div>
        <div class="form-group">
            {!! Form::label('password_confirmation', 'Confirmar Contraseña') !!}
            {!! Form::password('password_confirmation', ['class'=>'form-control', 'placeholder'=>'Confirmar Contraseña...']) !!}
        </div>
        <div class="form-group">
            {!! Form::label('idperfil', 'Perfil') !!}
            {!! Form::select('idperfil', $perfiles, null, ['class' => 'form-control']) !!}
        </div>
        <br>
        {!! Form::submit('Guardar Usuario', ['class'=>'btn btn-success']) !!}
    {!! Form::close() !!}
</div>
                                </div>
                            </div>
                        </div>
                    </div>
                </td>
                <td>
                    <!-- Formulario para eliminar un cliente -->
                    <button type="button" class="btn btn-danger" data-bs-toggle="modal" data-bs-target="#eliminarClienteModal{{$usuario->id}}">
<i class="bi bi-trash"></i>
</button>

<!-- Modal para confirmar eliminación del cliente -->
<div class="modal fade" id="eliminarClienteModal{{$usuario->id}}" tabindex="-1" aria-labelledby="eliminarClienteModalLabel{{$usuario->id}}" aria-hidden="true">
<div class="modal-dialog">
    <div class="modal-content">
        <div class="modal-header">
            <h5 class="modal-title" id="eliminarClienteModalLabel{{$usuario->id}}">Eliminar Usuario</h5>
            <button type="button" class="btn-close" data-bs-dismiss="modal" aria-label="Close"></button>
        </div>
        <div class="modal-body text-white">
¿Estás seguro de que deseas eliminar este usuario?
    </div>

        <div class="modal-footer">
            <!-- Formulario para eliminar cliente -->
            {!! Form::open(['route' => ['usuarios.destroy', $usuario->id], 'method' => 'DELETE']) !!}
                <button type="submit" class="btn btn-danger">Eliminar</button>
            {!! Form::close() !!}
            <button type="button" class="btn btn-secondary" data-bs-dismiss="modal">Cancelar</button>
        </div>
    </div>
</div>
</div>
                </td>
                
                
                <td>{{ $usuario->name }}</td>
                <td>{{ $usuario->email }}</td>
                <td>{{ $usuario->idperfil }}</td>

            </tr>
            @endforeach            </table>
            {{ $usuarios->links() }}     
            
    </div>
<br>
@endsection
<style>
.imagen-factura {
    max-width: 85px;
    height: auto; /* Esto mantendrá la proporción de la imagen */
}
</style>
<style>
    label {
    color: #ffffff; /* Color blanco */
}
</style>
