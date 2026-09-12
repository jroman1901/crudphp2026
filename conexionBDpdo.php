<!DOCTYPE html>
<html>
  <head>
    <meta charset="UTF-8">
  </head>
  <body>
    <?php
      try {
      //  $conexion = new PDO("mysql:host=localhost", "root", "1234");
        $conexion = new PDO("mysql:host=127.0.0.1;port=3306", "root", "1234");
        echo "Se ha establecido una conexión con el servidor de bases de datos.";
      } catch (PDOException $e) {
        echo "No se ha podido establecer conexión con el servidor de bases de datos.<br>";
        die ("Error: " . $e->getMessage());
      }
    ?>
  </body>
</html>
