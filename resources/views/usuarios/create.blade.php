@extends('layouts.app')
@section('content')
    <div class="container mt-4">
        <div class="row justify-content-center">
            <div class="col-md-8">
                <div class="card">
                    <h3 class="text-center text-navy mt-3"><i class="fas fa-user-plus"></i> Crear usuario</h3>
                    <hr>
                    <div class="card-body">
                        <form action="{{ route('usuarios.store') }}" method="POST">
                            @csrf
                            <div class="row">
                                <div class="col-md-6 pb-2">
                                    <label for="nombre">Nombre de usuario</label>
                                    <input type="text" class="form-control @error('nombre') is-invalid @enderror"
                                        name="nombre" value="{{ old('nombre') }}" placeholder="Escriba su nombre"
                                        autocomplete="name">
                                    @error('nombre')
                                        <div class="alert alert-danger">{{ $message }}</div>
                                    @enderror
                                </div>
                                <div class="col-md-6">
                                    <label for="correo_electronico">Correo electronico</label>
                                    <input type="email"
                                        class="form-control @error('correo_electronico') is-invalid @enderror"
                                        name="correo_electronico" value="{{ old('correo_electronico') }}"
                                        placeholder="Escriba su correo electrónico" autocomplete="email">
                                    @error('correo_electronico')
                                        <div class="alert alert-danger">{{ $message }}</div>
                                    @enderror
                                </div>
                                <div class="col-md-6 mt-3">
                                    <label for="telefóno">Telefóno</label>
                                    <input type="number"
                                        class="form-control @error('telefóno') is-invalid @enderror"
                                        name="telefóno" value="{{ old('telefóno') }}"
                                        placeholder="Escriba su telefóno" autocomplete="telefono">
                                    @error('telefóno')
                                        <div class="alert alert-danger">{{ $message }}</div>
                                    @enderror
                                </div>
                                <div class="col-md-6 mt-3">
                                    <label for="contraseña">Contraseña</label>
                                    <input type="password" class="form-control @error('contraseña') is-invalid @enderror"
                                        name="contraseña" value="{{ old('contraseña') }}"
                                        placeholder="Escriba una contraseña">
                                    @error('contraseña')
                                        <div class="alert alert-danger">{{ $message }}</div>
                                    @enderror
                                </div>
                                <div class="col-md-6 mt-3">
                                    <label for="confirmar_contraseña">Confirmar contraseña </label>
                                    <input type="password"
                                        class="form-control @error('confirmar_contraseña') is-invalid @enderror"
                                        name="confirmar_contraseña" placeholder="Corfirmar contraseña">
                                    @error('confirmar_contraseña')
                                        <div class="alert alert-danger">{{ $message }}</div>
                                    @enderror
                                </div>
                                {{-- <div class="col-md-6 mt-3">
                                    <label for="role">Rol</label>
                                    <select name="role" class="form-control select2" style="width: 100%;" required>
                                        @foreach ($roles as $role)
                                        @if ($loop->first)
                                            <option value="{{ $role->id }}" selected="selected">
                                                {{ $role->name }}
                                            </option>
                                        @else
                                            <option value="{{ $role->id }}">{{ $role->name }}
                                            </option>
                                        @endif
                                    @endforeach
                                    </select>
                                </div> --}}
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
