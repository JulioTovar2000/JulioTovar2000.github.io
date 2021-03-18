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
    
    <article id="featuredartists">
      <div class="div_registrar">
        <legend>REGISTRAR NUEVO USUARIO</legend>
        <a href="registrar.php">REGISTRAR</a>
        <legend>Modificar Artistas</legend>
        <a href="agregar_artistas.php">AGREGAR</a>
        <br>
        <a href="modificar_artistas.php">MODIFICAR</a>
        <br>
        <a href="eliminar_artista.php">ELIMINAR</a>
      </div>
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