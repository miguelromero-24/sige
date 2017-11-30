@extends('template')
@section('breadcrumb')
    <div class="row">
        <div class="col-lg-12">
            <ol class="breadcrumb">
                <li><i class="fa fa-home"></i><a href="{{ route('home') }}">Home</a></li>
                <li><i class="fa fa-gavel"></i>Inscripciones</li>
                <li>Nueva Inscripción</li>
            </ol>
        </div>
    </div>
@endsection
@section('main')
    {!! Form::open(array('route' => 'inscriptions.store', 'method' => 'post', 'id' => 'inscriptionNew',
                     'class' => 'form-horizontal')) !!}
    <div class="row">
        <div class="col-lg-12">
            <section class="panel">
                <header class="panel-heading">
                    Datos Alumno
                </header>
                <div class="panel-body">
                    <div class="row">
                        <div class="col-md-12">
                            <div class="form-group">
                                {!! Form::label('shift', 'Turno ', array('class' => 'control-label col-lg-2')) !!}
                                <div class="col-sm-4">
                                    {!! Form::text('shift', null, array('class' => 'form-control', 'id' => 'selectShift')) !!}
                                </div>
                                {!! Form::label('date', 'Fecha ', array('class' => 'control-label col-lg-2')) !!}
                                <div class="col-sm-4">
                                    {!! Form::text('date', date('Y-m-d'), array('class' => 'form-control', 'id' => 'select_clients', 'disabled' => 'disabled')) !!}
                                </div>
                            </div>
                        </div>
                    </div>
                    <br>
                    <div class="row">
                        <div class="col-md-12">
                            <div class="form-group">
                                {!! Form::label('first_name', 'Nombre ', array('class' => 'control-label col-lg-2')) !!}
                                <div class="col-sm-4">
                                    {!! Form::text('first_name', null, array('class' => 'form-control', 'id' => 'first_name')) !!}
                                </div>
                                {!! Form::label('last_name', 'Apellido', array('class' => 'control-label col-lg-2')) !!}
                                <div class="col-sm-4">
                                    {!! Form::text('last_name', null, array('class' => 'form-control', 'id' => 'last_name')) !!}
                                </div>
                            </div>
                        </div>
                    </div>
                    <br>
                    <div class="row">
                        <div class="col-md-12">
                            <div class="form-group">
                                {!! Form::label('birthday', 'Fecha de Nacimiento ', array('class' => 'control-label col-lg-2')) !!}
                                <div class="col-sm-4">
                                    {!! Form::text('birthday', null, array('class' => 'form-control', 'id' => 'birthday')) !!}
                                </div>
                                {!! Form::label('birthplace', 'Lugar de Nacimiento', array('class' => 'control-label col-lg-2')) !!}
                                <div class="col-sm-4">
                                    {!! Form::text('last_name', null, array('class' => 'form-control', 'id' => 'last_name')) !!}
                                </div>
                            </div>
                        </div>
                    </div>
                    <br>
                    <div class="row">
                        <div class="col-md-12">
                            <div class="form-group">
                                {!! Form::label('course_id', 'Grado  ', array('class' => 'control-label col-lg-2')) !!}
                                <div class="col-sm-4">
                                    {!! Form::text('course_id', null, array('class' => 'form-control', 'id' => 'selectCourse')) !!}
                                </div>
                            </div>
                        </div>
                    </div>
                </div>
            </section>
            <section class="panel">
                <header class="panel-heading">
                    Datos Padres o encargados
                </header>
                <div class="panel-body">
                    <div class="row">
                        <div class="col-md-12">
                            <div class="form-group">
                                {!! Form::label('father_first_name', 'Nombre del Padre ', array('class' => 'control-label col-lg-2')) !!}
                                <div class="col-sm-4">
                                    {!! Form::text('father_first_name', null, array('class' => 'form-control', 'id' => 'first_name')) !!}
                                </div>
                                {!! Form::label('father_last_name', 'Apellido del Padre ', array('class' => 'control-label col-lg-2')) !!}
                                <div class="col-sm-4">
                                    {!! Form::text('father_last_name', null, array('class' => 'form-control')) !!}
                                </div>
                            </div>
                        </div>
                    </div>
                    <br>
                    <div class="row">
                        <div class="col-md-12">
                            <div class="form-group">
                                {!! Form::label('father_birthday', 'Fecha de Nacimiento ', array('class' => 'control-label col-lg-2')) !!}
                                <div class="col-sm-4">
                                    {!! Form::text('father_first_name', null, array('class' => 'form-control', 'id' => 'father_birthday')) !!}
                                </div>
                                {!! Form::label('father_employment', 'Profesión ', array('class' => 'control-label col-lg-2')) !!}
                                <div class="col-sm-4">
                                    {!! Form::text('father_employment', null, array('class' => 'form-control')) !!}
                                </div>
                            </div>
                        </div>
                    </div>
                    <br>
                    <div class="row">
                        <div class="col-md-12">
                            <div class="form-group">
                                {!! Form::label('father_address', 'Dirección ', array('class' => 'control-label col-lg-2')) !!}
                                <div class="col-sm-4">
                                    {!! Form::text('father_address', null, array('class' => 'form-control', 'id' => 'father_birthday')) !!}
                                </div>
                                {!! Form::label('father_telephone', 'Teléfono ', array('class' => 'control-label col-lg-2')) !!}
                                <div class="col-sm-4">
                                    {!! Form::text('father_telephone', null, array('class' => 'form-control')) !!}
                                </div>
                            </div>
                        </div>
                    </div>
                    <br>
                    <div class="row">
                        <div class="col-md-12">
                            <div class="form-group">
                                {!! Form::label('father_cellphone', 'Celular ', array('class' => 'control-label col-lg-2')) !!}
                                <div class="col-sm-4">
                                    {!! Form::text('father_cellphone', null, array('class' => 'form-control', 'id' => 'father_birthday')) !!}
                                </div>
                                {!! Form::label('father_email', 'Email  ', array('class' => 'control-label col-lg-2')) !!}
                                <div class="col-sm-4">
                                    {!! Form::text('father_email', null, array('class' => 'form-control')) !!}
                                </div>
                            </div>
                        </div>
                    </div>
                    <br>
                    <br>
                    <div class="row">
                        <div class="col-md-12">
                            <div class="form-group">
                                {!! Form::label('mother_first_name', 'Nombre de la Madre ', array('class' => 'control-label col-lg-2')) !!}
                                <div class="col-sm-4">
                                    {!! Form::text('mother_first_name', null, array('class' => 'form-control', 'id' => 'first_name')) !!}
                                </div>
                                {!! Form::label('mother_last_name', 'Apellido de la Madre ', array('class' => 'control-label col-lg-2')) !!}
                                <div class="col-sm-4">
                                    {!! Form::text('mother_last_name', null, array('class' => 'form-control')) !!}
                                </div>
                            </div>
                        </div>
                    </div>
                    <br>
                    <div class="row">
                        <div class="col-md-12">
                            <div class="form-group">
                                {!! Form::label('mother_birthday', 'Fecha de Nacimiento ', array('class' => 'control-label col-lg-2')) !!}
                                <div class="col-sm-4">
                                    {!! Form::text('mother_birthday', null, array('class' => 'form-control', 'id' => 'first_name')) !!}
                                </div>
                                {!! Form::label('mother_employment', 'Profesión ', array('class' => 'control-label col-lg-2')) !!}
                                <div class="col-sm-4">
                                    {!! Form::text('mother_employment', null, array('class' => 'form-control')) !!}
                                </div>
                            </div>
                        </div>
                    </div>
                    <br>
                    <div class="row">
                        <div class="col-md-12">
                            <div class="form-group">
                                {!! Form::label('mother_address', 'Dirección ', array('class' => 'control-label col-lg-2')) !!}
                                <div class="col-sm-4">
                                    {!! Form::text('mother_address', null, array('class' => 'form-control', 'id' => 'father_birthday')) !!}
                                </div>
                                {!! Form::label('mother_telephone', 'Teléfono ', array('class' => 'control-label col-lg-2')) !!}
                                <div class="col-sm-4">
                                    {!! Form::text('mother_telephone', null, array('class' => 'form-control')) !!}
                                </div>
                            </div>
                        </div>
                    </div>
                    <br>
                    <div class="row">
                        <div class="col-md-12">
                            <div class="form-group">
                                {!! Form::label('mother_cellphone', 'Celular ', array('class' => 'control-label col-lg-2')) !!}
                                <div class="col-sm-4">
                                    {!! Form::text('mother_cellphone', null, array('class' => 'form-control', 'id' => 'father_birthday')) !!}
                                </div>
                                {!! Form::label('mother_email', 'Email  ', array('class' => 'control-label col-lg-2')) !!}
                                <div class="col-sm-4">
                                    {!! Form::text('mother_email', null, array('class' => 'form-control')) !!}
                                </div>
                            </div>
                        </div>
                    </div>
                    <br>
                    <br>
                    <div class="row">
                        <div class="col-md-12">
                            <div class="form-group">
                                {!! Form::label('guardian_first_name', 'Nombre del Encargado ', array('class' => 'control-label col-lg-2')) !!}
                                <div class="col-sm-4">
                                    {!! Form::text('guardian_first_name', null, array('class' => 'form-control', 'id' => 'first_name')) !!}
                                </div>
                                {!! Form::label('guardian_last_name', 'Apellido del Encargado ', array('class' => 'control-label col-lg-2')) !!}
                                <div class="col-sm-4">
                                    {!! Form::text('guardian_last_name', null, array('class' => 'form-control')) !!}
                                </div>
                            </div>
                        </div>
                    </div>
                    <br>
                    <div class="row">
                        <div class="col-md-12">
                            <div class="form-group">
                                {!! Form::label('guardian_birthday', 'Fecha de Nacimiento ', array('class' => 'control-label col-lg-2')) !!}
                                <div class="col-sm-4">
                                    {!! Form::text('guardian_birthday', null, array('class' => 'form-control', 'id' => 'guardian_birthday')) !!}
                                </div>
                                {!! Form::label('guardian_employment', 'Profesión ', array('class' => 'control-label col-lg-2')) !!}
                                <div class="col-sm-4">
                                    {!! Form::text('guardian_employment', null, array('class' => 'form-control')) !!}
                                </div>
                            </div>
                        </div>
                    </div>
                    <br>
                    <div class="row">
                        <div class="col-md-12">
                            <div class="form-group">
                                {!! Form::label('guardian_address', 'Dirección ', array('class' => 'control-label col-lg-2')) !!}
                                <div class="col-sm-4">
                                    {!! Form::text('guardian_address', null, array('class' => 'form-control', 'id' => 'father_birthday')) !!}
                                </div>
                                {!! Form::label('guardian_telephone', 'Teléfono ', array('class' => 'control-label col-lg-2')) !!}
                                <div class="col-sm-4">
                                    {!! Form::text('guardian_telephone', null, array('class' => 'form-control')) !!}
                                </div>
                            </div>
                        </div>
                    </div>
                    <br>
                    <div class="row">
                        <div class="col-md-12">
                            <div class="form-group">
                                {!! Form::label('guardian_cellphone', 'Celular ', array('class' => 'control-label col-lg-2')) !!}
                                <div class="col-sm-4">
                                    {!! Form::text('guardian_cellphone', null, array('class' => 'form-control', 'id' => 'father_birthday')) !!}
                                </div>
                                {!! Form::label('guardian_email', 'Email  ', array('class' => 'control-label col-lg-2')) !!}
                                <div class="col-sm-4">
                                    {!! Form::text('guardian_email', null, array('class' => 'form-control')) !!}
                                </div>
                            </div>
                        </div>
                    </div>
                    <button type="submit" class="btn btn-primary">Guardar</button>
                    {!! Form::close() !!}
                </div>
            </section>
        </div>
    </div>
