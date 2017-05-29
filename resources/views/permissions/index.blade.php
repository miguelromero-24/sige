@extends('template')
@section('breadcrumb')
    <div class="row">
        <div class="col-lg-12">
            <ol class="breadcrumb">
                <li><i class="fa fa-home"></i><a href="{{ route('home') }}">Home</a></li>
                <li><i class="fa fa-gavel"></i>Permisos</li>
            </ol>
        </div>
    </div>
@endsection
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
                                    <div class="btn-group">
                                        <a class="btn btn-primary" href="{{ route('permissions.edit',['id' => $permission->id]) }}" title="Editar"><i class="icon_pencil"></i></a>
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

    {!! Form::open(['route' => ['permissions.destroy', ':ROW_ID'],
                                             'method' => 'DELETE', 'id' => 'form-delete']) !!}
    {!! Form::close() !!}

@endsection
@section('js')
    @include('partials._delete_row_js')
@endsection

