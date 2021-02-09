@extends('layouts.app')

@section('content')
<div class="container">
    <div class="row justify-content-center">
        <div class="col-md-8">
            <div class="card">
                <div class="card-header">Home</div>

                <div class="card-body">
                    <a class="btn btn-dark" href="/clients/create">Crear Cliente</a>                    
                </div>      
             
            </div>

            <div class="card mt-4">
                <div class="card-header">Clientes</div>
                
                <div class="card-body">   
                    @if ($clients->count() == 0)
                        <div>No hay clientes disponibles</div>
                    @else
                        <table class="table">
                            <thead>
                                <tr>
                                    <th scope="col">#</th>
                                    <th scope="col">Nombre</th>
                                    <th scope="col">Correo</th>
                                    <th scope="col">Telefono</th>
                                    <th scope="col"></th>
                                    <th scope="col"></th>
                                    <th scope="col"></th>
                                </tr>
                            </thead>
                            <tbody>
                        
                                @foreach ($clients as $client)
                                <tr>
                                    <th scope="row">{{$client->id}}</th>
                                    <td>{{$client->name}}</td>
                                    <td>{{$client->email}}</td>
                                    <td>{{$client->phone}}</td>
                                    <td><a class="btn btn-sm btn btn-outline-success" href="/clients/show/{{$client->id}}">Ver</a></td>
                                    <td><a class="btn btn-sm btn btn-outline-primary" href="/clients/{{$client->id}}/edit">Editar</a></td>
                                    <form action="/clients/delete/{{$client->id}}" method="post">
                                        @method('DELETE')
                                        @csrf
                                        <td><button class="btn btn-sm btn btn-outline-danger" type="submit">Eliminar</button></td>
                                    </form>
                                </tr>
                        
                                @endforeach
                        
                            </tbody>
                        </table>                        
                    @endif  
                </div>

            </div>
        </div>
    </div>
</div>
@endsection
