@extends('layouts.app')
@section('content')
    <div class="container">
        <div class="row justify-content-center">
            <div class="col-md-10">
                <div class="card card-navy">
                    <div class="card-header">
                        <h4 class="text-left"><i class="fas fa-file-signature"></i> Crear reporte</h4>
                    </div>
                    <div class="card-body">
                        <form action="#" method="POST">
                            @csrf
                            <div class="row">
                                <div class="col-md-6">
                                    <label for="">Categoria</label>
                                    <select class="form-control select2" style="width: 100%;">
                                        <option selected="selected">Alabama</option>
                                        <option>Alaska</option>
                                    </select>
                                </div>
                                <div class="col-md-6">
                                    <label for="">Severidad</label>
                                    <select class="form-control select2" style="width: 100%;">
                                        <option selected="selected">Alabama</option>
                                        <option>Alaska</option>
                                    </select>
                                </div>
                            </div>
                            <div class="form-group mt-3">
                                <label for="title">Titulo</label>
                                <input type="text" class="form-control" name="title" placeholder="Ingresa un titulo">
                            </div>
                            <div class="form-group mt-3">
                                <label for="description">Descripción</label>
                                <textarea class="form-control" name="description" rows="3"
                                    placeholder="Escribe una breve descripción"></textarea>
                            </div>
                            <div class="text-center">
                                <button type="submit" class="btn btn-sm bg-navy"><i class="fas fa-save"></i> Guardar</button>

                            </div>
                        </form>
                    </div>
                </div>
            </div>
        </div>
    </div>
@endsection
