@extends('template')
@section('breadcrumb')
    <div class="row">
        <div class="col-lg-12">
            <ol class="breadcrumb">
                <li><i class="fa fa-home"></i><a href="{{ route('home') }}">Home</a></li>
                <li><i class="fa fa-university"></i>Colegios</li>
            </ol>
        </div>
    </div>
@endsection
@section('main')
    <div class="row">
        <div class="col-sm-10">
            <section class="panel">
                <header class="panel-heading">
                    Colegios
                </header>
                <div class="panel-body">
                    <a href="{{ route('schools.create') }}"><i class="fa fa-plus"></i> Nuevo Colegio</a>
                <table class="table table-striped table-advance table-hover">
                    <thead>
                    <tr>
                        <th>#</th>
                        <th>Nombre</th>
                        <th>Ciudad</th>
                        <th>Dirección</th>
                        <th>Director/a</th>
                        <th>Supervision</th>
                        <th>Acciones</th>
                    </tr>
                    </thead>
                    <tbody>
                    @foreach($schools as $school)
                        <tr data-id="{{ $school->id }}">
                            <td>{{ $school->id }}</td>
                            <td>{{ $school->description }}</td>
                            <td>{{ $school->cities->description}}</td>
                            <td>{{ $school->address }}</td>
                            <td>{{ $school->principal }}</td>
                            <td>{{ $school->supervision->description }}</td>
                            <td>
                                <div class="btn-group">
                                    <a class="btn btn-primary" href="{{ route('schools.edit',['id' => $school->id]) }}" title="Editar"><i class="icon_pencil"></i></a>
                                    <a href="#" class="btn btn-danger"><i class="icon_minus-06"></i></a>
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
    {!! Form::open(['route' => ['schools.destroy', ':ROW_ID'],
                                         'method' => 'DELETE', 'id' => 'form-delete']) !!}
    {!! Form::close() !!}
@endsection

@section('js')
    @include('partials._delete_row_js')
@endsection