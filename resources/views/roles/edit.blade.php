@extends('template')
@section('breadcrumb')
    <div class="row">
        <div class="col-lg-12">
            <ol class="breadcrumb">
                <li><i class="fa fa-home"></i><a href="{{ route('home') }}">Home</a></li>
                <li><i class="fa fa-graduation-cap"></i>Roles</li>
                <li>Editar</li>
            </ol>
        </div>
    </div>
@endsection
@section('main')
    <div class="row">
        <div class="col-lg-12">
            <section class="panel">
                <header class="panel-heading">
                    Editar {{ $role->name }}
                </header>
                <div class="panel-body">
                    {!! Form::model($role, array('route' => ['roles.update', $role->id], 'method' => 'put', 'id' => 'rolesNew', 'class' => 'form-horizontal')) !!}
                    @include('roles.partials.fields')
                    @include('roles.partials.permissions')
                    <button type="submit" class="btn btn-primary">Guardar</button>
                    {!! Form::close() !!}
                </div>
            </section>
        </div>
    </div>
@endsection