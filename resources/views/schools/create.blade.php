@extends('template')
@section('breadcrumb')
    <div class="row">
        <div class="col-lg-12">
            {{--<h3 class="page-header"><i class="fa fa-laptop"></i> Dashboard</h3>--}}
            <ol class="breadcrumb">
                <li><i class="fa fa-home"></i><a href="{{ route('home') }}">Home</a></li>
                <li><i class="fa fa-university"></i>Colegios</li>
                <li>Nuevo</li>
            </ol>
        </div>
    </div>
@endsection
@section('main')
    <div class="row">
        <div class="col-xs-12 col-lg-8">
            <section class="panel">
                <header class="panel-heading">
                    Nuevo Colegio
                </header>
                <div class="panel-body">
                    {!! Form::open(array('route' => 'schools.store', 'method' => 'post', 'id' => 'schoolsNew', 'class' => 'form-horizontal')) !!}
                    <div class="col-md-12">
                        @include('schools.partials.fields')
                    </div>
                    {!! Form::close() !!}
                </div>
            </section>
        </div>
    </div>
@endsection