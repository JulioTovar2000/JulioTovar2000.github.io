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
      <form method="POST" action="uploader.php" enctype="multipart/form-data" >
        <fieldset>
            <legend>Registrar artista nuevo</legend>
            <ol>
                <li>
                <input type="text" name="artista" id="myname" autofocus placeholder="Nombre" required>
                </li>
                <li>
                <legend>Descripción del Artista (500 caracteres max)</legend>
                <textarea name="descripcion"></textarea>
                </li>
                <li>
                <input type="file" name="uploadedfile">
                </li>
                
            <input type="submit" name="aceptar" value="Agregar">
            <?php
            if(isset($_POST['aceptar'])){
                $artista = mysqli_real_escape_string($conexion, $_POST['artista']);
                if(existe_artista_bd($artista,$conexion)){
                    echo '<p>¡El artista ya existe!</p>';
                }
            }
            ?>
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