
<div class="form-group">
    {!!Form::label('marca', 'Marca: ', ['class'=>'control-label col-sm-2'])!!}
    <div class="col-sm-3">
        {!!Form::text('marca', null, ['class'=>'form-control', 'placeholder'=>'Ingresa la marca'])!!}
    </div>
</div>


<div class="form-group">
    {!!Form::label('diametro_id','Diametro:',  ['class'=>'control-label col-sm-2'])!!}
    <div class="col-sm-2">
        {!! Form::select('diametro_id', $diametros, null, ['class'=>'form-control', 'placeholder'=>'Seleccione']) !!}
    </div>
</div>
<div class="form-group">
    {!!Form::label('lectura', 'Lectura:', ['class'=>'control-label col-sm-2'])!!}
    <div class="col-sm-2">

        {!! Form::number('lectura', null, ['class'=>'form-control', 'placeholder'=> 'Actual', 'min'=>0]) !!}
    </div>
</div>

<div class="form-group" id="data_1">
    {!!Form::label('fechalectura', 'Fecha de Lectura:', ['class'=>'control-label col-sm-2'])!!}
    <div class="input-group date col-sm-2 ">
        <span class="input-group-addon"><i class="fa fa-calendar"></i></span>
        {!!Form::text('fechalectura', null, ['class'=>'form-control ', 'placeholder'=>'Ingrese la fecha'])!!}
    </div>
</div>
<div class="form-group" id="data_2">
    {!!Form::label('baja', 'Fecha de Baja:', ['class'=>'control-label col-sm-2'])!!}
    <div class="input-group date col-sm-2 ">
        <span class="input-group-addon"><i class="fa fa-calendar"></i></span>
        {!!Form::text('baja', null, ['class'=>'form-control ', 'placeholder'=>'Ingrese la fecha'])!!}
    </div>
</div>

<div class="form-group">
    {!!Form::label('comentario', 'Comentario:',  ['class'=>'control-label col-sm-2'])!!}
    <div class="col-sm-10">
        {!!Form::text('comentario', null, ['class'=>'form-control col-sm-10', 'placeholder'=>'Ingrese un comentario'])!!}
    </div>
</div>






