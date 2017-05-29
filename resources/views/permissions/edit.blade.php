@extends('template')
@section('breadcrumb')
    <div class="row">
        <div class="col-lg-12">
            <ol class="breadcrumb">
                <li><i class="fa fa-home"></i><a href="{{ route('home') }}">Home</a></li>
                <li><i class="fa fa-gavel"></i>Permisos</li>
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
                    Editar Permiso
                </header>
                <div class="panel-body">
                    {!! Form::open(array('route' => ['permissions.update', $permission->id], 'method' => 'put', 'id'
                    => 'permissionNew', 'class' => 'form-horizontal')) !!}
                    @include('permissions.partials.fields')
                    <button type="submit" class="btn btn-primary">Guardar</button>
                    {!! Form::close() !!}
                </div>
            </section>
        </div>
    </div>
@endsection