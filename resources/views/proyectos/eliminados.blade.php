@extends('layouts.app')
@section('content')
    <div class="container-fluid mt-5">
        <div class="row justify-content-center">
            <div class="col-md-10">
                <div class="card transparente">
                    <div class="card-header">
                        <b class="lead font-weight-bold text-primary"> Lista de proyectos eliminados</b>
                    </div>
                    <!-- /.card-header -->
                    <div class="card-body">
                        <table class="order-table table table-hover" cellspacing="0" width="100%" id="example2">
                            <thead>
                                <tr>
                                    <th scope="col">ID</th>
                                    <th scope="col">Nombre</th>
                                    <th scope="col">Categoria</th>
                                    <th scope="col">Nivel</th>
                                    <th scope="col">Descripcion</th>
                                    <th scope="col">Fecha de inicio</th>
                                    <th scope="col" class="text-center">Administrador</th>
                                </tr>
                            </thead>
                            <tbody>
                                @foreach ($proyectos as $proyecto)
                                    <tr>
                                        <td>{{ $proyecto->id }}</td>
                                        <td>{{ $proyecto->name }}</td>
                                        <td>Categoria</td>
                                        <td>Nivel</td>
                                        <td>{{ $proyecto->description }}</td>
                                        <td>{{ $proyecto->fecha_inicio ?: 'No se ha asignado fecha' }}</td>
                                        <td class="text-center">
                                            <a href="{{ route('proyectos.show', [$proyecto->id]) }}"
                                                class="btn btn-sm btn-info text-white" title="Ver proyecto"> <i
                                                    class="fas fa-eye"></i></a>
                                            <a href="{{ route('proyectos.edit', [$proyecto->id]) }}"
                                                class="btn btn-sm btn-success" title="Editar proyecto"> <i
                                                    class="fas fa-edit"></i></a>
                                            <a onclick="return confirm('¿ Estas seguro de restablecer este reporte ?')"
                                                href="{{ route('proyectos.restore', [$proyecto->id]) }}"
                                                class="btn btn-sm bg-navy" title="Restablecer proyecto"><i
                                                    class="fas fa-trash-restore"></i></a>
                                        </td>
                                    </tr>
                                @endforeach
                            </tbody>
                        </table>
                    </div>
                </div>
            </div>
        </div>
    </div>
    @include('components.buscador')
@endsection
