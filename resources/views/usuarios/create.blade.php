@extends('layouts.app')
@section('content')
    <div class="container mt-4">
        <div class="row justify-content-center">
            <div class="col-md-8">
                <div class="card">
                    <div class="card-header">
                        <h5 class="text-left text-info">Crear usuario</h5>
                    </div>
                    <div class="card-body">
                        <form action="{{ route('usuarios.store') }}" method="POST">
                            @csrf
                            <div class="row">
                                <div class="col-md-6 pb-2">
                                    <label for="nombre">Nombre de usuario</label>
                                    <input type="text" class="form-control @error('nombre') is-invalid @enderror" name="nombre"
                                        value="{{ old('name') }}" placeholder="Escriba su nombre" autocomplete="name">
                                    @error('nombre')
                                        <div class="alert alert-danger">{{ $message }}</div>
                                    @enderror
                                </div>
                                <div class="col-md-6">
                                    <label for="correo_electronico">Correo electronico</label>
                                    <input type="email" class="form-control @error('correo_electronico') is-invalid @enderror"
                                        name="correo_electronico" value="{{ old('email') }}"
                                        placeholder="Escriba su correo electrónico" autocomplete="email">
                                    @error('correo_electronico')
                                        <div class="alert alert-danger">{{ $message }}</div>
                                    @enderror
                                </div>
                                <div class="col-md-6 mt-3">
                                    <label for="contraseña">Contraseña</label>
                                    <input type="password" class="form-control @error('contraseña') is-invalid @enderror"
                                        name="contraseña" value="{{ old('password') }}"
                                        placeholder="Escriba una contraseña">
                                    @error('contraseña')
                                        <div class="alert alert-danger">{{ $message }}</div>
                                    @enderror
                                </div>
                                <div class="col-md-6 mt-3">
                                    <label for="">Tipo de usuario</label>
                                    <select name=""
                                        class="form-control select2"
                                        style="width: 100%;">
                                        <option value="" >--Seleciona una opción--</option>
                                        @foreach ($usuarios as $usuario)
                                            <option value="{{ $usuario->id }}">
                                                {{ $usuario->name }}
                                            </option>
                                        @endforeach
                                    </select>

                                </div>
                            </div>
                            <div class="text-center mt-4">
                                <button type="submit" class="btn btn-sm btn-primary">Guardar</button>
                            </div>
                        </form>
                    </div>
                </div>
            </div>
        </div>
    </div>
@endsection
