@extends('layouts.admin')
    @section('title')
        {{'Listado de clientes'}}
        <?php $menu['catalogos']='cliente'; ?>
        @endsection
    @section('style')
       {!! Html::style('css/plugins/dataTables/dataTables.bootstrap.css') !!}
        {!! Html::style('css/plugins/dataTables/dataTables.responsive.css') !!}
    @endsection
    @section('content')
        @include('alerts.errors')
        <div class="panel-body">
            <!-- <form role="search" class="navbar-form navbar-left pull-right"> -->
                {!! Form::model(Request::all(),['route'=>'cliente.index', 'method'=>'GET', 'class'=>'navbar-form navbar-left pull-right', 'role'=>'search']) !!}
                <div class="form-group">
                    {!! Form::text('name', null, ['class'=>'form-control', 'placeholder'=>'Busqueda']) !!}
                    {!! Form::select('tipo', $tipos, null, ['class'=>'form-control', 'placeholder'=>'Seleccione un tipo']) !!}
                </div>
                <button type="submit" class="btn btn-default">Buscar</button>

            {!! Form::close() !!}
            <p>
                {!! link_to_route('cliente.create','Nuevo Registro',null,['class'=>'btn btn-info']) !!}

            </p>
                <p>Hay {{$clientes->total()}} usuarios
                </p>
        </div>

      <!-- <div class="ibox-content"> -->

        <div class="table-responsive">

           <!-- <table class="table table-striped table-bordered table-hover dataTables-example" > -->
            @include('cliente.partials.table')
            {!! $clientes->appends(Request::only(['name', 'tipo']))->render() !!}
        <!-- </div> -->
     </div>
    @endsection

    @section('script')

        {!! Html::script('js/plugins/dataTables/jquery.dataTables.js') !!}
        {!! Html::script('js/plugins/dataTables/dataTables.responsive.js') !!}
        {!! Html::script('js/plugins/dataTables/dataTables.bootstrap.js') !!}

        {!! Html::script('js/project/setDataTable.js') !!}

        @endsection