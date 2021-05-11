@extends('layouts.app')
@section('content')
    <div class="container">
        <div class="row justify-content-center">
            <div class="col-md-8">
                <div class="card">
                            <h3 class="text-center text-navy mt-3"> <i class="fas fa-edit"></i> Editar usuario</h3> 
                            <hr>
                    <div class="card-body">
                        @if (session('message'))
                            <div class="alert alert-primary" role="alert">
                                {{ session('message') }}
                            </div>
                        @endif
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
                                        name="correo_electronico" value="{{$usuario->email}}">
                                    @error('correo_electronico')
                                        <div class="alert alert-danger">{{ $message }}</div>
                                    @enderror
                                </div>
                                <div class="col-md-6 mt-2">
                                    <label for="telefóno">Telefóno</label>
                                    <input type="number"
                                        class="form-control @error('telefóno') is-invalid @enderror"
                                        name="telefóno" value="{{ $usuario->telefono }}">
                                    @error('telefóno')
                                        <div class="alert alert-danger">{{ $message }}</div>
                                    @enderror
                                </div>
                            </div>
                            <div class="text-center mt-5">
                                <button type="submit" class="btn btn-sm btn-success">Actualizar información</button>
                            </div>
                        </form>
                    </div>
                </div>
            </div>
        </div>
    </div>
@endsection
