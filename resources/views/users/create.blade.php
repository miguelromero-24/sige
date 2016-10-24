@extends('template')
@section('main')
    <div class="row">
        <div class="col-lg-12">
            <section class="panel">
                <header class="panel-heading">
                    Nuevo Usuario
                </header>
                <div class="panel-body">
                    {!! Form::open(array('route' => 'users.store', 'method' => 'post', 'id' => 'usersNew', 'class' => 'form-horizontal')) !!}
                    <div class="row">
                        <div class="col-md-3">
                            @include('users.partials.fields')
                        </div>
                        <div class="col-md-9">
                            @include('users.partials.permissions')
                        </div>
                    </div>
                        <button type="submit" class="btn btn-primary">Guardar</button>
                    {!! Form::close() !!}
                </div>
            </section>
        </div>
    </div>
@endsection