@extends('template')
@section('breadcrumb')
    <div class="row">
        <div class="col-lg-12">
            <ol class="breadcrumb">
                <li><i class="fa fa-home"></i><a href="{{ route('home') }}">Home</a></li>
                <li><i class="fa fa-user-md"></i>Docentes</li>
            </ol>
        </div>
    </div>
@endsection
@section('main')
    <div class="row">
        <div class="col-sm-12">
            <section class="panel">
                <header class="panel-heading">
                    Roles
                </header>
                <div class="panel-body">
                    <a href="{{ route('teachers.create') }}"><i class="fa fa-plus"></i> Nuevo Docente</a>
                    <table class="table table-striped table-advance table-hover">
                        <thead>
                        <tr>
                            <th style="width:10px">#</th>
                            <th>Nombre</th>
                            <th>Grado</th>
                            <th>Cantidad de Alumnos</th>
                            <th>Creado</th>
                            <th>Modificado</th>
                            <th style="width:250px">Acciones</th>
                        </tr>
                        </thead>
                        <tbody>
                        {{--@foreach($teachers as $teacher)--}}
                            {{--<tr>--}}
                                {{--<td>{{ $teacher->id }}</td>--}}
                                {{--<td>{{ $teacher->name }}</td>--}}
                                {{--<td>{{ $teacher->description}}</td>--}}
                                {{--<td>{{ date('d/m/y H:i', strtotime($teacher->created_at)) }} </td>--}}
                                {{--<td>{{ date('d/m/y H:i', strtotime($teacher->updated_at)) }} </td>--}}
                                {{--<td>--}}
                                    {{--<div class="btn-group">--}}
                                        {{--<a class="btn btn-primary" href="{{ route('teachers.edit',['id' => $teacher->id]) }}" title="Editar"><i class="icon_pencil"></i></a>--}}
                                        {{--<a href="#" class="btn btn-danger" title="Eliminar"><i class="icon_minus-06"></i></a>--}}
                                    {{--</div>--}}
                                {{--</td>--}}
                            {{--</tr>--}}
                        {{--@endforeach--}}
                        </tbody>
                    </table>
                </div>
            </section>
        </div>
    </div>
    {!! Form::open(['route' => ['teachers.destroy', ':ROW_ID'],
                                         'method' => 'DELETE', 'id' => 'form-delete']) !!}
    {!! Form::close() !!}
@endsection

@section('js')
    @include('partials._delete_row_js')
@endsection

