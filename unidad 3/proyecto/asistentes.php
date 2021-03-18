<?php
    require 'abre_sesion.php';
    require 'conexion_bd.php';
?>

<?php
    //include("conexion_bd.php");
    $asistentes = "SELECT * FROM asistentes";
?>

<!DOCTYPE html>
<html lang="en">
<head>
<meta charset="utf-8">
<link rel="stylesheet" type="text/css" href="css/style.css">
<title>Roux Conference: Asistents</title>
</head>
<body id="page_venue">
<div class="wrapper">

  <?php
  include 'includes/header_in.php';
  ?>

  <!-- Rotator -->
  <section id="main">
      <div class="tabla_de_asistentes">
          <table border="1px" class="tabla_asistentes">
               <thead>
                   <tr>
                       <th colspan="7"> Usuarios registrados </th>
                   </tr>
               </thead>
               <tbody>
                   <tr>
                       <th> Id </th>
                       <th> Name </th>
                       <th> Company </th>
                       <th> Email </th>
                       <th> Request </th>
                       <th> Comment </th>
                       <th> Hear </th>
                   </tr>
                   <tr>
                       <?php $resultado = mysqli_query($conexion, $asistentes);
                             while($row=mysqli_fetch_assoc($resultado)) { ?>
                       <th> <?php echo $row["id"]; ?> </th>
                       <th> <?php echo $row["nombre"]; ?> </th>
                       <th> <?php echo $row["company"]; ?> </th>
                       <th> <?php echo $row["email"]; ?> </th>
                       <th> <?php echo $row["request"]; ?> </th>
                       <th> <?php echo $row["comment"]; ?> </th>
                       <th> <?php echo $row["hear"]; ?> </th>
                       </tr>
                       <?php } mysqli_free_result($resultado); ?>
               </tbody>
           </table>   
      </div>    
  </section>
  <!-- maincontent -->
  
  <?php include 'includes/footer.php' ?>
</div>
</body>
</html>