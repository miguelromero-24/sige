@extends('template')
@section('breadcrumb')
    <div class="row">
        <div class="col-lg-12">
            <ol class="breadcrumb">
                <li><i class="fa fa-home"></i><a href="{{ route('home') }}">Home</a></li>
                <li><i class="fa fa-file"></i>Inscripciones</li>
                <li>Nuevo</li>
            </ol>
        </div>
    </div>
@endsection
@section('main')
    <div class="row">
        <div class="col-sm-10">
            <section class="panel">
                <header class="panel-heading">
                    Inscripciones
                </header>
                <div class="panel-body">
                    <a href="{{ route('inscriptions.create') }}"><i class="fa fa-plus"></i> Nueva Inscripcion</a>
                    <table class="table table-striped table-advance table-hover">
                        <thead>
                        <tr>
                            <th style="width:10px">#</th>
                            <th>Nombre</th>
                            <th>Grado</th>
                            <th style="width:300px">Creado</th>
                            <th style="width:300px">Modificado</th>
                            <th style="width:250px">Acciones</th>
                        </tr>
                        </thead>
                        <tbody>
                        {{--@foreach($inscriptions as $role)--}}
                            {{--<tr>--}}
                                {{--<td>{{ $inscription->id }}</td>--}}
                                {{--<td>{{ $inscription->name }}</td>--}}
                                {{--<td>{{ $inscription->description}}</td>--}}
                                {{--<td>{{ date('d/m/y H:i', strtotime($inscription->created_at)) }} </td>--}}
                                {{--<td>{{ date('d/m/y H:i', strtotime($inscription->updated_at)) }} </td>--}}
                                {{--<td>--}}
                                    {{--<div class="btn-group">--}}
                                        {{--<a class="btn btn-primary" href="{{ route('inscriptions.edit',['id' => $inscription->id]) }}"--}}
                                           {{--title="Editar"><i class="icon_pencil"></i></a>--}}
                                        {{--<a href="#" class="btn btn-danger" title="Eliminar"><i--}}
                                                    {{--class="icon_minus-06"></i></a>--}}
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
    {!! Form::open(['route' => ['inscriptions.destroy', ':ROW_ID'],
                                         'method' => 'DELETE', 'id' => 'form-delete']) !!}
    {!! Form::close() !!}
@endsection

@section('js')
    @include('partials._delete_row_js')
@endsection

