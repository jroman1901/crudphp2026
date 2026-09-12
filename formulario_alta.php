<!DOCTYPE html>
<html lang="es">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Alta de Cliente - Banco</title>
    <style>
        * {
            margin: 0;
            padding: 0;
            box-sizing: border-box;
        }
        body {
            font-family: 'Segoe UI', Tahoma, Geneva, Verdana, sans-serif;
            background-color: #f5f5f5;
            padding: 20px;
        }
        .container {
            max-width: 500px;
            margin: 0 auto;
            background: white;
            padding: 30px;
            border-radius: 10px;
            box-shadow: 0 2px 10px rgba(0,0,0,0.1);
        }
        h1 {
            color: #2c3e50;
            text-align: center;
            margin-bottom: 10px;
        }
        h2 {
            color: #34495e;
            margin-bottom: 20px;
            border-bottom: 2px solid #27ae60;
            padding-bottom: 10px;
        }
        .form-group {
            margin-bottom: 15px;
        }
        label {
            display: block;
            margin-bottom: 5px;
            color: #555;
            font-weight: bold;
        }
        input[type="text"],
        input[type="tel"] {
            width: 100%;
            padding: 10px;
            border: 1px solid #ddd;
            border-radius: 5px;
            font-size: 14px;
        }
        input[type="text"]:focus,
        input[type="tel"]:focus {
            border-color: #3498db;
            outline: none;
        }
        .btn {
            display: inline-block;
            padding: 10px 20px;
            margin: 5px;
            border: none;
            border-radius: 5px;
            cursor: pointer;
            text-decoration: none;
            font-size: 14px;
            transition: background 0.3s;
        }
        .btn-guardar {
            background-color: #27ae60;
            color: white;
        }
        .btn-guardar:hover {
            background-color: #219a52;
        }
        .btn-cancelar {
            background-color: #95a5a6;
            color: white;
        }
        .btn-cancelar:hover {
            background-color: #7f8c8d;
        }
        .botones {
            text-align: center;
            margin-top: 20px;
        }
        .nota {
            font-size: 12px;
            color: #888;
            margin-top: 5px;
        }
    </style>
</head>
<body>
    <div class="container">
        <h1>Sistema de Gestión de Clientes</h1>
        <h2>Agregar Nuevo Cliente</h2>
        
        <form action="guardar_cliente.php" method="POST">
            <div class="form-group">
                <label for="dpi">DPI (Documento de Identificación):</label>
                <input type="text" id="dpi" name="dpi" required maxlength="10" placeholder="Ej: 12345678">
                <p class="nota">Máximo 10 caracteres</p>
            </div>
            
            <div class="form-group">
                <label for="nombre">Nombre Completo:</label>
                <input type="text" id="nombre" name="nombre" required maxlength="50" placeholder="Ej: Juan Pérez">
            </div>
            
            <div class="form-group">
                <label for="direccion">Dirección:</label>
                <input type="text" id="direccion" name="direccion" required maxlength="200" placeholder="Ej: Calle Principal 123">
            </div>
            
            <div class="form-group">
                <label for="telefono">Teléfono:</label>
                <input type="tel" id="telefono" name="telefono" required maxlength="20" placeholder="Ej: 555 123456">
            </div>
            
            <div class="botones">
                <button type="submit" class="btn btn-guardar">Guardar Cliente</button>
                <a href="index.php" class="btn btn-cancelar">Cancelar</a>
            </div>
        </form>
    </div>
</body>
</html>
