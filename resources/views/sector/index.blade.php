@extends('layouts.admin')
@section('title')
    {{'Listando sectores'}}
    <?php $menu['parametros']='sector'; ?>
@endsection

@section('content')
    {!! link_to_route('sector.create','Nuevo Registro',null,['class'=>'btn btn-info']) !!}
    @include('sector.partials.table')
   @endsection
