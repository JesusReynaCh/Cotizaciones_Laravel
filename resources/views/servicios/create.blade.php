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
            <h1>Nuevo Servicio</h1>

            <form action="{{ route('servicios.store') }}" method="POST">
                @csrf

                <div class="form-group">
                    <label>Categoría*</label>
                    <select name="categoria_id" class="form-control" required>
                        <option value="">Seleccione una categoría</option>
                        @foreach ($categorias as $categoria)
                            <option value="{{ $categoria->id }}">{{ $categoria->nombre }}</option>
                        @endforeach
                    </select>
                </div>

                <div class="form-group">
                    <label>Descripción*</label>
                    <input type="text" name="descripcion" class="form-control" required value="{{ old('descripcion') }}">
                </div>

                <div class="form-group">
                    <label>Costo Unitario*</label>
                    <input type="number" name="costo_unitario" class="form-control" step="0.01" required
                        value="{{ old('costo_unitario') }}">
                </div>

                <button type="submit" class="btn btn-primary mt-3">Crear Servicio</button>
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
