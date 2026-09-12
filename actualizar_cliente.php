<?php
/**
 * ============================================
 * ACCIÓN: ACTUALIZAR CLIENTE (UPDATE)
 * ============================================
 * 
 * Este archivo recibe los datos del formulario de edición
 * y actualiza el registro en la base de datos.
 */

// Incluir conexión
require_once 'conexion.php';

// Verificar que se recibieron los datos por POST
if ($_SERVER['REQUEST_METHOD'] !== 'POST') {
    header("Location: index.php");
    exit;
}

// Obtener y limpiar los datos del formulario
$dpiOriginal = trim($_POST['dpi_original'] ?? '');
$nombre = trim($_POST['nombre'] ?? '');
$direccion = trim($_POST['direccion'] ?? '');
$telefono = trim($_POST['telefono'] ?? '');

// Validar que todos los campos estén llenos
if (empty($dpiOriginal) || empty($nombre) || empty($direccion) || empty($telefono)) {
    header("Location: formulario_editar.php?dpi=" . urlencode($dpiOriginal) . "&mensaje=Todos los campos son obligatorios&tipo=error");
    exit;
}

try {
    // Actualizar el cliente usando Prepared Statement
    $sql = "UPDATE cliente 
            SET nombre = :nombre, direccion = :direccion, telefono = :telefono 
            WHERE dpi = :dpi";
    
    $stmt = $conexion->prepare($sql);
    $resultado = $stmt->execute([
        ':nombre' => $nombre,
        ':direccion' => $direccion,
        ':telefono' => $telefono,
        ':dpi' => $dpiOriginal
    ]);
    
    if ($resultado) {
        header("Location: index.php?mensaje=Cliente actualizado correctamente&tipo=exito");
    } else {
        header("Location: formulario_editar.php?dpi=" . urlencode($dpiOriginal) . "&mensaje=No se pudo actualizar el cliente&tipo=error");
    }
    exit;
    
} catch (PDOException $e) {
    header("Location: formulario_editar.php?dpi=" . urlencode($dpiOriginal) . "&mensaje=Error al actualizar: " . urlencode($e->getMessage()) . "&tipo=error");
    exit;
}
?>
