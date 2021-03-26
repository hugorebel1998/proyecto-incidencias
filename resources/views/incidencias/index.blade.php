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
                                    <th scope="col">Severidad</th>
                                    <th scope="col">Descripción</th>
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
                                            <button class="btn btn-sm btn-info dropdown-toggle text-white" type="button" id="dropdownMenuButton" data-toggle="dropdown" aria-haspopup="true" aria-expanded="false">
                                              Acciones
                                            </button>
                                            <div class="dropdown-menu" aria-labelledby="dropdownMenuButton">
                                              <a class="dropdown-item" href="#">Action</a>
                                              <a class="dropdown-item" href="#">Another action</a>
                                              <a class="dropdown-item" href="#">Something else here</a>
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
    @include('components.buscador')
@endsection
