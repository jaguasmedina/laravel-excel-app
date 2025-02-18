<!DOCTYPE html>
<html lang="es">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Reporte de Logs</title>
</head>
<body>
    <form action="{{ route('report.generate') }}" method="POST">
        @csrf
        <label>Fecha Inicio:</label>
        <input type="date" name="fecha_inicio" required>
        <label>Fecha Fin:</label>
        <input type="date" name="fecha_fin" required>
        <button type="submit">Generar</button>
    </form>

    @if(isset($logs))
        <table border="1">
            <tr>
                <th>ID</th>
                <th>Usuario ID</th>
                <th>Actividad</th>
                <th>Detalles</th>
                <th>Fecha</th>
            </tr>
            @foreach($logs as $log)
                <tr>
                    <td>{{ $log->id }}</td>
                    <td>{{ $log->usuario_id }}</td>
                    <td>{{ $log->actividad }}</td>
                    <td>{{ $log->detalles }}</td>
                    <td>{{ $log->created_at }}</td>
                </tr>
            @endforeach
        </table>

        <form action="{{ route('report.export') }}" method="POST">
            @csrf
            <input type="hidden" name="fecha_inicio" value="{{ request('fecha_inicio') }}">
            <input type="hidden" name="fecha_fin" value="{{ request('fecha_fin') }}">
            <button type="submit">Descargar en Excel</button>
        </form>
    @endif
</body>
</html>
