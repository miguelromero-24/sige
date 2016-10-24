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
    {!! Form::label('schools', 'Colegio', array('class' => 'control-label col-lg-2')) !!}
    <div class="col-sm-4">
        {!! Form::text('schools', null, array('class' => 'form-control', 'id' => 'select_clients')) !!}
    </div>
</div>

<div class="form-group">
    {!! Form::label('roles', 'Roles de Usuario: ', array('class' => 'control-label col-lg-2')) !!}
    <div class="col-sm-4">
        {!! Form::text('roles', !empty($rolesId) ? $rolesId : null, array('class' => 'form-control input-lg',
        'id' => 'selectRoles', 'placeholder' => 'Selectione roles para el usuario')) !!}
    </div>
</div>


@section('js')
    <script>
        $('#selectRoles').selectize({
            delimiter: ',',
            persist: false,
            openOnFocus: true,
            valueField: 'id',
            labelField: 'name',
            searchField: 'name',
            render: {
                item: function (item, escape) {
                    return '<div><span class="label label-primary">' + escape(item.name) + '</span></div>';
                }
            },
            options: {!! $rolesJson !!}
        });
    </script>
@endsection