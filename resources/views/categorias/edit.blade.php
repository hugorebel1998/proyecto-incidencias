@extends('layouts.app')
@section('content')
    <div class="container mt-4">
        <div class="row justify-content-center">
            <div class="col-md-8">
                <div class="card">
                    <h3 class="text-center text-navy mt-3"><i class="fas fa-file"></i> Editar categoria</h3>
                    <hr>
                    <div class="card-body">
                        <form action="{{ route('categorias.update', $categoria->id) }}" method="POST">
                            @csrf
                            <div class="row">
                                <div class="col-md-6 pb-2">
                                    <label for="nombre_categoria">Nombre de categoria</label>
                                    <input type="hidden" name="id" value="{{ $categoria->id }}">
                                    <input type="text" class="form-control @error('nombre_categoria') is-invalid @enderror"
                                        name="nombre_categoria" value="{{ $categoria->name }}">
                                    @error('nombre_categoria')
                                        <div class="alert alert-danger">{{ $message }}</div>
                                    @enderror
                                </div>
                                {{-- <div class="col-md-6">
                                    <label for="id_project">Nombre del proyecto</label>
                                    <select disabled name="id_project"
                                        class="form-control select2"
                                        style="width: 100%;">
                                        <option value="">--Seleciona una opción--</option>
                                                <option value="{{ $proyecto->id}}" selected> {{ $proyecto->name }}
                                                </option>
                                        </option>
                                    </select>
                                </div> --}}
                                <div class="col-md-12 mt-3">
                                    <label for="descripción">Descripción</label>
                                    <textarea name="descripción"
                                        class="form-control @error('descripción') is-invalid @enderror"
                                        rows="3">{{ $categoria->description }}</textarea>
                                    @error('descripción')
                                        <div class="alert alert-danger">{{ $message }}</div>
                                    @enderror
                                </div>
                                
                            </div>
                            <div class="text-center mt-4">
                                <button type="submit" class="btn btn-sm btn-success"><i class="fas fa-save"></i> Actualizar
                                    categoria</button>
                            </div>
                        </form>
                    </div>
                </div>
            </div>
        </div>
    </div>
@endsection
