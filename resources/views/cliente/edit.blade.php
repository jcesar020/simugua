@extends('layouts.admin')
@section('title')
    {{'Editando cliente'}}
    <?php $menu['catalogos']='cliente'; ?>
@endsection
@section('content')
    @include('alerts.request')
    {!! link_to('/cliente','Regresar', ['class'=>'btn btn-info'], null) !!}
    {!! AppForm::open(['model'=>$cliente, 'update'=>'cliente.update', 'method'=>'PUT']) !!}
        @include('cliente.form.clie')
    <div class="col-md-2 ">
        {!! AppForm::submit('Actualizar') !!}
    </div>
    {!!AppForm::close() !!}
        <div class="col-md-2 col-md-offset-8">
    {!! Form::open(['route'=>['cliente.destroy', $cliente], 'method'=>'DELETE']) !!}
        {!! Form::submit('Eliminar', ['class'=>'btn btn-danger']) !!}
    {!! Form::close() !!}
    </div>
@endsection