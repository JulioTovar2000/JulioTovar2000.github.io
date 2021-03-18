<?php
    require 'abre_sesion.php';
    require 'conexion_bd.php';

    $usuario_actual = $_SESSION['usuario'];
    if(!(strval($usuario_actual) == 'admin')){
        header('Location: index.php');
        exit;
    }

    if(isset($_POST['aceptar'])){
        $nombre = mysqli_real_escape_string($conexion, $_POST['artista_select']);
        
        $query = "DELETE FROM artistas WHERE nombre='$nombre'";
        mysqli_query($conexion, $query);
        header('Location: artists.php');
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
      <form method="POST" action="<?php echo htmlspecialchars($_SERVER['PHP_SELF']); ?>">
        <fieldset>
            <legend>Eliminar Artista</legend>
            <ol id="mod_artistas">
                <select name="artista_select" id="artist">
                    <!--AQUÍ VAN LAS OPCIONES (ARTISTAS)-->
                </select>
                <script src="mod.js"></script>
                
            <input type="submit" name="aceptar" value="Eliminar">
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