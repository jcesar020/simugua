@extends('layouts.admin')
@section('title')
    {{'Creando sector'}}
    <?php $menu['parametros']='sector'; ?>
@endsection
@section('content')
    @include('alerts.request')
    {!! link_to('/zona','Regresar a lista', ['class'=>'btn btn-info'], null) !!}
    {!! AppForm::open(['route'=>'sector.store', 'method'=>'POST']) !!}

    @include('sector.partials.fields')

    {!! AppForm::submit('Registrar') !!}

    {!!AppForm::close() !!}
@endsection