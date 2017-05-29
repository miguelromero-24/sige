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
        <div class="col-lg-12">
            <section class="panel">
                <header class="panel-heading">
                    Nuevo Usuario
                </header>
                <div class="panel-body">
                    {!! Form::model($user, array('route' => ['users.update', $user->id], 'method' => 'put', 'id' => 'usersNew', 'class' => 'form-horizontal')) !!}
                        <div class="col-md-3">
                            @include('users.partials.fields')
                        </div>
                        <div class="col-md-9">
                            @include('users.partials.permissions')
                        </div>
                    {!! Form::close() !!}
                </div>
            </section>
        </div>
    </div>
@endsection