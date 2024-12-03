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
    <h1>Nueva Cotización</h1>
    
    <form action="{{ route('cotizaciones.store') }}" method="POST">
        @csrf
        
        <div class="form-group">
            <label>Cliente</label>
            <select name="cliente_id" class="form-control">
                @foreach($clientes as $cliente)
                    <option value="{{ $cliente->id }}">{{ $cliente->nombre }}</option>
                @endforeach
            </select>
        </div>

        <div class="form-group">
            <label>Categoría</label>
            <select name="categoria_id" class="form-control">
                @foreach($categorias as $categoria)
                    <option value="{{ $categoria->id }}">{{ $categoria->nombre }}</option>
                @endforeach
            </select>
        </div>

        <div class="form-group">
            <label>Servicio</label>
            <select name="servicio_id" class="form-control">
                @foreach($servicios as $servicio)
                    <option value="{{ $servicio->id }}">{{ $servicio->descripcion }} - ${{ $servicio->costo_unitario }}</option>
                @endforeach
            </select>
        </div>

        <div class="form-group">
            <label>Cantidad</label>
            <input type="number" name="cantidad" class="form-control" required>
        </div>

        <button type="submit" class="btn btn-primary">Crear Cotización</button>
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