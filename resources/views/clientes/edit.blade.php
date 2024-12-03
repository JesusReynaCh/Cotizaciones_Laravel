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
            <h1>Editar Cliente</h1>

            <form action="{{ route('clientes.update', $cliente) }}" method="POST">
                @csrf
                @method('PUT')

                <div class="form-group">
                    <label>Nombre*</label>
                    <input type="text" name="nombre" class="form-control" required
                        value="{{ old('nombre', $cliente->nombre) }}">
                </div>

                <div class="form-group">
                    <label>Email*</label>
                    <input type="email" name="email" class="form-control" required
                        value="{{ old('email', $cliente->email) }}">
                </div>

                <div class="form-group">
                    <label>Teléfono</label>
                    <input type="text" name="telefono" class="form-control"
                        value="{{ old('telefono', $cliente->telefono) }}">
                </div>

                <div class="form-group">
                    <label>Dirección</label>
                    <input type="text" name="direccion" class="form-control"
                        value="{{ old('direccion', $cliente->direccion) }}">
                </div>

                <div class="form-group">
                    <label>Razón Social</label>
                    <input type="text" name="razon_social" class="form-control"
                        value="{{ old('razon_social', $cliente->razon_social) }}">
                </div>

                <div class="form-group">
                    <label>RFC</label>
                    <input type="text" name="rfc" class="form-control" value="{{ old('rfc', $cliente->rfc) }}">
                </div>

                <button type="submit" class="btn btn-primary">Actualizar Cliente</button>
            </form>
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
