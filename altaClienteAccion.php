<!DOCTYPE html>
<html>
  <head>
    <meta charset="UTF-8">
    <title>Alta de cliente</title>
  </head>
  <body>
    h2>Base de datos <u>banco</u></h2>
    <?php
      // Conexión a la base de datos
      try {
        $conexion = new PDO("mysql:host=127.0.0.1;port=3306;dbname=banco;charset=utf8", "root", "1234");
        $conexion->setAttribute(PDO::ATTR_ERRMODE, PDO::ERRMODE_EXCEPTION);
      } catch (PDOException $e) {
        die("Error: " . $e->getMessage());
      }

     
        $insercion = $conexion->prepare(
          "INSERT INTO cliente (dpi, nombre, direccion, telefono) VALUES (?, ?, ?, ?)"
        );
        $insercion->execute([
          $_POST['dpi'],
          $_POST['nombre'],
          $_POST['direccion'],
          $_POST['telefono'],
        ]);

        // Redirección (debe ir antes de cualquier echo/salida)
        header("Location: listadopdo.php");
        exit;
      
    
    ?>
  </body>
</html>