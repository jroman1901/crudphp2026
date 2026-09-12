<!DOCTYPE html>
<html lang="es">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>CRUD Clientes - Banco</title>
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
            max-width: 900px;
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
            border-bottom: 2px solid #3498db;
            padding-bottom: 10px;
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
        .btn-nuevo {
            background-color: #27ae60;
            color: white;
        }
        .btn-nuevo:hover {
            background-color: #219a52;
        }
        .btn-editar {
            background-color: #f39c12;
            color: white;
            padding: 5px 10px;
            font-size: 12px;
        }
        .btn-editar:hover {
            background-color: #e67e22;
        }
        .btn-eliminar {
            background-color: #e74c3c;
            color: white;
            padding: 5px 10px;
            font-size: 12px;
        }
        .btn-eliminar:hover {
            background-color: #c0392b;
        }
        table {
            width: 100%;
            border-collapse: collapse;
            margin-top: 20px;
        }
        th, td {
            padding: 12px;
            text-align: left;
            border-bottom: 1px solid #ddd;
        }
        th {
            background-color: #3498db;
            color: white;
        }
        tr:hover {
            background-color: #f5f5f5;
        }
        .acciones {
            white-space: nowrap;
        }
        .mensaje {
            padding: 10px;
            margin-bottom: 20px;
            border-radius: 5px;
            text-align: center;
        }
        .exito {
            background-color: #d4edda;
            color: #155724;
            border: 1px solid #c3e6cb;
        }
        .error {
            background-color: #f8d7da;
            color: #721c24;
            border: 1px solid #f5c6cb;
        }
        .contador {
            margin-top: 20px;
            color: #666;
            font-style: italic;
        }
    </style>
</head>
<body>
    <div class="container">
        <h1>Sistema de Gestión de Clientes</h1>
        <h2>Base de Datos: banco</h2>
        
        <?php
        // Mostrar mensajes de éxito o error
        if (isset($_GET['mensaje'])) {
            $tipo = $_GET['tipo'] ?? 'exito';
            $clase = ($tipo == 'exito') ? 'exito' : 'error';
            echo "<div class='mensaje $clase'>{$_GET['mensaje']}</div>";
        }
        ?>
        
        <a href="formulario_alta.php" class="btn btn-nuevo">+ Nuevo Cliente</a>
        
        <?php
        // Incluir conexión
        require_once 'conexion.php';
        
        // Consulta para obtener todos los clientes
        $sql = "SELECT dpi, nombre, direccion, telefono FROM cliente ORDER BY nombre";
        $stmt = $conexion->query($sql);
        $clientes = $stmt->fetchAll();
        ?>
        
        <table>
            <thead>
                <tr>
                    <th>DPI</th>
                    <th>Nombre</th>
                    <th>Dirección</th>
                    <th>Teléfono</th>
                    <th>Acciones</th>
                </tr>
            </thead>
            <tbody>
                <?php if (empty($clientes)): ?>
                    <tr>
                        <td colspan="5" style="text-align: center;">No hay clientes registrados</td>
                    </tr>
                <?php else: ?>
                    <?php foreach ($clientes as $cliente): ?>
                        <tr>
                            <td><?= htmlspecialchars($cliente['dpi']) ?></td>
                            <td><?= htmlspecialchars($cliente['nombre']) ?></td>
                            <td><?= htmlspecialchars($cliente['direccion']) ?></td>
                            <td><?= htmlspecialchars($cliente['telefono']) ?></td>
                            <td class="acciones">
                                <a href="formulario_editar.php?dpi=<?= urlencode($cliente['dpi']) ?>" class="btn btn-editar">Editar</a>
                                <a href="eliminar.php?dpi=<?= urlencode($cliente['dpi']) ?>" class="btn btn-eliminar" onclick="return confirm('¿Estás seguro de eliminar este cliente?')">Eliminar</a>
                            </td>
                        </tr>
                    <?php endforeach; ?>
                <?php endif; ?>
            </tbody>
        </table>
        
        <p class="contador">Total de clientes: <?= count($clientes) ?></p>
    </div>
</body>
</html>
