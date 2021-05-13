@extends('layouts.app')

@section('content')
    <div class="container">
        <div class="row justify-content-center">
            <div class="col-md-8 mb-5">
                <div class="card">
                    <div class=card-body>
                        <h5 class="text-center">Hola Bienvenido <b>{{ Auth::user()->name }}</b> que haremos hoy.</h5>
                    </div>
                </div>
            </div>
        </div>
    </div>

    <div class="container-fluid mb-5">
        <div class="row justify-content-center">
            <div class="col-md-10">
                <div class="row">
                    <div class="col-md-4">
                        <div class="info-box">
                            <span class="info-box-icon bg-success elevation-1"><i class="fab fa-accusoft"></i></span>

                            <div class="info-box-content">
                                <span class="info-box-text">Incidencias asignadas para mi</span>
                                <span class="info-box-number">
                                    10
                                    <small>%</small>
                                </span>
                            </div>
                            <!-- /.info-box-content -->
                        </div>
                    </div>
                    <div class="col-md-4">
                        <div class="info-box">
                            <span class="info-box-icon bg-info elevation-1"><i class="fas fa-bell-slash"></i></span>

                            <div class="info-box-content">
                                <span class="info-box-text">Incidencias sin asignar</span>
                                <span class="info-box-number">
                                    10
                                    <small>%</small>
                                </span>
                            </div>
                            <!-- /.info-box-content -->
                        </div>
                    </div>
                    <div class="col-md-4">
                        <div class="info-box">
                            <span class="info-box-icon bg-gray elevation-1 text-white"><i class="fas fa-flag"></i></span>

                            <div class="info-box-content">
                                <span class="info-box-text">Reportados para mi</span>
                                <span class="info-box-number">
                                    10
                                    <small>%</small>
                                </span>
                            </div>
                            <!-- /.info-box-content -->
                        </div>
                    </div>
                </div>
            </div>
        </div>
    </div>

    <div class="container-fluid mt-5">
        <div class="row justify-content-center">
            <div class="col-md-12">
                <div class="row">
                    <div class="col-md-12">
                        <div class="card">
                            <div class="card-header">
                                <h5 class="text-navy"><i class="fas fa-list-ul"></i> Lista de incidencias ya resultas </h5>
                            </div>
                            <div class="card-body">
                                <table class="order-table table table-hover" cellspacing="0" width="100%" id="example2">
                                    <thead>
                                        <tr>
                                            <th scope="col">ID</th>
                                            <th scope="col">Nombre</th>
                                            <th scope="col">Correo electrónico</th>
                                            <th scope="col">Telefóno</th>

                                            <th scope="col" class="text-center">Administrador</th>
                                        </tr>
                                    </thead>
                                    <tbody>


                                        <tr>
                                            <td></td>
                                            <td></td>
                                            <td></td>
                                            <td></td>

                                            <td class="text-center">

                                                <div class="dropdown">
                                                    <button class="btn btn-sm bg-navy dropdown-toggle text-white"
                                                        type="button" id="dropdownMenuButton" data-toggle="dropdown"
                                                        aria-haspopup="true" aria-expanded="false">
                                                        <i class="fas fa-cogs"></i> Acciones
                                                    </button>

                                                    <div class="dropdown-menu" aria-labelledby="dropdownMenuButton">
                                                        <a class="dropdown-item" href="#"><i class="fas fa-eye"></i> Ver
                                                            usuario</a>
                                                        <a class="dropdown-item" href="#"><i class="fas fa-edit"></i> Editar
                                                            usuario</a>
                                                        <a class="dropdown-item"
                                                            onclick="return confirm('¿ Estas seguro de eliminar este reporte ?')"
                                                            href="#"><i class="fas fa-trash-alt"></i> Eliminar usuario</a>
                                                    </div>
                                                </div>
                                            </td>
                                        </tr>

                                    </tbody>
                                </table>
                            </div>
                        </div>
                    </div>
                </div>
            </div>
        </div>
    </div>
    @include('components.buscador')
@endsection
