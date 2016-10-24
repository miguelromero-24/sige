<div class="form-group">
    {!! Form::label('description', 'Descripcion: ', array('class' => 'control-label col-lg-2')) !!}
    <div class="col-sm-4">
        {!! Form::text('description', !is_null($permission->description) ? $permission->description : null, array('class' => 'form-control', 'id' => 'select_clients')) !!}
    </div>
    {!! Form::label('permission', 'Permiso', array('class' => 'control-label col-lg-2')) !!}
    <div class="col-sm-4">
        {!! Form::text('permission', !is_null($permission->permission) ? $permission->permission : null, array('class' => 'form-control', 'id' => 'select_clients')) !!}
    </div>
</div>
