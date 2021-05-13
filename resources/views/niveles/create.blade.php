@extends('layouts.app')
@section('content')
    <div class="container mt-4">
        <div class="row justify-content-center">
            <div class="col-md-8">
                <div class="card">
                    <h3 class="text-center text-navy mt-3"><i class="fas fa-file"></i> Crear nivel</h3>
                    <hr>
                    <div class="card-body">
                        <form action="{{ route('niveles.store') }}" method="POST">
                            @csrf
                            <div class="row">
                                <div class="col-md-12 pb-2">
                                    <label for="nombre_nivel">Tipo de nivel</label>
                                    <input type="text" class="form-control @error('nombre_nivel') is-invalid @enderror"
                                        name="nombre_nivel" value="{{ old('nombre_nivel') }}"
                                        placeholder="Escriba el nombre del nivel">
                                    @error('nombre_nivel')
                                        <div class="alert alert-danger">{{ $message }}</div>
                                    @enderror
                                </div>
                                {{-- <div class="col-md-4">
                                    <label for="id_project">Selecion de proyecto</label>
                                    <select name="id_project"
                                        class="form-control select2 @error('id_project') is-invalid @enderror"
                                        style="width: 100%;">
                                        <option value="">--Seleciona una opción--</option>
                                        @foreach ($proyectos as $proyecto)
                                            @if ($loop->first)
                                                <option value="{{ $proyecto->id }}" selected> {{ $proyecto->name }}
                                                </option>
                                            @else
                                                <option value="{{ $proyecto->id }}"> {{ $proyecto->name }}
                                            @endif
                                        @endforeach
                                    </select>
                                    @error('id_project')
                                        <div class="alert alert-danger">{{ $message }}</div>
                                    @enderror

                                </div> --}}
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
