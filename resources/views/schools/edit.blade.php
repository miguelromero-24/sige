@extends('template')

@section('breadcrumb')
    <div class="row">
        <div class="col-lg-12">
            {{--<h3 class="page-header"><i class="fa fa-laptop"></i> Dashboard</h3>--}}
            <ol class="breadcrumb">
                <li><i class="fa fa-home"></i><a href="{{ route('home') }}">Home</a></li>
                <li><i class="fa fa-user"></i>Usuarios</li>
                <li>Editar</li>
            </ol>
        </div>
    </div>
@endsection
@section('main')
    <div class="row">
        <div class="col-xs-8 col-lg-8">
            <section class="panel">
                <header class="panel-heading">
                    Nuevo Usuario
                </header>
                <div class="panel-body">
                    {!! Form::model($school, array('route' => ['schools.update', $school->id], 'method' => 'put', 'id' => 'usersNew', 'class' => 'form-horizontal')) !!}
                        <div class="col-md-12">
                            @include('schools.partials.fields')
                        </div>
                    {!! Form::close() !!}
                </div>
            </section>
        </div>
    </div>
@endsection