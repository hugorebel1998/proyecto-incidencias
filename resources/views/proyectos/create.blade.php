@extends('layouts.app')
@section('content')
    <div class="container mt-4">
        <div class="row justify-content-center">
            <div class="col-md-8">
                <div class="card">
                    <h3 class="text-center text-navy mt-3"><i class="fas fa-file"></i> Crear proyecto</h3>
                    <hr>
                    <div class="card-body">
                        <form action="{{ route('proyectos.store') }}" method="POST">
                            @csrf
                            <div class="row">
                                <div class="col-md-6 pb-2">
                                    <label for="nombre_proyecto">Nombre de proyecto</label>
                                    <input type="text" class="form-control @error('nombre_proyecto') is-invalid @enderror"
                                        name="nombre_proyecto" value="{{ old('nombre_proyecto') }}"
                                        placeholder="Escriba el nombre del proyecto">
                                    @error('nombre_proyecto')
                                        <div class="alert alert-danger">{{ $message }}</div>
                                    @enderror
                                </div>
                                <div class="col-md-6">
                                    <label for="fecha_inicio">Fecha inicio proyecto</label>
                                    <input type="datetime-local" name="fecha_inicio"
                                        class="form-control @error('fecha_inicio') is-invalid @enderror"
                                        value="{{ old('fecha_inicio') }}">
                                    @error('fecha_inicio')
                                        <div class="alert alert-danger">{{ $message }}</div>
                                    @enderror
                                </div>

                                <div class="col-md-6 mt-3">
                                    <label for="id_category">Selecion de categoria</label>
                                    <select name="id_category"
                                        class="form-control select2 @error('id_category') is-invalid @enderror"
                                        style="width: 100%;">
                                        <option value="0" selected>--Seleciona una opción--</option>
                                        @foreach ($categorias as $categoria)
                                            @if ($loop->first)
                                                <option value="{{ $categoria->id }}"> {{ $categoria->name }}
                                                </option>
                                            @else
                                                <option value="{{ $categoria->id }}"> {{ $categoria->name }}
                                            @endif
                                        @endforeach
                                    </select>

                                </div>
                                <div class="col-md-6 mt-3">
                                    <label for="id_level">Selecion de nivel</label>
                                    <select name="id_level"
                                        class="form-control select2 @error('id_level') is-invalid @enderror"
                                        style="width: 100%;">
                                        <option value="" selected>--Seleciona una opción--</option>
                                        @foreach ($niveles as $nivel)
                                            @if ($loop->first)
                                                <option value="{{ $nivel->id }}"> {{ $nivel->name }}
                                                </option>
                                            @else
                                                <option value="{{ $nivel->id }}"> {{ $nivel->name }}
                                            @endif
                                        @endforeach
                                        </option>
                                    </select>
                                </div>
                                <div class="col-md-12 mt-3">
                                    <label for="descripción">Descripción</label>
                                    <textarea name="descripción"
                                        class="form-control @error('descripción') is-invalid @enderror" rows="3"
                                        placeholder="Escriba una breve descripción"></textarea>
                                    @error('descripción')
                                        <div class="alert alert-danger">{{ $message }}</div>
                                    @enderror
                                </div>

                            </div>
                            <div class="text-center mt-4">
                                <button type="submit" class="btn btn-sm btn-primary"><i class="fas fa-save"></i>
                                    Guardar</button>
                            </div>
                        </form>
                    </div>
                </div>
            </div>
        </div>
    </div>
@endsection
