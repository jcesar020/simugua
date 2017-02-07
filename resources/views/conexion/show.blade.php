@extends('layouts.admin')
@section('title')
    {{'Editando conexion'}}
    <?php $menu['catalogos'] = 'conexion'; ?>
@endsection
@section('style')
    {!!Html::style("css/plugins/datapicker/datepicker3.css")!!}
    {!!Html::style("css/plugins/chosen/chosen.css")!!}
    {!!Html::style("css/plugins/awesome-bootstrap-checkbox/awesome-bootstrap-checkbox.css")!!}
@stop

@section('content_title')
    <h2>Informacion de la conexion</h2>
@endsection
@section('content')

    @include('conexion.partials.infogral')
    <div class="row">
        <div class="col-lg-8">
            @include('conexion.partials.consumo')
            @include('conexion.partials.facturas')
        </div>
        <div class="col-lg-4">
            @include('conexion.partials.log')
        </div>
    </div>
@endsection
@section('script')
    {!!Html::script('js/plugins/datapicker/bootstrap-datepicker.js')!!}
    {!!Html::script('js/project/datepicker.js')!!}

    {!!Html::script('js/plugins/chartJs/Chart.min.js')!!}
    @include('conexion.partials.char')
    {{--{!!Html::script('js/project/barChar.js')!!}--}}
@endsection