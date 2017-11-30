@extends('template')
@section('main')
    <div class="row">
        <div class="col-xs-12 col-lg-8">
            <section class="panel">
                <header class="panel-heading">
                    Editar {{ $course->first_name }}
                </header>
                <div class="panel-body">
                    {!! Form::model($course, array('route' => ['courses.update', $course->id], 'method' => 'put', 'id' => 'coursesNew', 'class' => 'form-horizontal')) !!}
                    <div class="col-md-12">
                        @include('courses.partials.fields')
                    </div>
                    {!! Form::close() !!}
                </div>
            </section>
        </div>
    </div>
@endsection