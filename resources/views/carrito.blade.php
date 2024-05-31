@extends('master')

@section('titulo', 'Carrito')

@section('contenido')
@if($carrito !== null)
    <div class="container text-center">
        <h1>Carrito de Items</h1>
        <hr>

        <p>
            <a href="{{ route('carrito-vaciar') }}" class="btn btn-danger">
                Vaciar Carrito <i class="fa fa-trash"></i>
            </a>
        </p>

        <table class="table table-striped table-bordered table-hover table-success">
            <br>
            <thead>
                <tr>
                    <th scope="col">Nombre</th>
                    <th scope="col">Precio</th>
                    <th scope="col">Cantidad</th>
                    <th scope="col">Total</th>
                    <th scope="col">Borrar</th>
                </tr>
            </thead>
            <tbody>
                @foreach($carrito as $item)
                    <tr>
                        <td>{{ $item->nombre }}</td>
                        <td>{{ number_format($item->precio, 0) }}</td>
                        <td>
                            <input type="number" min="1" max="50" value="{{ $item->cantidad }}" id="producto_{{ $item->id }}">
                            <a href="#" class="btn btn-warning btn-update-item" data-href="{{ route('carrito-actualizar', $item->id) }}" data-id="{{ $item->id }}">
                                <i class="bi bi-arrow-clockwise"></i>
                            </a>
                        </td>
                        <td>{{ $item->precio * $item->cantidad }}</td>
                        <td>
                            <a type="button" class="btn btn-success" href="{{ route('carrito-borrar', $item->id) }}">
                                <i class="bi bi-cart-x"></i>
                            </a>
                        </td>
                    </tr>
                @endforeach
            </tbody>
        </table>
        <hr>
        <h3><span class="label label-success">${{ number_format($total) }}</span></h3>
        <p><a class="btn btn-info" href="{{route('productos.index')}}">
    <i class="fa fa-chevron-circle-left"></i>Seguir Agregando </a>
     @if(count($carrito))
     <a class="btn btn-success" href="{{ route('ordenar') }}">
    Ordenar <i class="fa fa-chevron-circle-right"></i>
        </a>

    @endif
    </div>
    
@else
    <div class="container text-center">
        <h1><span class="label label-warning">No hay productos en el carrito</span></h1>
        
    </div>
@endif

<!-- Tu código JavaScript -->
<script>
$(document).ready(function(){

    $(".btn-update-item").on('click', function(e){
        e.preventDefault();

        var id = $(this).data('id');
        var href = $(this).data('href');
        var cantidad = $("#producto_" + id).val();

        window.location.href = href + "/" + cantidad;
    });

});
</script>
@endsection

