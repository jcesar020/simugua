<div class="form-group">
    {!!Form::label('Nombre:', null, ['class'=>'control-label col-sm-2'])!!}
    <div class="col-sm-6">
        {!!Form::text('nombre', null, ['class'=>'form-control', 'placeholder'=>'Ingresa los nombres'])!!}

    </div>
</div>
<div class="form-group">
    {!!Form::label('Apellido:', null, ['class'=>'control-label col-sm-2'])!!}
    <div class="col-sm-6">
        {!!Form::text('apellido', null, ['class'=>'form-control', 'placeholder'=>'Ingresa los Apellidos'])!!}
    </div>
</div>

<div class="form-group">
    {!!Form::label('DUI:', null, ['class'=>'control-label col-sm-2'])!!}
    <div class="col-sm-4">
        {!!Form::text('dui', null, ['class'=>'form-control', 'data-mask'=>"0000000-1", 'placeholder'=>'Ingresa el numero DUI'])!!}
    </div>
</div>
<div class="form-group">
    {!!Form::label('NIT:', null, ['class'=>'control-label col-sm-2'])!!}
    <div class="col-sm-4">
        {!!Form::text('nit', null, ['class'=>'form-control', 'data-mask'=>"0000000-1", 'placeholder'=>'Ingresa el numero NIT'])!!}

    </div>
</div>
<div class="form-group">
    {!!Form::label('Direccion:', null, ['class'=>'control-label col-sm-2'])!!}
    <div class="col-sm-10">
        {!!Form::text('direccion', null, ['class'=>'form-control col-sm-10', 'placeholder'=>'Ingrese la direccion'])!!}
    </div>
</div>
<div class="form-group">
    {!!Form::label('Correo:', null, ['class'=>'control-label col-sm-2'])!!}
    <div class="col-sm-6">
        {!!Form::email('email', null, ['class'=>'form-control',  'placeholder'=>'Ingresa el correo electronico'])!!}
    </div>


</div>
<div class="form-group">
    {!!Form::label('Tipo:', null, ['class'=>'control-label col-sm-2'])!!}
    <div class="col-sm-3">
        {!! Form::select('tipo', $tipos, null, ['class'=>'form-control', 'placeholder'=>'Seleccione un tipo']) !!}

    </div>


</div>

