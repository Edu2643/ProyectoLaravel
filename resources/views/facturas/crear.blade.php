@extends('master')
@section('titulo', 'Crear una Factura')

@section('contenido')
<div class="container text-center">
    <h1>Crear Factura</h1>
    <br>
    
    @if ($errors->any())
        <div class="alert alert-danger">
            <ul>
                @foreach ($errors->all() as $error)
                    <li>{{ $error }}</li>
                @endforeach
            </ul>
        </div>
    @endif

    {!! Form::open(['route' => 'facturas.store', 'enctype' => 'multipart/form-data']) !!}
        <div class="form-group">
            {!! Form::label('numero', 'Número de la factura:') !!}
            {!! Form::text('numero', null, ['class' => 'form-control', 'required' => 'required', 'placeholder' => 'Número de la factura...']) !!}
        </div>
        <div class="form-group">
            {!! Form::label('valor', 'Valor de la factura:') !!}
            {!! Form::text('valor', null, ['class' => 'form-control', 'required' => 'required', 'placeholder' => 'Valor de la factura...']) !!}
        </div>
        <div class="form-group">
            {!! Form::label('detalles', 'Detalles de la factura:') !!}
                {!! Form::textarea('detalles', null, ['id' => 'editor', 'class' => 'form-control ckeditor', 'placeholder' => 'Detalles de la factura...']) !!}
<script>
    CKEDITOR.replace('editor');
</script>


        </div>
        <div class="form-group">
         {!! Form::label('idcliente', 'Clientes:') !!}
           {!! Form::select('idcliente', $clientes, null, ['class' => 'form-control']) !!}
        </div>

        <div class="form-group">
            {!! Form::label('idforma', 'Formas de Pago:') !!}
            {!! Form::select('idforma', $formas, null, ['class' => 'form-control']) !!}
        </div>
        <div class="form-group">
            {!! Form::label('idestado', 'Estados:') !!}
            {!! Form::select('idestado', $estados, null, ['class' => 'form-control']) !!}
        </div>
        <div class="form-group">
            {!! Form::label('archivo', 'Archivo:') !!}
            {!! Form::file('archivo', ['class' => 'form-control']) !!}
        </div>

        {!! Form::submit('Guardar Factura', ['class' => 'btn btn-success']) !!}
    {!! Form::close() !!}
</div>
@endsection
