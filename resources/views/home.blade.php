@extends('layouts.admin');
@include('alerts.errors')
@section('style')
    {!! Html::style('css/plugins/dataTables/dataTables.bootstrap.css') !!}
    {!! Html::style('css/plugins/dataTables/dataTables.responsive.css') !!}

    @endsection
@section('content')
    <div class="ibox">


        {!! Html::image('img/fondo_agua.JPG') !!}



    </div>
    @endsection
@section('script')
    {!! Html::script('js/plugins/dataTables/jquery.dataTables.js') !!}
    {!! Html::script('js/plugins/dataTables/dataTables.responsive.js') !!}
    {!! Html::script('js/plugins/dataTables/dataTables.bootstrap.js') !!}

    @endsection