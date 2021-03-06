@extends('layouts.app')

@section('content')

<div class="container">
    <div class="row justify-content-center">
        <div class="col-md-8">
            <div class="card">
                <div class="card-header">Crear Cliente</div>

                <div class="card-body">
                    <form method="POST" action="/clients/{{$client->id}}" enctype="multipart/form-data">
                        @method('PATCH')
                        @csrf

                        <div class="form-group">
                            <label for="name">Nombre y Apellido</label>
                            <input type="text" class="form-control" name="name" id="name"
                                placeholder="Escribe tu nombre completo" value="{{ old('name') ?? $client->name}}">
                        </div>

                        <div class="form-group">
                            <label for="cedula">Cedula</label>
                            <input type="text" class="form-control" name="cedula" id="cedula" placeholder="Cedula" value="{{ old('name') ?? $client->cedula}}">
                        </div>

                        <div class="form-group">
                            <label for="email">Direccion de Correo</label>
                            <input type="email" class="form-control" name="email" id="email"
                                aria-describedby="emailHelp" placeholder="Escribe tu email" value="{{ old('name') ?? $client->email}}">
                            <small id="emailHelp" class="form-text text-muted">Escribe una direccion de correo
                                valida.</small>
                        </div>

                        <div class="form-group">
                            <label for="phone">Telefono</label>
                            <input type="tel" class="form-control" name="phone" id="phone"
                                placeholder="Numero Telefonico" value="{{ old('name') ?? $client->phone}}">
                        </div>

                        <div class="form-group">
                            <label for="observations">Observaciones</label>
                            <textarea class="form-control" name="observations" id="observations" rows="3" >{{ old('name') ?? $client->observations}}</textarea>
                        </div>

                        <div class="form-group">
                            <label for="image">Imagen</label>
                            <input type="file" class="form-control-file" name="image" id="image">
                            @error('image')
                            <strong>{{ $message }}</strong>
                            @enderror
                        </div>
                        <a class="btn btn-dark mr-4" href="/home">Regresar</a>
                        <button type="submit" class="btn btn-primary">Actualizar</button>
                    </form>
                </div>
            </div>
        </div>
    </div>
</div>
@endsection