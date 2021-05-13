@extends('layouts.app')
@section('content')

    <div class="container-fluid mt-4">
        <div class="row justify-content-center">
            <div class="col-md-12">
                <div class="row">
                    <div class="col-md-6">
                        <div class="card card-navy collapsed-card">
                            <div class="card-header">
                                <h3 class="card-title"><i class="fas fa-cubes"></i> Categorias</h3>
                                <div class="card-tools">
                                    <button type="button" class="btn btn-tool" data-card-widget="collapse">
                                        <i class="fas fa-minus"></i>
                                    </button>
                                    <button type="button" class="btn btn-tool" data-card-widget="remove">
                                        <i class="fas fa-times"></i>
                                    </button>
                                </div>
                            </div>
                            <div class="card-body">
                                <div class="text-right mb-2">
                                    <a href="{{ route('categorias.create') }}" class="btn btn-sm btn-primary"><i
                                            class="fas fa-plus"></i> Crear categoria</a>
                                </div>
                                <table class="order-table table table-hover" cellspacing="0" width="100%" id="example3">
                                    <thead>
                                        <tr>
                                            <th scope="col">ID</th>
                                            <th scope="col">Nombre</th>
                                            <th scope="col">Descripcion</th>
                                            <th scope="col" class="text-center">Administrador</th>
                                        </tr>
                                    </thead>
                                    <tbody>
                                        @foreach ($categorias as $categoria)
                                            <tr>
                                                <td>{{ $categoria->id }}</td>
                                                <td>{{ $categoria->name }}</td>
                                                <td>{{ $categoria->description ?: 'Aun no se asigna una descripción' }}
                                                </td>
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
                                                                href="#"><i class="fas fa-trash-alt"></i> Eliminar
                                                                usuario</a>
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

                    <div class="col-md-6">
                        <div class="card card-navy collapsed-card">
                            <div class="card-header">
                                <h3 class="card-title"><i class="fas fa-sort-amount-up"></i> Niveles</h3>
                                <div class="card-tools">
                                    <button type="button" class="btn btn-tool" data-card-widget="collapse">
                                        <i class="fas fa-minus"></i>
                                    </button>
                                    <button type="button" class="btn btn-tool" data-card-widget="remove">
                                        <i class="fas fa-times"></i>
                                    </button>
                                </div>
                            </div>
                            <div class="card-body">
                                <div class="text-right mb-2">
                                    <a href="{{ route('niveles.create') }}" class="btn btn-sm btn-primary"><i class="fas fa-plus"></i> Agregar nivel</a>
                                </div>
                                <table class="order-table table table-hover" cellspacing="0" width="100%" id="example4">
                                    <thead>
                                        <tr>
                                            <th scope="col">ID</th>
                                            <th scope="col">Nombre</th>
                                            <th scope="col" class="text-center">Administrador</th>
                                        </tr>
                                    </thead>
                                    <tbody>
                                        @foreach ($niveles as $nivel)
                                            <tr>
                                                <td>{{ $nivel->id }}</td>
                                                <td>{{ $nivel->name }}</td>
                                                <td class="text-center">
                                                    <div class="dropdown">
                                                        <button class="btn btn-sm btn-success dropdown-toggle text-white"
                                                            type="button" id="dropdownMenuButton" data-toggle="dropdown"
                                                            aria-haspopup="true" aria-expanded="false">
                                                            <i class="fas fa-cogs"></i> Acciones
                                                        </button>

                                                        <div class="dropdown-menu" aria-labelledby="dropdownMenuButton">
                                                            <a class="dropdown-item" href="#"><i class="fas fa-eye"></i> Ver
                                                                usuario</a>
                                                            <a class="dropdown-item" href="#"><i class="fas fa-edit"></i>
                                                                Editar
                                                                usuario</a>
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
        </div>
    </div>





    <div class="container-fluid mt-5">
        <div class="row justify-content-center">
            <div class="col-md-12">
                <div class="card transparente">
                    <div class="card-header">
                        <b class="lead font-weight-bold text-primary"> <i class="fas fa-list"></i> Lista de proyectos</b>
                        <div class="row justify-content-end">
                            <a href="{{ route('proyectos.create') }}" class="btn btn-sm btn-primary text-white mr-3"><i
                                    class="fas fa-plus complemento-plus"></i>&nbsp;&nbsp;Agregar proyecto</a>
                        </div>
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
                                            <div class="dropdown">
                                                <button class="btn btn-sm btn-success dropdown-toggle text-white"
                                                    type="button" id="dropdownMenuButton" data-toggle="dropdown"
                                                    aria-haspopup="true" aria-expanded="false">
                                                    <i class="fas fa-cogs"></i> Acciones
                                                </button>

                                                <div class="dropdown-menu" aria-labelledby="dropdownMenuButton">
                                                    <a class="dropdown-item"
                                                        href="{{ route('proyectos.show', [$proyecto->id]) }}"><i
                                                            class="fas fa-eye"></i> Ver
                                                        usuario</a>
                                                    <a class="dropdown-item"
                                                        href="{{ route('proyectos.edit', [$proyecto->id]) }}"><i
                                                            class="fas fa-edit"></i> Editar
                                                        usuario</a>
                                                    <a class="dropdown-item"
                                                        onclick="return confirm('¿ Estas seguro de eliminar este reporte ?')"
                                                        href="{{ route('proyectos.delete', [$proyecto->id]) }}"><i class="fas fa-trash-alt"></i> Eliminar usuario</a>
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
