@extends('template')
@section('main')
    <div class="row">
        <div class="col-sm-10">
            <section class="panel">
                <header class="panel-heading">
                    Usuarios
                </header>
                <table class="table table-striped table-advance table-hover">
                    <thead>
                    <tr>
                        <th>#</th>
                        <th>Nombre</th>
                        <th>Apellido</th>
                        <th>Email</th>
                        <th>Rol</th>
                        <th>Creado</th>
                        <th>Modificado</th>
                        <th>Estado</th>
                        <th>Acciones</th>
                    </tr>
                    </thead>
                    <tbody>
                    @foreach($users as $user)
                        <tr>
                            <td>{{ $user->id }}</td>
                            <td>{{ $user->first_name }}</td>
                            <td>{{ $user->last_name}}</td>
                            <td>{{ $user->email }}</td>
                            <td>------</td>
                            <td>{{ $user->created_at }}</td>
                            <td>{{ $user->updated_at }}</td>
                            <td>{{ $user->status }}</td>
                            <td>
                                <div class="btn-group">
                                    <a class="btn btn-primary" href="{{ url("users/edit/{$user->id}") }}" title="Editar"><i class="icon_pencil"></i></a>
                                    <a class="btn btn-danger" href="{{ url("users/destroy/{$user->id}") }}" title="Eliminar"><i class="icon_minus-06"></i></a>
                                    <a class="btn btn-default" href="{{ url("users/details/{$user->id}") }}" title="Detalles"><i class="icon_plus"></i></a>
                                </div>
                            </td>
                        </tr>
                    @endforeach
                    </tbody>
                </table>
            </section>
        </div>
    </div>
@stop