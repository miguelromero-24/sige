<div class="form-group">
    {!! Form::label('description', 'Nombre', ['class' => 'col-sm-2']) !!}
    {!! Form::text('description' , null , ['class' => 'form-control ', 'autocomplete' => 'off', 'placeholder' => 'Introduzca un nombre' ]) !!}
</div>

<div class="form-group">
    {!! Form::label('address', 'Dirección', ['class' => 'col-sm-2']) !!}
    {!! Form::text('address' , null , ['class' => 'form-control ', 'autocomplete' => 'off', 'placeholder' => 'Introduzca una direccion' ]) !!}
</div>

<div class="form-group">
    {!! Form::label('principal', 'Director/a ', ['class' => 'col-sm-2']) !!}
    {!! Form::text('principal' , null , ['class' => 'form-control', 'placeholder' => 'Introduzca un nombre', 'autocomplete' => 'off' ]) !!}
</div>

<div class="form-group">
    {!! Form::label('telephone', 'Telefono ', ['class' => 'col-sm-2']) !!}
    {!! Form::text('telephone' , null , ['class' => 'form-control', 'placeholder' => 'Introduzca numero de telefono', 'autocomplete' => 'off' ]) !!}
</div>

<div class="form-group">
    {!! Form::label('email', 'Email ', ['class' => 'col-sm-2']) !!}
    {!! Form::text('email' , null , ['class' => 'form-control', 'placeholder' => 'Introduzca e-mail', 'autocomplete' => 'off' ]) !!}
</div>

<div class="form-group">
    {!! Form::label('supervision_id', 'Supervision ', ['class' => 'col-sm-6']) !!}
    {!! Form::text('supervision_id', !empty($supervisionId) ? $supervisionId : null, ['class' => 'form-control input-lg',
    'id' =>
    'selectSupervision', 'placeholder' => 'Seleccione una Supervision']) !!}
</div>

<div class="form-group">
    {!! Form::label('city_id', 'Supervision ', ['class' => 'col-sm-6']) !!}
    {!! Form::text('city_id', !empty($cityId) ? $cityId : null, ['class' => 'form-control input-lg',
    'id' =>
    'selectCity', 'placeholder' => 'Seleccione una Ciudad']) !!}
</div>

<button type="submit" class="btn btn-primary">Guardar</button>
@section('js')
    <script>
        $('#selectSupervision').selectize({
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
            options: {!! $supervisionJson !!}
        });

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
    </script>
@endsection