@extends('layouts.app')
@section('content')
    <div class="container">
        <div class="row justify-content-center">
            <div class="col-md-8">
                <div class="card">
                    <div class="card-header">    
                            <h5 class="text-left"> <i class="fas fa-edit"></i> Editar usuario</h5> 
                    </div>
                    <div class="card-body">
                        @if (session('message'))
                            <div class="alert alert-primary" role="alert">
                                {{ session('message') }}
                            </div>
                        @endif
                        <form action="{{ route('usuarios.update', $usuario->id) }}" method="POST">
                            @csrf
                            <div class="row">
                                <div class="col-md-6 pb-4">
                                    <label for="nombre">Nombre de usuario</label>
                                    <input type="hidden" value="{{ $usuario->id }}">
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
                            </div>
                            <div class="text-center mt-4">
                                <button type="submit" class="btn btn-sm btn-success">Actualizar información</button>
                            </div>
                        </form>
                    </div>
                </div>
            </div>
        </div>
    </div>
@endsection
