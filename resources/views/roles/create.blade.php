@extends('template')
@section('breadcrumb')
    <div class="row">
        <div class="col-lg-12">
            <ol class="breadcrumb">
                <li><i class="fa fa-home"></i><a href="{{ route('home') }}">Home</a></li>
                <li><i class="fa fa-graduation-cap"></i>Roles</li>
                <li>Nuevo</li>
            </ol>
        </div>
    </div>
@endsection
@section('main')
    <div class="row">
        <div class="col-lg-12">
            <section class="panel">
                <header class="panel-heading">
                    Nuevo Rol
                </header>
                <div class="panel-body">
                    {!! Form::open(array('route' => 'roles.store', 'method' => 'post', 'id' => 'rolesNew', 'class' => 'form-horizontal')) !!}
                    @include('roles.partials.fields')
                    @include('roles.partials.permissions')
                    <button type="submit" class="btn btn-primary">Guardar</button>
                    {!! Form::close() !!}
                </div>
            </section>
        </div>
    </div>
@endsection