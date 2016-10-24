@extends('template')
@section('main')
    <div class="row">
        <div class="col-lg-12">
            <section class="panel">
                <header class="panel-heading">
                    Editar Permiso
                </header>
                <div class="panel-body">
                    {!! Form::open(array('route' => ['permissions.update', $permission->id], 'method' => 'put', 'id' => 'permissionNew', 'class' => 'form-horizontal')) !!}
                    @include('permissions.partials.fields')
                    <button type="submit" class="btn btn-primary">Guardar</button>
                    {!! Form::close() !!}
                </div>
            </section>
        </div>
    </div>
@endsection