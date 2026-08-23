<!DOCTYPE html>
<html>
<head>
    <meta charset="utf-8">
    <title>Reporte de Servidor</title>
    <style>
        body {
            font-family: Arial, sans-serif;
            background-color: #f4f4f5;
            color: #333;
            padding: 20px;
        }
        .container {
            background-color: #ffffff;
            border-radius: 8px;
            padding: 20px;
            max-width: 600px;
            margin: 0 auto;
            box-shadow: 0 4px 6px rgba(0,0,0,0.1);
        }
        h2 {
            color: #1f2937;
            border-bottom: 1px solid #e5e7eb;
            padding-bottom: 10px;
        }
        .info-block {
            background-color: #f9fafb;
            border: 1px solid #e5e7eb;
            border-radius: 6px;
            padding: 15px;
            margin-bottom: 20px;
        }
        .info-block p {
            margin: 5px 0;
            font-size: 14px;
        }
        .label {
            font-weight: bold;
            color: #4b5563;
            display: inline-block;
            width: 120px;
        }
        .value {
            color: #111827;
        }
        .footer {
            margin-top: 20px;
            font-size: 12px;
            color: #9ca3af;
            text-align: center;
        }
    </style>
</head>
<body>
    <div class="container">
        <h2>Reporte Diario de Servidor</h2>
        <p>A continuación se detallan los datos actuales de conexión del entorno de producción.</p>
        
        <div class="info-block">
            <h3>Información de Red</h3>
            <p><span class="label">IP Pública:</span> <span class="value">{{ $ip ?? 'No detectada' }}</span></p>
        </div>

        <div class="info-block">
            <h3>Base de Datos</h3>
            <p><span class="label">Host:</span> <span class="value">{{ $dbConfig['host'] ?? 'N/A' }}</span></p>
            <p><span class="label">Puerto:</span> <span class="value">{{ $dbConfig['port'] ?? 'N/A' }}</span></p>
            <p><span class="label">Base de Datos:</span> <span class="value">{{ $dbConfig['database'] ?? 'N/A' }}</span></p>
            <p><span class="label">Usuario:</span> <span class="value">{{ $dbConfig['username'] ?? 'N/A' }}</span></p>
            <p><span class="label">Contraseña:</span> <span class="value">{{ isset($dbConfig['password']) ? str_repeat('*', strlen($dbConfig['password'])) : 'N/A' }}</span></p>
        </div>

        <div class="footer">
            Generado automáticamente por {{ config('app.name') }}
        </div>
    </div>
</body>
</html>
