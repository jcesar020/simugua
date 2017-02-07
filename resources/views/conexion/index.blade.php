@extends('layouts.admin')
@section('title')
    {{'Listando conexiones'}}
    <?php $menu['catalogos']='conexion'; ?>
@endsection
@section('style')
    {!! HTML::style('css/plugins/dataTables/dataTables.bootstrap.css') !!}
    {!! HTML::style('css/plugins/dataTables/dataTables.responsive.css') !!}

    @endsection
@section('content_title')
    <h2>Listado de conexiones</h2>
    @endsection
@section('barraherramientas')
    <a href="{{route('conexion.create')}}" class="btn btn-info"><i class="fa fa-plus">  Nuevo Registro</i> </a>
    {{--{!! link_to_route('conexion.create','Nuevo Registro',null,['class'=>'btn btn-info']) !!}--}}
    @endsection
@section('content')

    @include('conexion.partials.table')
@endsection
@section('script')
    {!! HTML::script('js/plugins/dataTables/jquery.dataTables.js') !!}
    {!! HTML::script('js/plugins/dataTables/dataTables.bootstrap.js') !!}
    {!! HTML::script('js/plugins/dataTables/dataTables.responsive.js') !!}
    {!! HTML::script('js/project/datatable.js') !!}

    @endsection