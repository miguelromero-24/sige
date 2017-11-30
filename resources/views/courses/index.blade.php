@extends('template')
@section('breadcrumb')
    <div class="row">
        <div class="col-lg-12">
            <ol class="breadcrumb">
                <li><i class="fa fa-home"></i><a href="{{ route('home') }}">Home</a></li>
                <li><i class="fa fa-notebook"></i>Grados</li>
            </ol>
        </div>
    </div>
@endsection
@section('main')
    <div class="row">
        <div class="col-sm-12">
            <section class="panel">
                <header class="panel-heading">
                    Grados
                </header>
                <div class="panel-body">
                    <a href="{{ route('courses.create') }}"><i class="fa fa-plus"></i> Nuevo Grado</a>
                    <table class="table table-striped table-advance table-hover">
                        <thead>
                        <tr>
                            <th style="width:10px">#</th>
                            <th>Nombre</th>
                            <th>Turno</th>
                            <th>Creado</th>
                            <th>Modificado</th>
                            <th style="width:250px">Acciones</th>
                        </tr>
                        </thead>
                        <tbody>
                        @foreach($courses as $course)
                            <tr data-id="{{ $course->id }}">
                                <td>{{ $course->id }}</td>
                                <td>{{ $course->description  }}</td>
                                <td>{{ $course->shift->description }}</td>
                                <td>{{ $course->level->description }}</td>
                                <td>{{ date('d/m/y H:i', strtotime($course->created_at)) }} </td>
                                <td>{{ date('d/m/y H:i', strtotime($course->updated_at)) }} </td>
                                <td>
                                    <div class="btn-group">
                                        <a href="{{ route('courses.show', $course->id) }}" class="btn btn-success" title="Detalles"><i class="icon_book"></i></a>
                                        <a class="btn btn-primary" href="{{ route('courses.edit',['id' => $course->id]) }}" title="Editar"><i class="icon_pencil"></i></a>
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
    {!! Form::open(['route' => ['courses.destroy', ':ROW_ID'],
                                         'method' => 'DELETE', 'id' => 'form-delete']) !!}
    {!! Form::close() !!}
@endsection

@section('js')
    @include('partials._delete_row_js')
@endsection

