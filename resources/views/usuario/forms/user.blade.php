<div class="form-group">
    {!!Form::label('Usuario:')!!}
    {!!Form::text('usuario', null, ['class'=>'form-control', 'placeholder'=>'Usuario'])!!}
</div>
<div class="form-group">
    {!!Form::label('Nombre:')!!}
    {!!Form::text('name', null, ['class'=>'form-control', 'placeholder'=>'Ingresa el nombre de usuario'])!!}
</div>
<div class="form-group">
    {!!Form::label('Correo:')!!}
    {!!Form::text('email', null, ['class'=>'form-control', 'placeholder'=>'Ingresa la direccion de correo'])!!}
</div>

<div class="form-group">
    {!!Form::label('Password:')!!}
    {!!Form::password('password',  ['class'=>'form-control', 'placeholder'=>'Ingresa la contrasena'])!!}
</div>

<div class="form-group">
    {!! AppForm::checkbox('admin', ' Es usuario Administrador') !!}
</div>