<?php
    require 'abre_sesion.php';

    $usuario_actual = $_SESSION['usuario'];
    if(!(strval($usuario_actual) == 'admin')){
        header('Location: index.php');
        exit;
    }

    if(isset($_POST['aceptar'])){
        $nombre = mysqli_real_escape_string($conexion, $_POST['artista']);
        $descripcion = mysqli_real_escape_string($conexion, $_POST['descripcion']);

        if(!(existe_artista_bd($artista,$conexion))){
            //No existe el artista y por lo tanto se crea uno nuevo con los datos ingresados
            $query = "INSERT INTO artistas VALUES (NULL, '$artista','$descripcion','$target_path_bd')";
            mysqli_query($conexion, $query);
        }
    }
?>

<!DOCTYPE html>
<html lang="en">
<head>
<meta charset="utf-8">
<link rel="stylesheet" href="css/style.css">
<title>Roux Conference</title>
</head>
<body id="page_home">
<div class="wrapper">

    <?php
        include 'includes/admin_tools.php';
    ?>

  <!-- Rotator -->
  <section id="main">
    
  <article id="registrationform">
      <form method="POST" action="modificar.php" enctype="multipart/form-data" >
        <fieldset>
            <legend>Modificar Artista</legend>
            <ol id="mod_artistas">
                <select name="artista_select" id="artist">
                    <!--AQUÍ VAN LAS OPCIONES (ARTISTAS)-->
                </select>
                <script src="mod.js"></script>

                <li>
                <input type="text" name="artista" id="myname" autofocus placeholder="Nombre" required>
                </li>
                <li>
                <legend>Descripción del Artista (500 caracteres max)</legend>
                <textarea name="descripcion" id="desc"></textarea>
                </li>
                <li>
                <input type="file" name="uploadedfile">
                </li>
                
            <input type="submit" name="aceptar" value="Modificar">
        </fieldset>
      </form>
    </article>
    
  </section>
  <!-- maincontent -->
  
  <aside id="sidebar" class="clearfix">
    
  </aside>
  <!-- Sidebar -->
  
  <?php include 'includes/footer.php'; ?>

</div>
</body>
</html>