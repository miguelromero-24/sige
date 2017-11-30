<div class="form-group">
    {!! Form::label('description', 'Descripcion', ['class' => 'col-sm-2']) !!}
    {!! Form::text('description' , null , ['class' => 'form-control ', 'autocomplete' => 'off', 'placeholder' => 'Introduzca una Descripcion' ]) !!}
</div>

<div class="form-group">
    {!! Form::label('shift_id', 'Turno ', ['class' => 'col-sm-6']) !!}
    {!! Form::text('shift_id', !empty($shiftId) ? $shiftId : null, ['class' => 'form-control input-lg',
    'id' =>
    'selectShift', 'placeholder' => 'Seleccione un Turno']) !!}
</div>

<div class="form-group">
    {!! Form::label('teacher_id', 'Docente ', ['class' => 'col-sm-6']) !!}
    {!! Form::text('teacher_id', !empty($teacherId) ? $teacherId : null, ['class' => 'form-control input-lg',
    'id' =>
    'selectTeacher', 'placeholder' => 'Seleccione un Docente']) !!}
</div>

<div class="form-group">
    {!! Form::label('level_id', 'Nivel ', ['class' => 'col-sm-6']) !!}
    {!! Form::text('level_id', !empty($levelId) ? $levelId : null, ['class' => 'form-control input-lg',
    'id' =>
    'selectLevel', 'placeholder' => 'Seleccione un Nivel']) !!}
</div>

<button type="submit" class="btn btn-primary">Guardar</button>
@section('js')
    <script>
        $('#selectTeacher').selectize({
            delimiter: ',',
            persist: false,
            openOnFocus: true,
            valueField: 'id',
            labelField: 'first_name',
            searchField: 'first_name',
            maxItems:1,
            render: {
                item: function (item, escape) {
                    return '<div><span class="label label-primary">' + escape(item.first_name) + '</span></div>';
                }
            },
            options: {!! $teacherJson !!}
        });
        $('#selectLevel').selectize({
            delimiter: ',',
            persist: false,
            openOnFocus: true,
            valueField: 'id',
            labelField: 'description',
            searchField: 'description',
            maxItems:1,
            render: {
                item: function (item, escape) {
                    return '<div><span class="label label-primary">' + escape(item.description) + '</span></div>';
                }
            },
            options: {!! $levelJson !!}
        });
        $('#selectShift').selectize({
            delimiter: ',',
            persist: false,
            openOnFocus: true,
            valueField: 'id',
            labelField: 'description',
            searchField: 'description',
            maxItems:1,
            render: {
                item: function (item, escape) {
                    return '<div><span class="label label-primary">' + escape(item.description) + '</span></div>';
                }
            },
            options: {!! $shiftJson !!}
        });
    </script>
@endsection