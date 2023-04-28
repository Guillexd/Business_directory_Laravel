@extends('adminlte::page')

@section('title', 'Detalles')

@section('content_header')
    <h1>City Tours</h1>
@stop

@section('content')
    <div class="mx-auto col-12 col-lg-8 col-xl-6">
        <div class="card shadow-sm">
            <img class="card-img-top" width="100%" style="height: 70vh" src="{{asset('/storage/images/'.$touristPlace->image)}}" alt="{{$touristPlace->name}}">
            <div class="card-body">
                <h3 class="text-center">{{$touristPlace->name}}</h3>
                <span>Ubicación: {{$touristPlace->city}} / {{$touristPlace->department}}</span> <br>
                <span>Precio: ${{$touristPlace->price}}</span> <br>
                Reseña:
                <p class="card-text">{{$touristPlace->review}}</p>
                <div class="d-flex justify-content-between align-items-center">
                    <div class="btn-group">
                        <a class="btn btn-sm btn-outline-secondary" href="{{ route('tourist-places.index') }}">Retroceder</a>
                        <a class="btn btn-sm btn-outline-secondary" href="{{ route('tourist-places.edit', $touristPlace->id) }}">Editar</a>
                    </div>
                </div>
            </div>
        </div>
    </div>
@stop

@section('css')
    <link href="https://cdn.jsdelivr.net/npm/bootstrap@5.3.0-alpha3/dist/css/bootstrap.min.css" rel="stylesheet"
        integrity="sha384-KK94CHFLLe+nY2dmCWGMq91rCGa5gtU4mk92HdvYe+M/SXH301p5ILy+dN9+nJOZ" crossorigin="anonymous">
    <link rel="stylesheet" href="/css/admin_custom.css">
@stop

@section('js')
    <script src="https://cdn.jsdelivr.net/npm/bootstrap@5.3.0-alpha3/dist/js/bootstrap.bundle.min.js"
        integrity="sha384-ENjdO4Dr2bkBIFxQpeoTz1HIcje39Wm4jDKdf19U8gI4ddQ3GYNS7NTKfAdVQSZe" crossorigin="anonymous">
    </script>
@stop
