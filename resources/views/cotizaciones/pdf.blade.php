<!DOCTYPE html>
<html>
<head>
    <title>Cotización</title>
</head>
<body>
    <h1>Cotización de Servicio</h1>
    
    <table border="1">
        <thead>
            <tr>
                <th>Número</th>
                <th>Concepto</th>
                <th>Costo Unitario</th>
                <th>Cantidad</th>
                <th>Subtotal</th>
            </tr>
        </thead>
        <tbody>
            <tr>
                <td>1</td>
                <td>{{ $cotizacion->servicio->descripcion }}</td>
                <td>${{ $cotizacion->costo }}</td>
                <td>{{ $cotizacion->cantidad }}</td>
                <td>${{ $cotizacion->total }}</td>
            </tr>
        </tbody>
        <tfoot>
            <tr>
                <td colspan="4">Total</td>
                <td>${{ $cotizacion->total }}</td>
            </tr>
        </tfoot>
    </table>
</body>
</html>