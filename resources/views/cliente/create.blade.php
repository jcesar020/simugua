@extends('layouts.admin')
@section('title')
    {{'Creando cliente'}}
    <?php $menu['catalogos']='cliente'; ?>
@endsection
    @section('content')
    @include('alerts.request')
    {!! link_to('/cliente','Regresar', ['class'=>'btn btn-info'], null) !!}
        {!! AppForm::open(['route'=>'cliente.store', 'method'=>'POST']) !!}

        @include('cliente.form.clie')
        {!! AppForm::submit('Registrar') !!}

        {!!AppForm::close() !!}
    @endsection