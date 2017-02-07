<div class="row wrapper">
<div class="col-sm-6">
    <div class="form-group">
        {!!Form::label('id','ID:', ['class'=>'control-label col-sm-6'])!!}
        <div class="col-sm-2">
            {!!Form::text('id', null, ['class'=>'form-control', 'readonly'=>'readonly'])!!}
        </div>
    </div>
</div>
<div class="col-sm-6">
    <div class="form-group">
        {!!Form::label('estadoCon','Estado:',  ['class'=>'control-label col-sm-2 '])!!}
        <div class="col-sm-3 ">
            {!!Form::text(null, $estados[$conexion->estadoCon], ['class'=>'form-control','readonly'=>'readonly' ])!!}
        </div>
    </div>
</div>
</div>