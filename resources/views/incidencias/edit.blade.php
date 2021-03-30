@extends('layouts.app')
@section('content')
    <div class="container">
        <div class="row justify-content-center">
            <div class="col-md-10">
                <div class="card card-navy">
                    <div class="card-header">
                        <h4 class="text-left"><i class="fas fa-edit"></i> Editar reporte</h4>
                    </div>
                    <div class="card-body">
                        <form action="{{ route('incidencias.update', $incidencia->id) }}" method="POST">
                            @csrf
                            <div class="row">
                                <div class="col-md-6">
                                    <label for="id_category">Categoria</label>
                                    <select hidden="id_category" disabled name="id_category"
                                        class="form-control select2 @error('id_category') is-invalid @enderror"
                                        style="width: 100%;">
                                        @foreach ($categorias as $category)
                                            <option value="{{ $category->id }}">
                                                {{ $category->name }}
                                            </option>
                                        @endforeach
                                    </select>
                                    @error('id_category')
                                        <div class="alert alert-danger">{{ $message }}</div>
                                    @enderror
                                </div>
                                <div class="col-md-6">
                                    <label for="severity">Severidad</label>
                                    <select class="form-control select2 @error('gravedad') is-invalid @enderror"
                                        name="gravedad" style="width: 100%;">
                                        <option>{{ $incidencia->severity}}</option>
                                        <option value="Menor">Menor</option>
                                        <option value="Normal">Normal</option>
                                        <option value="Alta">Alta</option>
                                    </select>
                                    @error('gravedad')
                                        <div class="alert alert-danger">{{ $message }}</div>
                                    @enderror
                                </div>
                            </div>
                            <div class="form-group mt-3">
                                <label for="title">Titulo</label>
                                <input type="text" class="form-control @error('titulo') is-invalid @enderror" name="titulo"
                                    value="{{ $incidencia->title }}" placeholder="Ingresa un titulo">
                                @error('titulo')
                                    <div class="alert alert-danger">{{ $message }}</div>
                                @enderror
                            </div>
                            <div class="form-group mt-3">
                                <label for="description">Descripción</label>
                                <textarea class="form-control @error('description') is-invalid @enderror" name="description" rows="3"
                                    placeholder="Escribe una breve descripción">{{ $incidencia->description }}</textarea>
                                    @error('description')
                                    <div class="alert alert-danger">{{ $message }}</div>
                                @enderror

                            </div>
                            <div class="text-center">
                                <button type="submit" class="btn btn-sm bg-navy"><i class="fas fa-save"></i>
                                    Actualizar</button>
                            </div>
                        </form>
                    </div>
                </div>
            </div>
        </div>
    </div>
@endsection
