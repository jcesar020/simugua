@extends('layouts.admin')
@section('title')
    {{'Creando medidor'}}
    <?php $menu['catalogos']='medidor'; ?>
@endsection
@section('style')
    {!!Html::style("css/plugins/datapicker/datepicker3.css")!!}
@endsection
@section('content')
    @section('content')
    @include('alerts.request')
    {!! link_to('/medidor','Regresar', ['class'=>'btn btn-info'], null) !!}
        {!! AppForm::open(['route'=>'medidor.store', 'method'=>'POST']) !!}

        <div class="form-group">
            {!!Form::label('id','Serie ID:', ['class'=>'control-label col-sm-2'])!!}
            <div class="col-sm-2">
                {!!Form::text('id', null, ['class'=>'form-control', 'placeholder'=>'Ingresa el numero de serie'])!!}
            </div>
        </div>

        @include('medidor.partials.fields')

        {!! AppForm::submit('Registrar') !!}

        {!!AppForm::close() !!}
    @endsection

@section('script')
    {!!Html::script('js/plugins/datapicker/bootstrap-datepicker.js')!!}
    {!!Html::script('js/project/datepicker.js')!!}
@stop
