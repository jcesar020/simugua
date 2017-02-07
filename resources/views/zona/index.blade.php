@extends('layouts.admin')
@section('title')
    {{'Listado de zonas'}}
    <?php $menu['parametros']='zona'; ?>
@endsection
@section('content')
    {!! link_to_route('zona.create','Nuevo Registro',null,['class'=>'btn btn-info']) !!}
    @include('zona.partials.table')
    {!!$zonas->render()!!}
   @endsection
