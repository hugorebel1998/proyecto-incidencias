@extends('layouts.app')
@section('content')
    <div class="container">
        <div class="row justify-content-center">
            <div class="col-md-8">
                <div class="card">
                    <div class="card-header">
                        <i class="fas fa-info-circle"></i>
                        {{ __('Información de usuario ') }}
                    </div>
                    <div class="card-body">

                        <div class="row">
                            <div class="col-md-6 ">
                                <p>
                                    <i class="fas fa-fingerprint"></i>
                                    No. registro :
                                    <b>{{ $usuario->id }}</b>
                                </p>
                            </div>
                            <div class="col-md-6">
                                <p>
                                    <i class="fas fa-signature"></i>
                                    Nombre de usuario: 
                                    
                                    <b>{{ $usuario->name }}</b>
                                </p>
                            </div>
                            <div class="col-md-6 pt-4">
                                <p>
                                    <i class="fas fa-puzzle-piece"></i>
                                    Correo electrónico: 
                                    <b>{{ $usuario->email }}</b>
                                </p>
                            </div>
                            {{-- <div class="col-md-6 pt-4">
                                <p>
                                    <i class="fas fa-user"></i>
                                    Tipo de usuario:
                                    <b></b>
                                </p>
                            </div> --}}
                        </div>
                        <div class="text-center mt-5">
                            <a href="{{ route('usuarios.index') }} " class="btn btn-sm btn-info text-white"><i
                                    class="fas fa-undo-alt text-white"></i> Atras</a>
                        </div>
                    </div>
                </div>
            </div>
        </div>
    </div>
@endsection
