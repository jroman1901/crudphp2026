<?php
/**
 * ============================================
 * ACCIÓN: ELIMINAR CLIENTE (DELETE)
 * ============================================
 * 
 * Este archivo recibe el DPI del cliente a eliminar
 * y lo elimina de la base de datos.
 */

// Incluir conexión
require_once 'conexion.php';

// Obtener el DPI del cliente a eliminar
$dpi = $_GET['dpi'] ?? '';

// Verificar que se recibió el DPI
if (empty($dpi)) {
    header("Location: index.php?mensaje=DPI no especificado&tipo=error");
    exit;
}

try {
    // Eliminar el cliente usando Prepared Statement
    $sql = "DELETE FROM cliente WHERE dpi = :dpi";
    $stmt = $conexion->prepare($sql);
    $resultado = $stmt->execute([':dpi' => $dpi]);
    
    if ($resultado) {
        header("Location: index.php?mensaje=Cliente eliminado correctamente&tipo=exito");
    } else {
        header("Location: index.php?mensaje=No se pudo eliminar el cliente&tipo=error");
    }
    exit;
    
} catch (PDOException $e) {
    // Verificar si es error de clave foránea
    if ($e->getCode() == 23000) {
        header("Location: index.php?mensaje=No se puede eliminar: el cliente tiene registros asociados&tipo=error");
    } else {
        header("Location: index.php?mensaje=Error al eliminar: " . urlencode($e->getMessage()) . "&tipo=error");
    }
    exit;
}
?>
