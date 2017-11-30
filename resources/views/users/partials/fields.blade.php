<div class="form-group">
    {!! Form::label('first_name', 'Nombre', ['class' => 'col-sm-2']) !!}
    {!! Form::text('first_name' , null , ['class' => 'form-control ', 'autocomplete' => 'off' ]) !!}
</div>

<div class="form-group">
    {!! Form::label('last_name', 'Apellido', ['class' => 'col-sm-2']) !!}
    {!! Form::text('last_name' , null , ['class' => 'form-control ', 'autocomplete' => 'off' ]) !!}
</div>

<div class="form-group">
    {!! Form::label('email', 'Email', ['class' => 'col-sm-2']) !!}
    {!! Form::text('email' , null , ['class' => 'form-control', 'placeholder' => 'Introduzca e-mail', 'autocomplete' => 'off' ]) !!}
</div>

<div class="form-group">
    {!! Form::label('roles', 'Roles:', ['class' => 'col-sm-6']) !!}
    {!! Form::text('roles', !empty($rolesIds) ? $rolesIds : null, ['class' => 'form-control input-lg',
    'id' =>
    'selectRoles', 'placeholder' => 'Seleccione un Rol de Usuario']) !!}
</div>

<button type="submit" class="btn btn-primary">Guardar</button>
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