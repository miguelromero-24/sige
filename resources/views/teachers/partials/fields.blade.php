<div class="form-group">
    {!! Form::label('first_name', 'Nombre', ['class' => 'col-sm-2']) !!}
    {!! Form::text('first_name' , null , ['class' => 'form-control ', 'autocomplete' => 'off', 'placeholder' => 'Introduzca un nombre' ]) !!}
</div>

<div class="form-group">
    {!! Form::label('last_name', 'Apellido', ['class' => 'col-sm-2']) !!}
    {!! Form::text('last_name' , null , ['class' => 'form-control ', 'autocomplete' => 'off', 'placeholder' => 'Introduzca un Apellido' ]) !!}
</div>

<div class="form-group">
    {!! Form::label('birthday', 'Fecha de Nacimiento ', ['class' => 'col-sm-2']) !!}
    {!! Form::text('birthday' , null , ['class' => 'form-control', 'placeholder' => 'Introduzca una fecha', 'autocomplete' => 'off', 'id' => 'birthday' ]) !!}
</div>

<div class="form-group">
    {!! Form::label('cellphone', 'Celular ', ['class' => 'col-sm-2']) !!}
    {!! Form::text('cellphone' , null , ['class' => 'form-control', 'placeholder' => 'Introduzca numero de telefono', 'autocomplete' => 'off' ]) !!}
</div>

<div class="form-group">
    {!! Form::label('email', 'Email ', ['class' => 'col-sm-2']) !!}
    {!! Form::text('email' , null , ['class' => 'form-control', 'placeholder' => 'Introduzca e-mail', 'autocomplete' => 'off' ]) !!}
</div>

<div class="form-group">
    {!! Form::label('city_id', 'Ciudad ', ['class' => 'col-sm-6']) !!}
    {!! Form::text('city_id', !empty($cityId) ? $cityId : null, ['class' => 'form-control input-lg',
    'id' =>
    'selectCity', 'placeholder' => 'Seleccione una Ciudad']) !!}
</div>

<div class="form-group">
    {!! Form::label('school_id', 'Colegio ', ['class' => 'col-sm-6']) !!}
    {!! Form::text('school_id', !empty($cityId) ? $cityId : null, ['class' => 'form-control input-lg',
    'id' =>
    'selectSchool', 'placeholder' => 'Seleccione un Colegio']) !!}
</div>

<button type="submit" class="btn btn-primary">Guardar</button>
@section('js')
    <script>
        $( function() {
            $("#birthday").datepicker({
                dateFormat:'yy-mm-dd',
                changeYear: true,
                changeMonth: true,
                showMonthAfterYear: true, //this is what you are looking for
                maxDate:0
            });
        } );
    </script>
    <script>
        $('#selectCity').selectize({
            delimiter: ',',
            persist: false,
            openOnFocus: true,
            valueField: 'id',
            labelField: 'description',
            searchField: 'description',
            render: {
                item: function (item, escape) {
                    return '<div><span class="label label-primary">' + escape(item.description) + '</span></div>';
                }
            },
            options: {!! $citiesJson !!}
        });
        $('#selectSchool').selectize({
            delimiter: ',',
            persist: false,
            openOnFocus: true,
            valueField: 'id',
            labelField: 'description',
            searchField: 'description',
            render: {
                item: function (item, escape) {
                    return '<div><span class="label label-primary">' + escape(item.description) + '</span></div>';
                }
            },
            options: {!! $schoolsJson !!}
        });
    </script>
@endsection