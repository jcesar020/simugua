@extends('layouts.admin')
@section('title')
    {{'Creando zona'}}
    <?php $menu['parametros']='zona'; ?>
@endsection
@section('content')
    @include('alerts.request')
    {!! link_to('/zona','Regresar a lista', ['class'=>'btn btn-info'], null) !!}
    {!! AppForm::open(['route'=>'zona.store', 'method'=>'POST']) !!}

    @include('zona.partials.fields')

    {!! AppForm::submit('Registrar') !!}

    {!!AppForm::close() !!}
@endsection