@endsection

@section('js')
    <script>
        $( function() {
            $("#birthday").datepicker(
                {
                    dateFormat:'yy-mm-dd',
                    changeYear: true,
                    changeMonth: true,
                    showMonthAfterYear: true, //this is what you are looking for
                    maxDate:0
                });
        } );
        $( function() {
            $("#father_birthday").datepicker(
                {
                    dateFormat:'yy-mm-dd',
                    changeYear: true,
                    changeMonth: true,
                    showMonthAfterYear: true, //this is what you are looking for
                    maxDate:0
                });
        } );
        $( function() {
            $("#mother_birthday").datepicker({
                dateFormat:'yy-mm-dd',
                changeYear: true,
                changeMonth: true,
                showMonthAfterYear: true, //this is what you are looking for
                maxDate:0
            });
        } );
        $( function() {
            $("#guardian_birthday").datepicker({
                dateFormat:'yy-mm-dd',
                changeYear: true,
                changeMonth: true,
                showMonthAfterYear: true, //this is what you are looking for
                maxDate:0
            });
        } );
    </script>
    <script>
        $('#selectShift').selectize({
            delimiter: ',',
            persist: false,
            openOnFocus: true,
            valueField: 'id',
            labelField: 'description',
            searchField: 'description',
            maxItems: 1,
            render: {
                item: function (item, escape) {
                    return '<div><span class="label label-primary">' + escape(item.description) + '</span></div>';
                }
            },
            options: {!! $shiftJson !!}
        });
        $('#selectCourse').selectize({
            delimiter: ',',
            persist: false,
            openOnFocus: true,
            valueField: 'id',
            labelField: 'description',
            searchField: 'description',
            maxItems: 1,
            render: {
                item: function (item, escape) {
                    return '<div><span class="label label-primary">' + escape(item.description) + '</span></div>';
                }
            },
            options: {!! $courseJson !!}
        });
    </script>
@endsection