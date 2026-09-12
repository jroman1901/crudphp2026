-- ============================================
-- BASE DE DATOS: BANCO
-- ============================================
-- Archivo para importar en phpMyAdmin
-- Contiene la tabla cliente con datos de ejemplo
-- ============================================

-- Crear la base de datos si no existe
CREATE DATABASE IF NOT EXISTS `banco` 
DEFAULT CHARACTER SET utf8 
COLLATE utf8_spanish2_ci;

-- Seleccionar la base de datos
USE `banco`;

-- ============================================
-- TABLA: CLIENTE
-- ============================================
-- Almacena la información de los clientes del banco
-- ============================================

DROP TABLE IF EXISTS `cliente`;

CREATE TABLE `cliente` (
  `dpi` varchar(10) NOT NULL COMMENT 'Documento de Identificación Personal',
  `nombre` varchar(50) NOT NULL COMMENT 'Nombre completo del cliente',
  `direccion` varchar(200) NOT NULL COMMENT 'Dirección del cliente',
  `telefono` varchar(20) NOT NULL COMMENT 'Teléfono de contacto',
  PRIMARY KEY (`dpi`)
) ENGINE=InnoDB DEFAULT CHARSET=utf8 COLLATE=utf8_spanish2_ci;

-- ============================================
-- DATOS DE EJEMPLO
-- ============================================

INSERT INTO `cliente` (`dpi`, `nombre`, `direccion`, `telefono`) VALUES
('12345678', 'Juan Carlos Pérez', 'Avenida Principal 123, Zona 1', '555 123456'),
('23456789', 'María López García', 'Calle Las Flores 456, Zona 2', '555 234567'),
('34567890', 'Carlos Rodríguez Martínez', 'Boulevard Los Ángeles 789, Zona 3', '555 345678'),
('45678901', 'Ana Sofía Hernández', 'Calle El Sol 321, Zona 4', '555 456789'),
('56789012', 'Pedro Antonio Díaz', 'Avenida La Paz 654, Zona 5', '555 567890'),
('67890123', 'Laura Isabel Morales', 'Calle Las Palmas 987, Zona 6', '555 678901'),
('78901234', 'Roberto Carlos Jiménez', 'Boulevard Central 147, Zona 7', '555 789012');

-- ============================================
-- CONSULTAS ÚTILES
-- ============================================

-- Ver todos los clientes
-- SELECT * FROM cliente;

-- Buscar cliente por DPI
-- SELECT * FROM cliente WHERE dpi = '12345678';

-- Buscar por nombre (búsqueda parcial)
-- SELECT * FROM cliente WHERE nombre LIKE '%Pérez%';

-- Contar total de clientes
-- SELECT COUNT(*) as total FROM cliente;
