@extends('template')
@section('main')
    <div class="row">
        <div class="col-sm-10">
            <section class="panel">
                <header class="panel-heading">
                    Roles
                </header>
                <div class="panel-body">
                    <a href="{{ route('roles.create') }}"><i class="fa fa-plus"></i> Nuevo Rol</a>
                    <table class="table table-striped table-advance table-hover">
                        <thead>
                        <tr>
                            <th style="width:10px">#</th>
                            <th>Nombre</th>
                            <th>Descripci&oacute;n</th>
                            <th style="width:300px">Creado</th>
                            <th style="width:300px">Modificado</th>
                            <th style="width:250px">Acciones</th>
                        </tr>
                        </thead>
                        <tbody>
                        @foreach($roles as $role)
                            <tr>
                                <td>{{ $role->id }}</td>
                                <td>{{ $role->name }}</td>
                                <td>{{ $role->description}}</td>
                                <td>{{ date('d/m/y H:i', strtotime($role->created_at)) }} </td>
                                <td>{{ date('d/m/y H:i', strtotime($role->updated_at)) }} </td>
                                <td>
                                    <div class="btn-group">
                                        <a class="btn btn-primary" href="{{ route('roles.edit',['id' => $role->id]) }}" title="Editar"><i class="icon_pencil"></i></a>
                                        <a href="#" class="btn btn-danger" title="Eliminar"><i class="icon_minus-06"></i></a>
                                    </div>
                                </td>
                            </tr>
                        @endforeach
                        </tbody>
                    </table>
                </div>
            </section>
        </div>
    </div>
    {!! Form::open(['route' => ['roles.destroy', ':ROW_ID'],
                                         'method' => 'DELETE', 'id' => 'form-delete']) !!}
    {!! Form::close() !!}
@endsection

@section('js')
    @include('partials._delete_row_js')
@endsection

