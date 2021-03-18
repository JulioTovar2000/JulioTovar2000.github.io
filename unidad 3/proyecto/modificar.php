<?php
    require 'conexion_bd.php';

    $target_path = "images/nuevos_artistas/";
    $target_path = $target_path . basename( $_FILES['uploadedfile']['name']);
    $target_path_bd = "juliotovarportafolioweb.me/unidad 3/proyecto/" . $target_path;

    if(isset($_POST['aceptar'])){
        $cual_artista = mysqli_real_escape_string($conexion, $_POST['artista_select']);
        $artista = mysqli_real_escape_string($conexion, $_POST['artista']);
        $descripcion = mysqli_real_escape_string($conexion, $_POST['descripcion']);

        $query = "UPDATE artistas SET nombre='$artista', descripcion='$descripcion', img='$target_path_bd' WHERE nombre='$cual_artista'";
        mysqli_query($conexion, $query);
        header('Location: artists.php');
    }

    
    if(move_uploaded_file($_FILES['uploadedfile']['tmp_name'], $target_path)) {
        header('Location: artists.php');
    }
?>