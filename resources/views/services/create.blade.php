@extends('layouts.app')

@section('content')
<div class="container">
    <div class="row justify-content-center">
        <div class="col-md-8">
            <div class="card">
                <div class="card-header">Crear Servicio</div>

                <div class="card-body">
                    <form method="POST" action="/clients/{{$client->id}}/services" enctype="multipart/form-data">
                        @csrf

                        <div class="form-group">
                            <label for="name">Nombre</label>
                            <input type="text" class="form-control" name="name" id="name"
                                placeholder="Escribe un nombre para el servicio" value="{{old('name')}}">
                            @error('name')
                            <small class="text-danger">El nombre es requerido</small>
                            @enderror
                        </div>

                        <div class="form-group">
                            <label for="type">Tipo de Servicio</label>
                            <select class="form-select" aria-label="Default select example" name="type">
                                <option selected>Tipo</option>
                                <option value="Básico">Básico</option>
                                <option value="Avanzado">Avanzado</option>
                            </select>
                            @error('type')
                            <small class="text-danger">El tipo es requerido</small>
                            @enderror
                        </div>

                        <div class="form-group">
                            <label for="start">Inicio</label>
                            <input type="date" class="form-control" name="start" id="start" value="{{old('start')}}">
                            @error('start')
                            <small class="text-danger">La fecha de inicio es requerida</small>
                            @enderror

                            <label for="end">Fin</label>
                            <input type="date" class="form-control" name="end" id="end" value="{{old('end')}}">
                            @error('end')
                            <small class="text-danger">La fecha de finalizacion es requerida</small>
                            @enderror

                        </div>

                        

                        <div class="form-group">
                            <label for="observations">Observaciones</label>
                            <textarea class="form-control" name="observations" id="observations"
                                rows="3">{{old('observations')}}</textarea>
                        </div>

                        <div class="form-group">
                            <label for="image">Imagen</label>
                            <input type="file" class="form-control-file" name="image" id="image">
                            @error('image')
                            <small class="text-danger">La imagen es requerida</small>
                            @enderror
                        </div>
                        <a class="btn btn-dark mr-4" href="/home">Regresar</a>
                        <button type="submit" class="btn btn-primary">Crear</button>
                    </form>
                </div>
            </div>
        </div>
    </div>
</div>
@endsection