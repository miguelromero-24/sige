<div class="form-group">
    {!! Form::label('name', 'Nombre: ', array('class' => 'control-label col-lg-2')) !!}
    <div class="col-sm-4">
        {!! Form::text('name', null, array('class' => 'form-control', 'id' => 'select_clients')) !!}
    </div>
    {!! Form::label('slug', 'Identificador', array('class' => 'control-label col-lg-2')) !!}
    <div class="col-sm-4">
        {!! Form::text('slug', null, array('class' => 'form-control', 'id' => 'select_clients')) !!}
    </div>
</div>

<div class="form-group">
    {!! Form::label('description', 'Descripcion: ', array('class' => 'control-label col-lg-2')) !!}
    <div class="col-sm-4">
        {!! Form::text('description',null , array('class' => 'form-control')) !!}
    </div>
</div>
