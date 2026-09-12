# CRUD Clientes - Banco (PHP + PDO)

Sistema de gestión de clientes bancarios con operaciones CRUD completas utilizando PHP, PDO y MySQL.

## Descripción

Aplicación web para administrar clientes de un banco que permite crear, consultar, actualizar y eliminar registros. Desarrollada como ejercicio práctico de acceso a bases de datos con PDO (PHP Data Objects).

## Tecnologías

- **PHP 8.x** - Lenguaje de programación del lado del servidor
- **PDO** - Capa de abstracción de bases de datos
- **MySQL** - Sistema de gestión de bases de datos
- **XAMPP** - Servidor local (Apache + MySQL + PHP)
- **HTML5/CSS3** - Frontend con estilos modernos

## Estructura del Proyecto

```
PDO/
├── index.php                 # Página principal - Listado de clientes
├── conexion.php              # Conexión centralizada a la BD
├── formulario_alta.php       # Formulario para crear cliente
├── guardar_cliente.php       # Acción: INSERT en la BD
├── formulario_editar.php     # Formulario para editar cliente
├── actualizar_cliente.php    # Acción: UPDATE en la BD
├── eliminar.php              # Acción: DELETE en la BD
├── banco_mejorado.sql        # Script de creación de la BD
├── listadopdo.php            # Listado simple (versión básica)
├── altaClienteFormulario.php # Alta básica (versión simple)
├── altaClienteAccion.php     # Acción alta básica
└── conexionBDpdo.php         # Prueba de conexión simple
```

## Requisitos Previos

1. **XAMPP** instalado y ejecutándose (Apache + MySQL)
2. Navegador web actualizado
3. Importar la base de datos desde `banco_mejorado.sql`

## Instalación

### 1. Configurar el servidor

Asegúrate de que XAMPP esté ejecutándose:
- Apache en puerto 80
- MySQL en puerto 3306

### 2. Copiar archivos

Copia la carpeta `PDO` a:
```
C:\xampp\htdocs\accesoDB\PDO
```

### 3. Importar la base de datos

1. Abre **phpMyAdmin** → http://localhost/phpmyadmin
2. Pestaña "Importar"
3. Selecciona el archivo `banco_mejorado.sql`
4. Haz clic en "Continuar" o "Importar"

### 4. Configurar conexión (opcional)

Si tu contraseña de MySQL es diferente, edita `conexion.php`:

```php
$usuario = "root";      // Tu usuario de MySQL
$contrasena = "1234";   // Tu contraseña de MySQL
```

## Uso

### Acceder al sistema

Abre tu navegador y ve a:
```
http://localhost/accesoDB/PDO/index.php
```

### Operaciones disponibles

| Operación | Descripción | Archivo |
|-----------|-------------|---------|
| **Listar** | Ver todos los clientes | `index.php` |
| **Crear** | Agregar nuevo cliente | `formulario_alta.php` |
| **Editar** | Modificar datos de cliente | `formulario_editar.php` |
| **Eliminar** | Borrar cliente del sistema | `eliminar.php` |

### Flujo de uso

1. **Listar clientes**: Accede a `index.php` para ver todos los registros
2. **Crear cliente**: Haz clic en "+ Nuevo Cliente" → Completa el formulario → Guardar
3. **Editar cliente**: Haz clic en "Editar" junto al cliente → Modifica datos → Actualizar
4. **Eliminar cliente**: Haz clic en "Eliminar" → Confirma la acción

## Base de Datos

### Tabla `cliente`

| Campo | Tipo | Descripción |
|-------|------|-------------|
| `dpi` | VARCHAR(10) PRIMARY KEY | Documento de Identificación Personal |
| `nombre` | VARCHAR(50) | Nombre completo del cliente |
| `direccion` | VARCHAR(200) | Dirección del cliente |
| `telefono` | VARCHAR(20) | Teléfono de contacto |

### Datos de ejemplo incluidos

El script SQL incluye 7 clientes de prueba para verificar el funcionamiento.

## Arquitectura del Código

### Conexión PDO (`conexion.php`)

```php
// Configuración recomendada
$conexion->setAttribute(PDO::ATTR_ERRMODE, PDO::ERRMODE_EXCEPTION);
$conexion->setAttribute(PDO::ATTR_DEFAULT_FETCH_MODE, PDO::FETCH_ASSOC);
$conexion->setAttribute(PDO::ATTR_EMULATE_PREPARES, false);
```

### Prepared Statements

Todos los queries usan Prepared Statements para prevenir inyección SQL:

```php
// Ejemplo de inserción segura
$stmt = $conexion->prepare("INSERT INTO cliente (dpi, nombre, direccion, telefono) 
                            VALUES (:dpi, :nombre, :direccion, :telefono)");
$stmt->execute([
    ':dpi' => $dpi,
    ':nombre' => $nombre,
    ':direccion' => $direccion,
    ':telefono' => $telefono
]);
```

### Validaciones

- Campos obligatorios validados
- Longitud máxima del DPI (10 caracteres)
- Verificación de DPI duplicado antes de insertar
- Manejo de errores con mensajes amigables

## Características

- Diseño responsivo y moderno
- Mensajes de éxito/error con redirección
- Confirmación antes de eliminar registros
- DPI como clave primaria (no modificable)
- Validación de datos en servidor
- Manejo de excepciones PDO

## Archivos Adicionales

### Versiones simples (para referencia)

- `listadopdo.php` - Listado básico sin estilos
- `altaClienteFormulario.php` - Formulario simple
- `altaClienteAccion.php` - Inserción básica
- `conexionBDpdo.php` - Prueba de conexión

Estos archivos muestran la versión mínima de cada operación.

## Solución de Problemas

### Error de conexión a la BD

Verifica que:
- MySQL esté ejecutándose en XAMPP
- Las credenciales en `conexion.php` sean correctas
- La base de datos `banco` exista

### Error de importación SQL

- Asegúrate de tener phpMyAdmin actualizado
- Intenta importar desde la línea de comandos si falla

### Página en blanco

- Verifica que PHP esté configurado correctamente
- Revisa el log de errores de Apache

## Licencia

Proyecto educativo - Uso libre para fines de aprendizaje.

## Autor

Proyecto de acceso a bases de datos con PDO.
