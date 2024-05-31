@extends('master')

@section('titulo', 'Listado de Productos')

@section('contenido')
<div class="container text-center">
    <h1>Listado de Productos</h1>
    <hr>
    <table class="table table-striped table-bordered table-hover table-success">
        <br>
        <thead>
            <tr>
                <th scope="col">Nombre</th>
                <th scope="col">Precio</th>
                <th scope="col">Cantidad</th>
                <th scope="col">Agregar</th>
            </tr>
        </thead>
        <tbody>
            @foreach($productos as $producto)
            <tr>
                <td>{{ $producto->nombre }}</td>
                <td>{{ $producto->precio }}</td>
                <td>{{ $producto->cantidad }}</td>
                <td>
                    <a type="button" class="btn btn-success" href="{{route('carrito-agregar',$producto->id)}}">
                        <i class="bi bi-cart3"></i>
                    </a>
                </td>
            </tr>
            @endforeach
        </tbody>
    </table>
    <hr>
</div>
@endsection
