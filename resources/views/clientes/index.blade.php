    @extends('master')

    @section('titulo', 'Listado de Clientes')
    @section('contenido')
        <div class="container text-center">
        <h1>Listado de Clientes</h1>
        
        

        {!! Form::open(['route' => 'clientes.index', 'method' => 'GET', 'class' => 'navbar-form']) !!}
        <div class="input-group">
       {!! Form::text('nombre', null, ['class' => 'form-control', 'id' => 'nombre', 'placeholder' => 'Buscar Cliente']) !!}
        <br>
        {!! Form::submit('Buscar Cliente', ['class' => 'btn btn-primary']) !!}
        <a href="{{ route('clientes.index') }}" class="btn btn-primary">Restablecer Clientes</a>
        </div>
    <br>
{!! Form::close() !!}
    

        <!-- Botón para abrir el modal -->

        @if(Auth::user()->idperfil == 3)
        <button type="button" class="btn btn-success" data-bs-toggle="modal" data-bs-target="#crearClienteModal" disabled>
        Crear Nuevo Cliente
    </button>
        @else
        <button type="button" class="btn btn-success" data-bs-toggle="modal" data-bs-target="#crearClienteModal">
        Crear Nuevo Cliente
    </button>
        @endif
    

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
                    @include('clientes.crear')
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
                        <th scope="col">Id</th>
                        <th scope="col">Nombre</th>
                        <th scope="col">RFC</th>
                        <th scope="col">Direccion</th>
                        <th scope="col">Telefono</th>
                        <th scope="col">Email</th>
                    </tr>
                </thead>
                <tbody>
                    <!-- Aquí deberías agregar tus filas de datos si tienes alguna -->
                </tbody>

                @foreach($clientes as $cliente)
                <tr>
                    <td>
                        <!-- Botón para abrir el modal de edición de cliente -->
                        @if(Auth::user()->idperfil == 3)
                        <a class="bi bi-pencil-square btn btn-primary disabled" data-bs-toggle="modal" data-bs-target="#editarClienteModal{{ $cliente->id }}"></a>
        @else
        <a class="bi bi-pencil-square btn btn-primary" data-bs-toggle="modal" data-bs-target="#editarClienteModal{{ $cliente->id }}"></a>
        @endif
                      
                        

                        <!-- Modal para editar un cliente -->
                        <div class="modal fade" id="editarClienteModal{{ $cliente->id }}" tabindex="-1" aria-labelledby="exampleModalLabel" aria-hidden="true">
                            <div class="modal-dialog">
                                <div class="modal-content">
                                    <div class="modal-header">
                                        <h5 class="modal-title">Editar Cliente</h5>
                                        <button type="button" class="btn-close" data-bs-dismiss="modal" aria-label="Close"></button>
                                    </div>
                                    <div class="modal-body">
                                        <!-- Incluir el formulario de edición de cliente aquí -->
                                        @include('clientes.editar')
                                    </div>
                                </div>
                            </div>
                        </div>
                    </td>
                    <td>
                        <!-- Formulario para eliminar un cliente -->
                        @if(Auth::user()->idperfil == 3)
                        <button type="button" class="btn btn-danger" data-bs-toggle="modal" data-bs-target="#eliminarClienteModal{{$cliente->id}}" disabled>
    <i class="bi bi-trash"></i>
</button>
        @else
        <button type="button" class="btn btn-danger" data-bs-toggle="modal" data-bs-target="#eliminarClienteModal{{$cliente->id}}">
    <i class="bi bi-trash"></i>
</button>
        @endif
                        

<!-- Modal para confirmar eliminación del cliente -->
<div class="modal fade" id="eliminarClienteModal{{$cliente->id}}" tabindex="-1" aria-labelledby="eliminarClienteModalLabel{{$cliente->id}}" aria-hidden="true">
    <div class="modal-dialog">
        <div class="modal-content">
            <div class="modal-header">
                <h5 class="modal-title" id="eliminarClienteModalLabel{{$cliente->id}}">Eliminar Cliente</h5>
                <button type="button" class="btn-close" data-bs-dismiss="modal" aria-label="Close"></button>
            </div>
            <div class="modal-body text-white">
    ¿Estás seguro de que deseas eliminar este cliente?
        </div>

            <div class="modal-footer">
                <!-- Formulario para eliminar cliente -->
                {!! Form::open(['route' => ['clientes.destroy', $cliente->id], 'method' => 'DELETE']) !!}
                    <button type="submit" class="btn btn-danger">Eliminar</button>
                {!! Form::close() !!}
                <button type="button" class="btn btn-secondary" data-bs-dismiss="modal">Cancelar</button>
            </div>
        </div>
    </div>
</div>


                    
                    <td>{{ $cliente->id }}</td>
                    <td>{{ $cliente->nombre }}</td>
                    <td>{{ $cliente->rfc }}</td>
                    <td>{{ $cliente->direccion }}</td>
                    <td>{{ $cliente->telefono }}</td>
                    <td>{{ $cliente->email }}</td>
                </tr>
                
                @endforeach            
                
            </table>
            
        {{ $clientes->links() }}            
        </div>
        
    <br>
    @endsection
    