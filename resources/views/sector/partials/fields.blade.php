
<div class="form-group">
    {!!Form::label('sector', 'Sector: ', ['class'=>'control-label col-sm-2'])!!}
    <div class="col-sm-5">
        {!!Form::text('sector', null, ['class'=>'form-control', 'placeholder'=>'Ingresa el sector'])!!}
    </div>
</div>

<div class="form-group">
    {!!Form::label('contacto', 'Contacto: ', ['class'=>'control-label col-sm-2'])!!}
    <div class="col-sm-5">
        {!!Form::text('contacto', null, ['class'=>'form-control', 'placeholder'=>'Nombre de contacto'])!!}
    </div>
</div>

<div class="form-group">
    {!!Form::label('telefono', 'Telefono: ', ['class'=>'control-label col-sm-2'])!!}
    <div class="col-sm-5">
        {!!Form::text('telefono', null, ['class'=>'form-control', 'placeholder'=>'Numero telefonico'])!!}
    </div>
</div>


<div class="form-group">
    {!!Form::label('descripcion', 'Descripcion:',  ['class'=>'control-label col-sm-2'])!!}
    <div class="col-sm-10">
        {!!Form::text('descripcion', null, ['class'=>'form-control col-sm-10', 'placeholder'=>'Ingrese un comentario'])!!}
    </div>
</div>




