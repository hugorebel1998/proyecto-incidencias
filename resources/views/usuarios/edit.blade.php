@extends('layouts.app')
@section('content')
    <div class="container-fluid">
        <div class="row justify-content-center">
            <h2 class="text-center text-navy mb-5"><i class="fas fa-portrait"></i> Datos de usuario</h2>
            <div class="col-md-12">
                <div class="row">
                    {{-- Formulario de editar usuario --}}
                    <div class="col-md-6">
                        <div class="card card-navy">
                            <div class="card-header">
                                <h3 class="text-center text-white mt-3"> <i class="fas fa-edit"></i> Editar usuario</h3>
                            </div>
                            <div class="card-body">
                                <form action="{{ route('usuarios.update', $usuario->id) }}" method="POST">
                                    @csrf
                                    <div class="row">
                                        <div class="col-md-6 pb-3">
                                            <label for="nombre">Nombre de usuario</label>
                                            <input type="hidden" name="id" value="{{ $usuario->id }}">
                                            <input type="text" class="form-control @error('nombre') is-invalid @enderror"
                                                name="nombre" value="{{ $usuario->name }}">
                                            @error('nombre')
                                                <div class="alert alert-danger">{{ $message }}</div>
                                            @enderror
                                        </div>
                                        <div class="col-md-6">
                                            <label for="correo_electronico">Correo electronico</label>
                                            <input type="email"
                                                class="form-control @error('correo_electronico') is-invalid @enderror"
                                                name="correo_electronico" value="{{ $usuario->email }}">
                                            @error('correo_electronico')
                                                <div class="alert alert-danger">{{ $message }}</div>
                                            @enderror
                                        </div>
                                        <div class="col-md-6 mt-2">
                                            <label for="telefóno">Telefóno</label>
                                            <input type="number"
                                                class="form-control @error('telefóno') is-invalid @enderror" name="telefóno"
                                                value="{{ $usuario->telefono }}">
                                            @error('telefóno')
                                                <div class="alert alert-danger">{{ $message }}</div>
                                            @enderror
                                        </div>
                                    </div>
                                    <div class="text-center mt-5">
                                        <button type="submit" class="btn btn-sm btn-success"><i class="fas fa-save"></i>
                                            Guardar </button>
                                    </div>
                                </form>
                            </div>
                        </div>
                    </div>
                    {{-- Formulario de editar usuario  FIN --}}


                    {{-- Formulario de asignar proyecto --}}
                    <div class="col-md-6">
                        <div class="card card-navy">
                            <div class="card-header">
                                <h3 class="text-center text-white mt-3"> <i class="fas fa-spell-check"></i> Asignar proyecto
                                </h3>
                            </div>
                            <div class="card-body">
                                <form action="" method="POST">
                                    @csrf
                                    <div class="row">
                                        <div class="col-md-12 pb-3">

                                            <label for="proyecto_id">Selecciona proyecto</label>
                                            <select id="select-project" class="form-control select2" style="width: 100%;">
                                                <option value="" selected>--Seleccione una opcion--</option>
                                                @foreach ($proyectos as $proyecto)
                                                    <option value="{{ $proyecto->id }}">{{ $proyecto->name }}</option>
                                                @endforeach
                                            </select>


                                        </div>
                                        <div class="col-md-12 mt-2">
                                            <label for="proyecto_id">Selecciona nivel</label>
                                            <select id="select-level" class="form-control select2" style="width: 100%;">
                                                @foreach ($niveles as $nivel)
                                                    <option selected> {{ $nivel->name }}</option>
                                                @endforeach

                                            </select>
                                        </div>

                                    </div>
                                    <div class="text-center mt-5">
                                        <button type="submit" class="btn btn-sm btn-success"><i class="fas fa-save"></i>
                                            Guardar</button>
                                    </div>
                                </form>
                            </div>
                        </div>
                    </div>
                    {{-- Formulario de asignar proyecto FIN --}}

                    {{-- Tabla de proyectos --}}
                    <div class="col-md-12">
                        <div class="card">
                            <h3 class="text-left text-navy mt-3 ml-4"> <i class="fas fa-spell-check"></i>
                                Lista de proyectos asignados </h3>
                            <hr>
                            <div class="card-body">
                                <table class="order-table table table-hover" cellspacing="0" width="100%" id="example2">
                                    <thead>
                                        <tr>
                                            <th scope="col">Proyecto</th>
                                            <th scope="col">Nivel</th>
                                            <th scope="col" class="text-center">Administrador</th>
                                        </tr>
                                    </thead>
                                    <tbody>

                                        <tr>
                                            <td></td>
                                            <td></td>
                                            <td class="text-center">
                                                <a href="#" class="btn btn-sm btn-success"> <i class="fas fa-edit"></i> </a>
                                                <a href="$" class="btn btn-sm btn-danger"><i class="fas fa-trash-alt"></i>
                                                </a>
                                            </td>
                                        </tr>

                                    </tbody>
                                </table>

                            </div>
                        </div>
                    </div>
                    {{-- Tabla de proyectos  FIN --}}

                </div>
            </div>
        </div>

        @include('components.buscador')
    @endsection
