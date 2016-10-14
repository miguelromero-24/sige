<div class="form-group">
    {!! Form::label('description', 'Descripcion: ', array('class' => 'col-sm-2 control-label')) !!}
    <div class="col-sm-4">
        {!! Form::text('description', null, array('class' => 'form-control')) !!}
    </div>
    {!! Form::label('username', 'Nombre de Usuario: ', array('class' => 'col-sm-2 control-label')) !!}
    <div class="col-sm-4">
        {!! Form::text('username', null, array('class' => 'form-control')) !!}
    </div>
</div>
<div class="form-group">
    {!! Form::label('email', 'E-mail: ', array('class' => 'control-label col-lg-2')) !!}
    <div class="col-sm-4">
        {!! Form::text('email', null, array('class' => 'form-control', 'id' => 'select_clients')) !!}
    </div>
    {!! Form::label('school_id', 'Colegio', array('class' => 'control-label col-lg-2')) !!}
    <div class="col-sm-4">
        {!! Form::text('school_id', null, array('class' => 'form-control', 'id' => 'select_clients')) !!}
    </div>
</div>


@section('js')
    <script>

    </script>
@endsection