@extends('layouts.app')
@section('content')
    <div class="container">
        <div class="row justify-content-center">
            <div class="col-md-8">
                <div class="card">
                    <h4 class="text-center text-navy mt-3"> <i class="fas fa-file-signature"></i> Información de categoria</h4>
                    <hr>
                    <div class="card-body">
                        <div class="row">
                            <div class="col-md-12 ">
                                <p>
                                    <i class="fas fa-fingerprint"></i>
                                    Nombre de proyecto
                                    <b>{{ $categoria->name }}</b>
                                </p>
                            </div>
                            <div class="col-md-12">
                                <p>
                                    <i class="fas fa-signature"></i>
                                    Descripción:
                                    <b>{{ $categoria->description}}</b>
                                </p>
                            </div>

                            <div class="col-md-12">
                                <p>
                                    <i class="fas fa-signature"></i>
                                    ID de proyecto asignado:
                                    <b>{{ $categoria->id_project }}</b>
                                </p>
                            </div>

                        </div>
                        <div class="text-center mt-5">
                            <a href="{{ route('proyectos.index') }} " class="btn btn-sm btn-primary text-white"><i
                                    class="fas fa-undo-alt text-white"></i> Atras</a>
                        </div>
                    </div>
                </div>
            </div>
        </div>
    </div>
@endsection
