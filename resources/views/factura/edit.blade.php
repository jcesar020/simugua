@extends('layouts.admin')


@section('script_head')
    {!! Html::script('js/angular.min.js') !!}
    @endsection
@section('content_title')
    <h3>Editando Factura</h3>
    @endsection
@section('content')

@include('factura.partials.detalle')

    @endsection