<?php
/**
 * ============================================
 * ACCIÓN: GUARDAR NUEVO CLIENTE (CREATE)
 * ============================================
 * 
 * Este archivo recibe los datos del formulario y los inserta
 * en la base de datos usando Prepared Statements.
 */

// Incluir conexión
require_once 'conexion.php';

// Verificar que se recibieron los datos por POST
if ($_SERVER['REQUEST_METHOD'] !== 'POST') {
    header("Location: formulario_alta.php");
    exit;
}

// Obtener y limpiar los datos del formulario
$dpi = trim($_POST['dpi'] ?? '');
$nombre = trim($_POST['nombre'] ?? '');
$direccion = trim($_POST['direccion'] ?? '');
$telefono = trim($_POST['telefono'] ?? '');

// Validar que todos los campos estén llenos
if (empty($dpi) || empty($nombre) || empty($direccion) || empty($telefono)) {
    header("Location: formulario_alta.php?mensaje=Todos los campos son obligatorios&tipo=error");
    exit;
}

// Validar longitud del DPI
if (strlen($dpi) > 10) {
    header("Location: formulario_alta.php?mensaje=El DPI no puede tener más de 10 caracteres&tipo=error");
    exit;
}

try {
    // Verificar si el DPI ya existe
    $sqlVerificar = "SELECT COUNT(*) FROM cliente WHERE dpi = :dpi";
    $stmtVerificar = $conexion->prepare($sqlVerificar);
    $stmtVerificar->execute([':dpi' => $dpi]);
    
    if ($stmtVerificar->fetchColumn() > 0) {
        header("Location: formulario_alta.php?mensaje=Ya existe un cliente con ese DPI&tipo=error");
        exit;
    }
    
    // Insertar el nuevo cliente usando Prepared Statement
    $sql = "INSERT INTO cliente (dpi, nombre, direccion, telefono) 
            VALUES (:dpi, :nombre, :direccion, :telefono)";
    
    $stmt = $conexion->prepare($sql);
    $stmt->execute([
        ':dpi' => $dpi,
        ':nombre' => $nombre,
        ':direccion' => $direccion,
        ':telefono' => $telefono
    ]);
    
    // Redirigir al listado con mensaje de éxito
    header("Location: index.php?mensaje=Cliente agregado correctamente&tipo=exito");
    exit;
    
} catch (PDOException $e) {
    // En caso de error, mostrar mensaje
    header("Location: formulario_alta.php?mensaje=Error al guardar: " . urlencode($e->getMessage()) . "&tipo=error");
    exit;
}
?>
