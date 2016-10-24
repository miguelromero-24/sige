@extends('template')
@section('main')
    <div class="row">
        <div class="col-sm-10">
            <section class="panel">
                <header class="panel-heading">
                    Permisos
                </header>
                <div class="panel-body">
                    <a href="{{ route('permissions.create') }}"><i class="fa fa-plus"></i> Nuevo Permiso</a>
                    <table class="table table-striped table-advance table-hover">
                        <thead>
                        <tr>
                            <th style="width:10px">#</th>
                            <th>Descripción</th>
                            <th>Llave</th>
                            <th style="width:150px">Creado</th>
                            <th style="width:150px">Modificado</th>
                            <th style="width:200px">Acciones</th>
                        </tr>
                        </thead>
                        <tbody>
                        @foreach($permissions as $permission)
                            <tr data-id="{{ $permission->id  }}">
                                <td>{{ $permission->id }}.</td>
                                <td>{{ $permission->description }}</td>
                                <td>{{ $permission->permission }}</td>
                                <td>{{ $permission->created_at }}</td>
                                <td>{{ $permission->updated_at }}</td>
                                <td>
                                    <a href="{{ route('permissions.edit',['id' => $permission->id])}}"><i
                                                class="fa fa-edit"></i>Editar</a> |
                                    <a href="#" class="btn-delete"><i class="fa fa-remove"></i> Eliminar</a>
                                </td>
                            </tr>
                        @endforeach
                        </tbody>
                    </table>
                </div>
            </section>
        </div>
    </div>

    {!! Form::open(['route' => ['permissions.destroy', ':ROW_ID'],
                                             'method' => 'DELETE', 'id' => 'form-delete']) !!}
    {!! Form::close() !!}

@endsection
@section('js')
    @include('partials._delete_row_js')
@endsection

