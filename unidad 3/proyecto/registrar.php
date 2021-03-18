<?php
    require 'conexion_bd.php';
    require 'abre_sesion.php';

    $usuario_actual = $_SESSION['usuario'];

    if(!(strval($usuario_actual) == 'admin')){
        header('Location: index.php');
        exit;
    }

    $valido = true;
    if(isset($_POST['aceptar'])){
        $usuario = mysqli_real_escape_string($conexion, $_POST['usuario']);
        $contrasena = mysqli_real_escape_string($conexion, $_POST['contrasena']);
        $contrasena2 = $_POST['contrasena2'];

        if(!(existe_usuario_bd($usuario,$conexion))){
            
            //No existe el usuario y por lo tanto se crea uno nuevo con los datos ingresados
            if($contrasena == $contrasena2){
                $query = "INSERT INTO usuarios VALUES (NULL, '$usuario', md5('$contrasena'))";
                mysqli_query($conexion, $query);
                echo "<script type='text/javascript'>alert('El usuario se ha registrado con éxito.');</script>";
            }
        }
    }
?>

<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta http-equiv="X-UA-Compatible" content="IE=edge">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <link rel="stylesheet" type="text/css" href="css/style.css">
    <title>Roux Academy - Register</title>
</head>
<body id="page_register">
    <div class="wrapper">

    <?php
        include 'includes/admin_tools.php';
    ?>

    <!-- Rotator -->
    <section id="main">
        
    <article id="registrationform">
      <form method="POST" action="<?php echo htmlspecialchars($_SERVER['PHP_SELF']); ?>">
        <fieldset>
            <legend>Registrar usuario nuevo</legend>
            <ol>
                <li>
                <input type="text" name="usuario" id="myname" autofocus placeholder="Usuario" required>
                </li>
                <li>
                <input type="password" name="contrasena" id="companyname" placeholder="Contraseña">
                </li>
                <li>
                <input type="password" name="contrasena2" id="companyname" placeholder="Repita la Contraseña">
                </li>
                
            <input type="submit" name="aceptar" value="Registrar">

            <?php
                if(isset($_POST['aceptar'])){
                    $usuario = mysqli_real_escape_string($conexion, $_POST['usuario']);
                    $contrasena = mysqli_real_escape_string($conexion, $_POST['contrasena']);
                    if($contrasena != $contrasena2){
                        echo '<p>Las contraseñas ingresadas no coinciden.</p>';
                    }
                    if(existe_usuario_bd($usuario,$conexion)){
                        echo '<p>El usuario ingresado ya existe, ingrese otro por favor.</p>';
                    }
                }
            ?>
        </fieldset>
      </form>
    </article>

    </section>
    <!-- maincontent -->
    
    <?php include 'includes/footer.php' ?>
    </div>
</body>
</html>