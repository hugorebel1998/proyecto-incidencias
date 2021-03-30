@extends('layouts.app')
@section('content')
    <div class="container-fluid mt-5">
        <div class="row justify-content-center">
            <div class="col-md-10">
                <div class="card transparente">
                    <div class="card-header">
                        <b class="lead font-weight-bold text-primary">Lista de usuarios</b>
                        <div class="row justify-content-end">
                            <a href="{{ route('usuarios.create') }}" class="btn btn-sm btn-primary text-white mr-3"><i
                                    class="fas fa-plus complemento-plus"></i>&nbsp;&nbsp;Agregar usuario</a>
                        </div>
                    </div>
                    <!-- /.card-header -->
                    <div class="card-body">
                        <table class="order-table table table-hover" cellspacing="0" width="100%" id="example2">
                            <thead>
                                <tr>
                                    <th scope="col">ID</th>
                                    <th scope="col">Tipo de usuario</th>
                                    <th scope="col">Nombre</th>
                                    <th scope="col">Correo electrónico</th>
                                    <th scope="col">Fecha de registro</th>
                                    <th scope="col" class="text-center">Administrador</th>
                                </tr>
                            </thead>
                            <tbody>
                                @foreach ($usuarios as $usuario)
                                    <tr>
                                        <td>{{ $usuario->id }}</td> 
                                        <td></td>
                                        <td>{{ $usuario->name }}</td>
                                        <td>{{ $usuario->email }}</td>
                                        <td>{{ $usuario->created_at }}</td>
                                        <td class="text-center">

                                            <div class="dropdown">
                                                <button class="btn btn-sm btn-primary dropdown-toggle text-white"
                                                    type="button" id="dropdownMenuButton" data-toggle="dropdown"
                                                    aria-haspopup="true" aria-expanded="false">
                                                    <i class="fas fa-cogs"></i> Acciones
                                                </button>

                                                <div class="dropdown-menu" aria-labelledby="dropdownMenuButton">
                                                    <a class="dropdown-item" href=""><i class="fas fa-eye"></i> Ver
                                                        usuario</a>
                                                    <a class="dropdown-item" href=""><i class="fas fa-edit"></i> Editar
                                                        usuario</a>
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
