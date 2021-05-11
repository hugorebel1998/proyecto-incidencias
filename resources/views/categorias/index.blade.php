@extends('layouts.app')
@section('content')

    <div class="container-fluid mt-5">
        <div class="row justify-content-center">
            <div class="col-md-10">
                <div class="card transparente">
                    <div class="card-header">
                        <b class="lead font-weight-bold text-primary"> Lista de categorias</b>
                        <div class="row justify-content-end">
                            <a href="{{ route('categorias.create') }}" class="btn btn-sm btn-primary text-white mr-3"><i
                                    class="fas fa-plus complemento-plus"></i>&nbsp;&nbsp;Agregar categoria</a>
                        </div>
                    </div>
                    <!-- /.card-header -->
                    <div class="card-body">
                        <table class="order-table table table-hover" cellspacing="0" width="100%" id="example2">
                            <thead>
                                <tr>
                                    <th scope="col">ID</th>
                                    <th scope="col">Nombre</th>
                                    <th scope="col">Descripcion</th>
                                    <td scope="col">Nombre de proyecto</td>
                                    <th scope="col" class="text-center">Administrador</th>
                                </tr>
                            </thead>
                            <tbody>
                                @foreach ($categorias as $categoria)
                                    <tr>
                                        <td>{{ $categoria->id }}</td>
                                        <td>{{ $categoria->name }}</td>
                                        <td>{{ $categoria->description ?: 'Aun no se asigna una descripción' }}</td>
                                        
                                            <td>Nombre</td>
                                        

                                        <td class="text-center">
                                            <div class="dropdown">
                                                <button class="btn btn-sm btn-success dropdown-toggle text-white"
                                                    type="button" id="dropdownMenuButton" data-toggle="dropdown"
                                                    aria-haspopup="true" aria-expanded="false">
                                                    <i class="fas fa-cogs"></i> Acciones
                                                </button>

                                                <div class="dropdown-menu" aria-labelledby="dropdownMenuButton">
                                                    <a class="dropdown-item"
                                                        href="{{ route('categorias.show', [$categoria->id]) }}"><i
                                                            class="fas fa-eye"></i> Ver
                                                        categoria</a>
                                                    <a class="dropdown-item"
                                                        href="{{ route('categorias.edit', [$categoria->id]) }}"><i
                                                            class="fas fa-edit"></i> Editar
                                                        categoria</a>
                                                    <a class="dropdown-item"
                                                        onclick="return confirm('¿ Estas seguro de eliminar este reporte ?')"
                                                        href="#"><i class="fas fa-trash-alt"></i> Eliminar usuario</a>
                                                </div>
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
