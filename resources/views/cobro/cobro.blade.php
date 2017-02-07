@extends('layouts.admin')

@section('title')
    INGRESO DE FACTURAS
    @endsection
@section('style')
    {!! HTML::style('css/contenedores.css') !!}
    {!!Html::style("css/plugins/datapicker/datepicker3.css")!!}
    {!! HTML::style('css/mystyle.css') !!}
    @endsection

@section('content')
     <h2>INGRESO DE FACTURAS</h2>

      <audio id="audio"       src="http://www.soundjay.com/button/beep-07.wav" autostart="false" ></audio>
      <audio id="audio_error" src="http://www.soundjay.com/button/beep-05.wav" autostart="false" ></audio>


    {!! AppForm::open(['route'=>'cliente.store', 'method'=>'POST', 'class'=>'form-inline', 'id'=>'factura']) !!}
    <input type="hidden" name="_token" value="{{ csrf_token() }}" id="token">
   <div class="col-sm-12">
       <div class="col-sm-5">
    <div class="form-group">
        {!!Form::label('factura_id', 'Factura:', ['class'=>''])!!}
        {!! Form::text('factura_id',null,['class'=>'form-control ', 'placeholder'=>'Numero de factura']) !!}
    </div>
    {!! Form::submit('Ingresar',['class'=>'btn btn-default']) !!}
       </div>
       <div class="col-sm-5">
    <div class="form-group" id="data_1">
        {!!Form::label('fecha', 'Fecha:', ['class'=>''])!!}
        <div class="input-group date ">
            <span class="input-group-addon"><i class="fa fa-calendar"></i></span><input id="fecha" value="{{\Carbon\Carbon::now()}}" type="text" class="form-control" >
        </div>

    </div>
           {!! Form::button("Procesar", ['class'=>'btn btn-primary', 'id'=>'procesar']) !!}

       </div>

       <div class="form-group col-sm-2">
           {!! Form::label('total','TOTAL:') !!}
           <label class="grande" for="" id="total"></label>


       </div>
   </div>
    {!! AppForm::close() !!}


    <div id="global">
        <div id="contenido">
            <div class="table-responsive">
                <table class="table table-striped table-bordered table-hover ">

                    <thead>
                    <th>Factura</th>
                    <th>Conexion</th>
                    <th>Fecha</th>
                    <th>Cliente</th>
                    <th>Valor</th>
                    <th>&nbsp;</th>
                    </thead>
                    <tbody id="datos">



                    </tbody>
                </table>

            </div>
        </div>

    </div>


@endsection

@section('script')
    {!! HTML::script('js/ajax/cobro.js') !!}

    {!! HTML::script('js/plugins/dataTables/jquery.dataTables.js') !!}
    {!! HTML::script('js/plugins/dataTables/dataTables.bootstrap.js') !!}
    {!! HTML::script('js/plugins/dataTables/dataTables.responsive.js') !!}

    {!!Html::script('js/plugins/datapicker/bootstrap-datepicker.js')!!}
    {!!Html::script('js/project/datepicker.js')!!}

    @stop
