@extends('layouts.app')
@section('content')
    <div class="container mt-4">
        <div class="row justify-content-center">
            <div class="col-md-8">
                <div class="card">
                    <h3 class="text-center text-navy mt-3"><i class="fas fa-file"></i> Crear categoria</h3>
                    <hr>
                    <div class="card-body">
                        <form action="{{ route('categorias.store') }}" method="POST">
                            @csrf
                            <div class="row">
                                <div class="col-md-6 pb-2">
                                    <label for="nombre_categoria">Nombre de categoria</label>
                                    <input type="text" class="form-control @error('nombre_categoria') is-invalid @enderror"
                                        name="nombre_categoria" value="{{ old('nombre_categoria') }}"
                                        placeholder="Escriba el nombre de la caegoria">
                                    @error('nombre_categoria')
                                        <div class="alert alert-danger">{{ $message }}</div>
                                    @enderror
                                </div>
                                <div class="col-md-6">
                                    <label for="id_category">Nombre del proyecto</label>
                                    <select name="id_project"
                                        class="form-control select2 @error('id_project') is-invalid @enderror"
                                        style="width: 100%;">
                                        <option value="">--Seleciona una opción--</option>
                                        @foreach ($proyectos as $proyecto)
                                            @if ($loop->first)
                                                <option value="{{ $proyecto->id }}" selected> {{ $proyecto->name }}
                                                </option>
                                            @else
                                                <option value="{{ $proyecto->id }}"> {{ $proyecto->name }}</option>
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
