<?php
/**
 * ============================================
 * ARCHIVO DE CONEXIÓN A BASE DE DATOS CON PDO
 * ============================================
 * 
 * Este archivo establece la conexión a MySQL usando PDO.
 * PDO (PHP Data Objects) es la forma recomendada de
 * conectarse a bases de datos en PHP.
 */

// Parámetros de conexión
$servidor = "127.0.0.1";    // Dirección del servidor (localhost)
$puerto = "3306";           // Puerto de MySQL
$baseDatos = "banco";       // Nombre de la base de datos
$usuario = "root";          // Usuario de MySQL
$contrasena = "1234";       // Contraseña de MySQL
$charset = "utf8";          // Codificación de caracteres

try {
    // Crear conexión PDO
    $dsn = "mysql:host=$servidor;port=$puerto;dbname=$baseDatos;charset=$charset";
    $conexion = new PDO($dsn, $usuario, $contrasena);
    
    // Configurar modo de error: lanzar excepciones
    $conexion->setAttribute(PDO::ATTR_ERRMODE, PDO::ERRMODE_EXCEPTION);
    
    // Configurar modo de.fetch: devolver arrays asociativos
    $conexion->setAttribute(PDO::ATTR_DEFAULT_FETCH_MODE, PDO::FETCH_ASSOC);
    
    // Desactivar emulación de prepares (usar prepares nativos)
    $conexion->setAttribute(PDO::ATTR_EMULATE_PREPARES, false);
    
} catch (PDOException $e) {
    // Si hay error, mostrar mensaje y detener ejecución
    die("Error de conexión: " . $e->getMessage());
}
?>
