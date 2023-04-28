@extends('adminlte::page')

@section('title', 'Crear')

@section('content_header')
    <h1>City Tours</h1>
@stop

@section('content')
    <h2>Crear lugar turístico</h2>
    <a class="btn btn-primary" href="{{ route('tourist-places.index') }}"> (<-) Rotroceder </a>
        @if ($errors->any())
            <div class="alert alert-danger">
                @foreach ($errors->all() as $error)
                    <li>{{ $error }}</li>
                @endforeach
                <strong>Tenemos algunos incovenientes <br></strong>
            </div>
        @endif
    <form action="{{ route('tourist-places.store') }}" method="POST" enctype="multipart/form-data">
        @csrf
        <div class="form-group">
            <strong>Nombre: </strong>
            <input type="text" class="form-control" name="name"
                placeholder="Nombre">
        </div>
        <div class="form-group">
            <strong>Ciudad: </strong>
            <input type="text" class="form-control" name="city"
                placeholder="Ciudad">
        </div>
        <div class="form-group">
            <strong>Departamento: </strong>
            <input type="text" class="form-control" name="department"
                placeholder="Departamento">
        </div>
        <div class="form-group">
            <strong>Precio: </strong>
            <input type="text" class="form-control" name="price"
                placeholder="Precio">
        </div>
        <div class="form-floating">
            <textarea class="form-control" placeholder="Reseña" id="floatingTextarea" style="height: 100px" name="review"></textarea>
            <label for="floatingTextarea">Reseña</label>
        </div>
        <div class="form-group">
            <strong>Imagen: </strong>
            <input type="file" class="form-control" name="image" accept="image/*" required>
        </div>
        <div class="col-12 text-center mt-4">
            <button type="submit" class="btn btn-success">Guardar</button>
        </div>
    </form>
@stop

@section('css')
    <link href="https://cdn.jsdelivr.net/npm/bootstrap@5.3.0-alpha3/dist/css/bootstrap.min.css" rel="stylesheet" integrity="sha384-KK94CHFLLe+nY2dmCWGMq91rCGa5gtU4mk92HdvYe+M/SXH301p5ILy+dN9+nJOZ" crossorigin="anonymous">
    <link rel="stylesheet" href="/css/admin_custom.css">
@stop

@section('js')
    <script src="https://cdn.jsdelivr.net/npm/bootstrap@5.3.0-alpha3/dist/js/bootstrap.bundle.min.js" integrity="sha384-ENjdO4Dr2bkBIFxQpeoTz1HIcje39Wm4jDKdf19U8gI4ddQ3GYNS7NTKfAdVQSZe" crossorigin="anonymous"></script>
@stop
