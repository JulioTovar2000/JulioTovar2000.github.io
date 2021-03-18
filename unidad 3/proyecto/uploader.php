<?php
    require 'conexion_bd.php';

    $target_path = "images/nuevos_artistas/";
    $target_path = $target_path . basename( $_FILES['uploadedfile']['name']);
    $target_path_bd = "juliotovarportafolioweb.me/unidad 3/proyecto/" . $target_path;

    if(isset($_POST['aceptar'])){
        $artista = mysqli_real_escape_string($conexion, $_POST['artista']);
        $descripcion = mysqli_real_escape_string($conexion, $_POST['descripcion']);

        if(!(existe_artista_bd($artista,$conexion))){
            //No existe el artista y por lo tanto se crea uno nuevo con los datos ingresados
            $query = "INSERT INTO artistas VALUES (NULL, '$artista','$descripcion','$target_path_bd')";
            mysqli_query($conexion, $query);
            header('Location: artists.php');
        }
    }

    $carpetaImagenes = "joserdz.me/Unidad III/proyecto/images/nuevos_artistas/";

    if (!is_writable($carpetaImagenes)) {
        chmod($carpetaImagenes, 0777,true);
    }

    
    if(move_uploaded_file($_FILES['uploadedfile']['tmp_name'], $target_path)) {
        header('Location: artists.php');
    }
?>