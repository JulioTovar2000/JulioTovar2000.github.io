<?php
    require 'abre_sesion.php';

    $usuario_actual = $_SESSION['usuario'];
    if(!(strval($usuario_actual) == 'admin')){
        header('Location: index.php');
        exit;
    }
?>

<!DOCTYPE html>
<html lang="en">
<head>
  <meta charset="UTF-8">
  <meta http-equiv="X-UA-Compatible" content="IE=edge">
  <meta name="viewport" content="width=device-width, initial-scale=1.0">
  <link rel="stylesheet" href="css/style.css">
  <title>Roux Academy - Asistentes</title>
</head>
<body id="page_home">
    <div class="wrapper">
      <?php include 'includes/admin_tools.php'; ?>
      <br>
      <div class="tabla_asistentes">
        <table>
          <thead>
            <tr>
              <th>Nombre</th>
              <th>Compañía</th>
              <th>Email</th>
              <th>Tipo de Solicitud</th>
              <th>Comentario</th>
              <th>Referencia</th>
            </tr>
          </thead>

          <tbody>
              <?php
                require 'conexion_bd.php';

                $consulta = "SELECT * FROM asistentes";
                $registros = mysqli_query($conexion,$consulta);

                if($registros->num_rows>0){
                  while($fila = $registros->fetch_assoc()){
                    echo "<tr><td>" . $fila['nombre'] . "</td>" . "<td>" . $fila['company'] . "</td>" . "<td>" . $fila['email'] . "</td>" . "<td>" . $fila['request'] . "</td>" . "<td>" . $fila['comment'] . "</td>" . "<td>" . $fila['hear'] . "</td><tr>";
                  }
                }
              ?>
          </tbody>
        </table>
      </div>
      <br>

      <?php include 'includes/footer.php'; ?>
    </div>
</body>
</html>