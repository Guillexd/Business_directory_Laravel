@extends('adminlte::page')

@section('title', 'City Tours')

@section('content_header')
    <h1>City Tours</h1>
@stop

@section('content')
    <h2>Lugares turísticos</h2>
    <a class="btn btn-secondary" href="{{ route('tourist-places.create') }}">(+) Crear nuevo lugar turístico</a>
    <table id="myTable" class="table table-light table-striped table-hover">
        <thead>
            <th>N°</th>
            <th>Nombre</th>
            <th>Ciudad</th>
            <th>Departamento</th>
            <th>Precio</th>
            <th>Reseña</th>
            <th>Opciones</th>
        </thead>
        <tbody>
            @foreach ($touristPlace as $touristPlace)
                <tr>
                    <td>{{ ++$i }}</td>
                    <td>{{ $touristPlace->name }}</td>
                    <td>{{ $touristPlace->city }}</td>
                    <td>{{ $touristPlace->department }}</td>
                    <td>${{ $touristPlace->price }}</td>
                    <td>{{ $touristPlace->review }}</td>
                    <td>
                        <form action="{{ route('tourist-places.destroy', $touristPlace->id) }}" method="POST" class="d-flex flex-column">
                            <a class="btn btn-info text-white w-100" href="{{ route('tourist-places.show', $touristPlace->id) }}">Mostrar</a>
                            <a class="btn btn-primary w-100 my-1" href="{{ route('tourist-places.edit', $touristPlace->id) }}">Editar</a>
                            @csrf
                            @method('DELETE')
                            <button type="submit" class="btn btn-danger w-100">Eliminar</button>
                        </form>
                    </td>
                </tr>
            @endforeach
        </tbody>
    </table>
@stop

@section('css')
    <link href="https://cdn.jsdelivr.net/npm/bootstrap@5.3.0-alpha3/dist/css/bootstrap.min.css" rel="stylesheet" integrity="sha384-KK94CHFLLe+nY2dmCWGMq91rCGa5gtU4mk92HdvYe+M/SXH301p5ILy+dN9+nJOZ" crossorigin="anonymous">
    <link rel="stylesheet" href="/css/admin_custom.css">
    <link rel="stylesheet" href="https://cdn.datatables.net/1.13.4/css/jquery.dataTables.css" />
    <script src="https://code.jquery.com/jquery-3.6.4.slim.js"
        integrity="sha256-dWvV84T6BhzO4vG6gWhsWVKVoa4lVmLnpBOZh/CAHU4=" crossorigin="anonymous"></script>
@stop

@section('js')
    <script src="https://cdn.jsdelivr.net/npm/bootstrap@5.3.0-alpha3/dist/js/bootstrap.bundle.min.js" integrity="sha384-ENjdO4Dr2bkBIFxQpeoTz1HIcje39Wm4jDKdf19U8gI4ddQ3GYNS7NTKfAdVQSZe" crossorigin="anonymous"></script>
    <script src="https://cdn.datatables.net/1.13.4/js/jquery.dataTables.js"></script>
    {{-- <script src="https://cdn.datatables.net/plug-ins/1.13.4/i18n/es-ES.json"></script> --}}
    <script>
        $(document).ready(function() {
            $('#myTable').DataTable({
                "lengthMenu": [
                    [5, 10, 15, 20, -1],
                    [5, 10, 15, 20, "Todo"]
                ],
                "paging": true,
                "searching": true,
                "ordering": true,
                language: {
                    "decimal": "",
                    "emptyTable": "No hay información",
                    "info": "Mostrando _START_ a _END_ de _TOTAL_ Entradas",
                    "infoEmpty": "Mostrando 0 to 0 of 0 Entradas",
                    "infoFiltered": "(Filtrado de _MAX_ total entradas)",
                    "infoPostFix": "",
                    "thousands": ",",
                    "lengthMenu": "Mostrar _MENU_ Entradas",
                    "loadingRecords": "Cargando...",
                    "processing": "Procesando...",
                    "search": "Buscar:",
                    "zeroRecords": "Sin resultados encontrados",
                    "paginate": {
                        "first": "Primero",
                        "last": "Ultimo",
                        "next": "Siguiente",
                        "previous": "Anterior"
                    }
                }
            })
        });
    </script>
@stop
