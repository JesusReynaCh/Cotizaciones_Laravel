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
    <div class="container mt-5">
        <div class="row">
            <div class="col-md-8 offset-md-2">
                <div class="card">
                    <div class="card-header bg-primary text-white">
                        <h2 class="text-center">Sistema de Cotizaciones</h2>
                    </div>
                    <div class="card-body">
                        <div class="row text-center">
                            <div class="col-md-3">
                                <a href="{{ route('clientes.index') }}" class="btn btn-outline-primary btn-lg mb-3">
                                    <i class="fas fa-users fa-2x"></i>
                                    <br>Clientes
                                </a>
                            </div>
                            <div class="col-md-3">
                                <a href="{{ route('categorias.index') }}" class="btn btn-outline-success btn-lg mb-3">
                                    <i class="fas fa-tags fa-2x"></i>
                                    <br>Categorías
                                </a>
                            </div>
                            <div class="col-md-3">
                                <a href="{{ route('servicios.index') }}" class="btn btn-outline-warning btn-lg mb-3">
                                    <i class="fas fa-clipboard-list fa-2x"></i>
                                    <br>Servicios
                                </a>
                            </div>
                            <div class="col-md-3">
                                <a href="{{ route('cotizaciones.index') }}" class="btn btn-outline-danger btn-lg mb-3">
                                    <i class="fas fa-file-invoice-dollar fa-2x"></i>
                                    <br>Cotizaciones
                                </a>
                            </div>
                        </div>
                    </div>
                    <div class="card-footer text-muted text-center">
                        © {{ date('Y') }} Sistema de Gestión de Cotizaciones
                    </div>
                </div>
            </div>
        </div>
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