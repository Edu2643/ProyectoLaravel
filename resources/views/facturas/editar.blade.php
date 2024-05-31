@extends('master')
@section('titulo','Editar una factura')

@section('contenido')
    <div class="container text-center">
        <h1>Editar Factura</h1>
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

        {!! Form::model($factura, ['route' => ['facturas.update', $factura->id], 'method' => 'PUT', 'files' => true]) !!}
            <div class="form-group">
                {!! Form::label('numero', 'Número de factura') !!}
                {!! Form::text('numero', null, ['class'=>'form-control', 'required'=>'required', 'placeholder'=>'Número de factura...']) !!}
            </div>
            <div class="form-group">
                {!! Form::label('valor', 'Valor') !!}
                {!! Form::text('valor', null, ['class'=>'form-control', 'required'=>'required', 'placeholder'=>'Valor de la factura...']) !!}
            </div>
            <div class="form-group">
                {!! Form::label('detalles', 'Detalles') !!}
                
                {!! Form::textarea('detalles', null, ['id' => 'editor', 'class' => 'form-control ckeditor', 'placeholder' => 'Detalles de la factura...']) !!}
            </div>
            <div class="form-group">
         {!! Form::label('idcliente', 'Clientes:') !!}
           {!! Form::select('idcliente', $clientes, null, ['class' => 'form-control ']) !!}
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
                {!! Form::label('archivo', 'Archivo') !!}
                {!! Form::file('archivo', ['class'=>'form-control', 'placeholder'=>'archivo']) !!}
            </div>
            <br>
            {!! Form::submit('Guardar Factura', ['class'=>'btn btn-success']) !!}
        {!! Form::close() !!}
        <hr>
    </div>
@endsection