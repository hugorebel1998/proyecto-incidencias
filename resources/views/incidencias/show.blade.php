@extends('layouts.app')
@section('content')
    <div class="container">
        <div class="row justify-content-center">
            <div class="col-md-8">
                <div class="card card-navy card-outline">
                    <div class="card-body box-profile">
                        <div class="text-left">
                            <h5 class="text-info">Información de reporte</h5>
                        </div>
                        <hr>
                        <div class="card-body">
                            <div class="row">
                                <div class="col-md-6">
                                    <b>No. Reporte</b>
                                    <p>{{ $incidencia->id}}</p>
                                </div>
                                <div class="col-md-6">
                                    <b>Categoria de reporte</b>
                                    <p>{{ $incidencia->id_category}}</p>
                                </div>
                                <div class="col-md-6">
                                    <b>Titulo</b>
                                    <p>{{ $incidencia->title}}</p>
                                </div>
                                <div class="col-md-6">
                                    <b>ID Usuario</b>
                                    <p>{{ $incidencia->id_client}}</p>
                                </div>
                                <div class="col-md-12">
                                    <b>Descripción</b>
                                    <p>{{ $incidencia->description}}</p>
                                </div>
                            </div>

                        </div>
                        
                    </div>

                </div>

            </div>
        </div>
    </div>


@endsection
