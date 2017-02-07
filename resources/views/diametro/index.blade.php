@extends('layouts.admin')
@section('title')
    {{'Listado diametros'}}
    <?php $menu['parametros']='diametro'; ?>
@endsection
@section('content')
    @include('diametro.modal')
    <div id="msj-success" class="alert alert-success alert-dismissible" role="alert" style="display:none">
        <strong>Registro actualizado corretamente</strong>
    </div>
    <p>
        {!! link_to_route('diametro.create','Nuevo Registro',null,['class'=>'btn btn-info']) !!}
    </p>
    <div class="table-responsive">
        <table class="table table-striped table-bordered table-hover ">

        <thead>
            <th>Diametro</th>
            <th>Operaciones</th>
        </thead>
        <tbody id="datos">
        </tbody>
    </table>

    </div>
    @endsection

    @section('script')
        {!! Html::script('js/ajax/diametro.js') !!}
    @endsection