@extends('layouts.app')
@section('content')
    <div class="container">
        <div class="row justify-content-center">
            <div class="col-md-8">
                <div class="card">
                    <h4 class="text-center text-navy mt-3"> <i class="fas fa-file-signature"></i> Información de proyecto</h4>
                    <hr>
                    <div class="card-body">
                        <div class="row">
                            <div class="col-md-12 ">
                                <h5>
                                    <i class="fas fa-fingerprint"></i>    
                                     Nombre de proyecto: 
                                     <b>{{ $proyecto->name }}</b>
                                </h5>
                            </div>
                            <div class="col-md-12 mt-5 ">
                                <h5>
                                    <i class="fas fa-calendar-alt"></i>
                                    Fecha inicio proyecto
                                    <b>{{ $proyecto->fecha_inicio }}</b>
                                </h5>
                            </div>
                            <div class="col-md-12 mt-5">
                                <h5>
                                    <i class="fas fa-signature"></i>
                                    Descripción:
                                    <b>{{ $proyecto->description}}</b>
                                </h5>
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
