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
            <h1>Cotizaciones</h1>
            <a href="{{ route('cotizaciones.create') }}" class="btn btn-primary">Nueva Cotización</a>

            <table class="table">
                <thead>
                    <tr>
                        <th>Categoría</th>
                        <th>Servicio</th>
                        <th>Cliente</th>
                        <th>Costo</th>
                        <th>Cantidad</th>
                        <th>Total</th>
                        <th>Acciones</th>
                    </tr>
                </thead>
                <tbody>
                    @foreach ($cotizaciones as $cotizacion)
                        <tr>
                            <td>{{ $cotizacion->categoria->nombre }}</td>
                            <td>{{ $cotizacion->servicio->descripcion }}</td>
                            <td>{{ $cotizacion->cliente->nombre }}</td>
                            <td>${{ $cotizacion->costo }}</td>
                            <td>{{ $cotizacion->cantidad }}</td>
                            <td>${{ $cotizacion->total }}</td>
                            <td>
                                <a href="{{ route('cotizaciones.pdf', $cotizacion) }}" class="btn btn-sm btn-info">Generar
                                    PDF</a>
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
