@extends('layouts.app')
@section('content')
    <div class="container mt-4">
        <div class="row justify-content-center">
            <div class="col-md-8">
                <div class="card">
                    <h3 class="text-center text-navy mt-3"><i class="fas fa-file"></i> Editar proyecto</h3>
                    <hr>
                    <div class="card-body">
                        <form action="{{ route('proyectos.update', [$proyecto->id]) }}" method="POST">
                            @csrf
                            <div class="row">
                                <div class="col-md-6 pb-2">
                                    <label for="nombre_proyecto">Nombre de proyecto</label>
                                    <input type="hidden" name="id" value="{{ $proyecto->id }}">
                                    <input type="text" class="form-control @error('nombre_proyecto') is-invalid @enderror"
                                        name="nombre_proyecto" value="{{ $proyecto->name }}">
                                    @error('nombre_proyecto')
                                        <div class="alert alert-danger">{{ $message }}</div>
                                    @enderror
                                </div>
                                @if ($proyecto->fecha_inicio === null)
                                <div class="col-md-6 mt-3">
                                    <label for="fecha_inicio">Fecha inicio proyecto</label>
                                    <input type="datetime-local" name="fecha_inicio"
                                        class="form-control @error('fecha_inicio') is-invalid @enderror"
                                        value="{{ $proyecto->fecha_inicio }}">
                                    @error('fecha_inicio')
                                        <div class="alert alert-danger">{{ $message }}</div>
                                    @enderror
                                </div>
                                @else
                                <div class="col-md-6 mt-3">
                                    <label for="fecha_inicio">Fecha inicio proyecto</label>
                                    <input disabled type="text" name="fecha_inicio"
                                        class="form-control @error('fecha_inicio') is-invalid @enderror"
                                        value="{{ $proyecto->fecha_inicio }}">
                                    @error('fecha_inicio')
                                        <div class="alert alert-danger">{{ $message }}</div>
                                    @enderror
                                </div>
                                @endif
                                
                                <div class="col-md-12 mt-3">
                                    <label for="descripción">Descripción</label>
                                    <textarea name="descripción"
                                        class="form-control @error('descripción') is-invalid @enderror"
                                        rows="3">{{ $proyecto->description }}</textarea>
                                    @error('descripción')
                                        <div class="alert alert-danger">{{ $message }}</div>
                                    @enderror
                                </div>
                                
                            </div>
                            <div class="text-center mt-4">
                                <button type="submit" class="btn btn-sm btn-success"><i class="fas fa-save"></i> Actualizar
                                    proyecto</button>
                            </div>
                        </form>
                    </div>
                </div>
            </div>
        </div>
    </div>
@endsection
