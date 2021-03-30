@extends('layouts.app')
@section('content')
    <div class="container-fluid mt-5">
        <div class="row justify-content-center">
            <div class="col-md-10">
                <div class="card transparente">
                    <div class="card-header">
                        <b class="lead font-weight-bold text-primary">Lista de reportes</b>
                        <div class="row justify-content-end">
                            <a href="{{ route('incidencias.create') }}" class="btn btn-sm btn-primary text-white mr-3"><i
                                    class="fas fa-plus complemento-plus"></i>&nbsp;&nbsp;Agregar reporte</a>
                        </div>
                    </div>
                    <!-- /.card-header -->
                    <div class="card-body">
                        <table class="order-table table table-hover" cellspacing="0" width="100%" id="example2">
                            <thead>
                                <tr>
                                    <th scope="col">No.Reporte</th>
                                    <th scope="col">Categoria</th>
                                    <th scope="col">Titulo</th>
                                    <th scope="col">Severidad</th>
                                    <th scope="col">Descripción</th>
                                    <th scope="col" class="text-center">Administrador</th>
                                </tr>
                            </thead>
                            <tbody>
                                @foreach ($incidencias as $incidencia)
                                    <tr>
                                        <td>{{ $incidencia->id }}</td>
                                        <td>{{ $incidencia->id_category }}</td>
                                        <td>{{ $incidencia->title }}</td>
                                        <td>{{ $incidencia->severity }}</td>
                                        <td>{{ $incidencia->description }}</td>
                                        <td class="text-center">
                                    
                                    <div class="dropdown">
                                        <button class="btn btn-sm btn-primary dropdown-toggle text-white" type="button"
                                            id="dropdownMenuButton" data-toggle="dropdown" aria-haspopup="true"
                                            aria-expanded="false">
                                            <i class="fas fa-cogs"></i> Acciones
                                        </button>
                                        @can('update report')
                                        <div class="dropdown-menu" aria-labelledby="dropdownMenuButton">
                                            <a class="dropdown-item" href="{{ route('incidencias.show', [$incidencia->id])}}"><i class="fas fa-eye"></i> Ver reporte</a>
                                            <a class="dropdown-item" href="{{ route('incidencias.edit', [$incidencia->id])}}"><i class="fas fa-edit"></i> Editar reporte</a>
                                            <a class="dropdown-item" href="#"><i class="fas fa-trash-alt"></i> Eliminar reporte</a>
                                        </div>    
                                        @endcan
                                        
                                    </div>
                                    
                                            
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
