@extends('layouts.app')

@section('content')
<div class="container">
    <div class="row justify-content-center">
        <div class="col-md-8">
            
            <div class="card">
                <div class="card-header">Información</div>

                <div class="card-body">

                    <div class="row">
                        <div class="col-3">
                            <img class="w-100" src="/storage/{{$client->image}}">
                        </div>
                        <div class="col-9">
                            <div class="h4">{{$client->name}}</div>
                            <div><strong>Correo: </strong>{{$client->email}}</div>
                            <div><strong>Telefono: </strong>{{$client->phone}}</div>
                            <div><strong>Cedula: </strong>{{$client->cedula}}</div>
                            @if ($client->observations != "")
                                <div><strong>Observaciones: </strong>{{$client->observations}}</div>
                            @endif
                        </div>                        
                    </div>
                    <div class="row">
                        <a class="btn btn-dark mt-3 ml-3" href="/home">Regresar</a>
                    </div>
                </div>

            </div>

            <div class="card mt-4">
                <div class="card-header">Servicios</div>
            
                <div class="card-body">
                    @if ($client->services()->count() == 0)
                        <div>No hay servicios disponibles</div>
                        <a class="btn btn-sm btn btn-outline-success" href="/clients/{{$client->id}}/services/create">Añadir Servicio</a>
                    @else 
                        <table class="table">
                            <thead>
                                <tr>
                                    <th scope="col">Imagen</th>
                                    <th scope="col">Nombre</th>
                                    <th scope="col">Tipo</th>
                                    <th scope="col">Inicio</th>
                                    <th scope="col">Fin</th>
                                    <th scope="col">Observaciones</th>
                                </tr>
                            </thead>
                            <tbody>
                
                                @foreach ($client->services as $service)
                                <tr>
                                    <td><img class="w-50" src="/storage/{{$service->image}}"></td>
                                    <td>{{$service->name}}</td>
                                    <td>{{$service->type}}</td>
                                    <td>{{date('m/d/Y', $service->start)}}</td>
                                    <td>{{date('m/d/Y', $service->end)}}</td>
                                    <td>{{$service->observations}}</td>
                                </tr>                
                                @endforeach
                
                            </tbody>
                        </table>
                        <a class="btn btn-sm btn btn-outline-success" href="/clients/{{$client->id}}/services/create">Añadir Servicio</a>
                    @endif
                </div>
            </div>            
        </div>
    </div>
</div>
@endsection