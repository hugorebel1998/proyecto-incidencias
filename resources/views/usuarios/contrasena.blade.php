@extends('layouts.app')
@section('content')
    <div class="container">
        <div class="row justify-content-center">
            <div class="col-md-8">
                <div class="card">
                    <h4 class="text-center text-navy mt-3"> <i class="fas fa-lock"></i>Cambiar contraseña</h4>
                    <hr>
                    <div class="card-body">
                        <form action="{{ route('usuarios.cambiar') }}" method="POST">
                            <div class="row">
                                @csrf
                                <div class="col-md-12">
                                    <label for="contraseña">Contraseña actual</label>
                                    <input type="password" name="contraseña"
                                        class="form-control @error('contraseña') is-invalid @enderror"
                                        value="{{ old('contraseña') }}">
                                    <input type="hidden" name="id"
                                        class="form-control @error('contraseña') is-invalid @enderror"
                                        value="{{ $usuario }}">
                                    @error('contraseña')
                                        <div class="alert alert-danger">{{ $message }}</div>
                                    @enderror
                                </div>
                                <div class="col-md-12 mt-3">
                                    <label for="nueva_contraseña">Nueva contraseña</label>
                                    <input type="password"
                                        class="form-control @error('nueva_contraseña') is-invalid @enderror"
                                        name="nueva_contraseña" value="{{ old('nueva_contraseña') }}">
                                    @error('nueva_contraseña')
                                        <div class="alert alert-danger">{{ $message }}</div>
                                    @enderror
                                </div>
                                <div class="col-md-12 mt-3 mb-3">
                                    <label for="confirmar_nueva_contraseña">Confirmar contraseña</label>
                                    <input type="password"
                                        class="form-control @error('confirmar_nueva_contraseña') is-invalid @enderror"
                                        name="confirmar_nueva_contraseña" value="{{ old('confirmar_nueva_contraseña') }}">
                                    @error('confirmar_nueva_contraseña')
                                        <div class="alert alert-danger">{{ $message }}</div>
                                    @enderror
                                </div>
                            </div>
                            <div class="text-center">
                                <button type="submit" class="btn btn-sm btn-success mt-3"><i class="fas fa-key"></i> Cambiar
                                    contraseña</button>
                            </div>
                        </form>
                    </div>

                </div>

            </div>

        </div>

    </div>

@endsection
