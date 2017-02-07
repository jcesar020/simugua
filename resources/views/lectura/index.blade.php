@extends('layouts.admin')

@section('content')
    <h2>LISTADO DE LECTURAS</h2>

    <div class="panel-body">
    {!! Form::model(Request::all(),['route'=>'lectura.index', 'method'=>'GET', 'class'=>'navbar-form ', 'role'=>'search']) !!}


    <div class="col-lg-8">
        {!!Form::label('anio', 'Seleccione el periodo:', ['class'=>'control-label'])!!}

        {!! Form::select('anio',$years,null,['class'=>'form-control']) !!}
        {!! Form::select('mes', config('option.meses'),null, ['class'=>'form-control'] ) !!}

        {!! Form::submit('Mostrar', ['class'=>'btn btn-default']) !!}
    </div>

</div>
{!! Form::close() !!}

<table class="table table-striped table-bordered table-hover table-condensed">
    <thead>
    <tr>
        <th>Sector</th>
        <th>Descripcion</th>
        <th>Conexiones</th>
        <th>Generadas</th>
        <th>Ingresadas</th>
        <th>Validadas</th>
        <th>Observadas</th>
        <th>Aprobadas</th>
        <th>Facturadas</th>
        <th></th>
    </tr>
    </thead>
    <tbody id="body">
    @if(isset($_GET['mes']))
        @include('lectura.partials.listar')
    @endif

    </tbody>
</table>
@endsection

@section('script')


    @endsection