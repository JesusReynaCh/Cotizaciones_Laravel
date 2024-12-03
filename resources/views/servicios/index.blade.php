<!DOCTYPE html>
<html lang="es">

<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>{{ config('app.name', 'Sistema de Cotizaciones') }}</title>

    <!-- Bootstrap CSS -->
    <link href="https://cdn.jsdelivr.net/npm/bootstrap@5.3.0/dist/css/bootstrap.min.css" rel="stylesheet">

</head>

<body>
    @extends('layouts.app')

    @section('content')
        <div class="container">
            <h1>Servicios</h1>
            <a href="{{ route('servicios.create') }}" class="btn btn-primary mb-3">Nuevo Servicio</a>

            <table class="table table-striped">
                <thead>
                    <tr>
                        <th>Categoría</th>
                        <th>Descripción</th>
                        <th>Costo Unitario</th>
                        <th>Acciones</th>
                    </tr>
                </thead>
                <tbody>
                    @foreach ($servicios as $servicio)
                        <tr>
                            <td>{{ $servicio->categoria->nombre }}</td>
                            <td>{{ $servicio->descripcion }}</td>
                            <td>${{ number_format($servicio->costo_unitario, 2) }}</td>
                            <td>
                                <a href="{{ route('servicios.show', $servicio) }}" class="btn btn-sm btn-info">Ver</a>
                                <a href="{{ route('servicios.edit', $servicio) }}" class="btn btn-sm btn-warning">Editar</a>
                                <form action="{{ route('servicios.destroy', $servicio) }}" method="POST" class="d-inline">
                                    @csrf
                                    @method('DELETE')
                                    <button type="submit" class="btn btn-sm btn-danger"
                                        onclick="return confirm('¿Está seguro de eliminar este servicio?')">Eliminar</button>
                                </form>
                            </td>
                        </tr>
                    @endforeach
                </tbody>
            </table>
        </div>
    @endsection

    <!-- Bootstrap JS y dependencias -->
    <script src="https://cdn.jsdelivr.net/npm/@popperjs/core@2.11.6/dist/umd/popper.min.js"></script>
    <script src="https://cdn.jsdelivr.net/npm/bootstrap@5.3.0/dist/js/bootstrap.min.js"></script>

    <!-- Font Awesome para iconos (opcional) -->
    <link rel="stylesheet" href="https://cdnjs.cloudflare.com/ajax/libs/font-awesome/5.15.3/css/all.min.css">

    <!-- Scripts adicionales -->
    @yield('scripts')
</body>

</html>
