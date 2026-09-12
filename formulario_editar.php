<!DOCTYPE html>
<html lang="es">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Editar Cliente - Banco</title>
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
            border-bottom: 2px solid #f39c12;
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
        input:disabled {
            background-color: #f0f0f0;
            cursor: not-allowed;
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
        .btn-actualizar {
            background-color: #f39c12;
            color: white;
        }
        .btn-actualizar:hover {
            background-color: #e67e22;
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
        <h2>Editar Cliente</h2>
        
        <?php
        // Incluir conexión
        require_once 'conexion.php';
        
        // Obtener el DPI de la URL
        $dpi = $_GET['dpi'] ?? '';
        
        if (empty($dpi)) {
            header("Location: index.php?mensaje=DPI no especificado&tipo=error");
            exit;
        }
        
        // Buscar el cliente por DPI
        $sql = "SELECT dpi, nombre, direccion, telefono FROM cliente WHERE dpi = :dpi";
        $stmt = $conexion->prepare($sql);
        $stmt->execute([':dpi' => $dpi]);
        $cliente = $stmt->fetch();
        
        if (!$cliente) {
            header("Location: index.php?mensaje=Cliente no encontrado&tipo=error");
            exit;
        }
        ?>
        
        <form action="actualizar_cliente.php" method="POST">
            <div class="form-group">
                <label for="dpi">DPI (Documento de Identificación):</label>
                <input type="text" id="dpi" name="dpi" value="<?= htmlspecialchars($cliente['dpi']) ?>" disabled>
                <input type="hidden" name="dpi_original" value="<?= htmlspecialchars($cliente['dpi']) ?>">
                <p class="nota">El DPI no se puede modificar</p>
            </div>
            
            <div class="form-group">
                <label for="nombre">Nombre Completo:</label>
                <input type="text" id="nombre" name="nombre" value="<?= htmlspecialchars($cliente['nombre']) ?>" required maxlength="50">
            </div>
            
            <div class="form-group">
                <label for="direccion">Dirección:</label>
                <input type="text" id="direccion" name="direccion" value="<?= htmlspecialchars($cliente['direccion']) ?>" required maxlength="200">
            </div>
            
            <div class="form-group">
                <label for="telefono">Teléfono:</label>
                <input type="tel" id="telefono" name="telefono" value="<?= htmlspecialchars($cliente['telefono']) ?>" required maxlength="20">
            </div>
            
            <div class="botones">
                <button type="submit" class="btn btn-actualizar">Actualizar Cliente</button>
                <a href="index.php" class="btn btn-cancelar">Cancelar</a>
            </div>
        </form>
    </div>
</body>
</html>
