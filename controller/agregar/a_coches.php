<?php
    ini_set('display_errors', 'on');

    require_once '../conexion.php';

    $marca = $_POST['marca-coches'];
    $modelo = $_POST['modelo-coches'];
    $matricula = $_POST['matricula-coches'];
    $año = $_POST['año-coches'];

    if ($marca == NULL || $modelo == NULL || $matricula == NULL || $año == NULL) {
        echo 'Debe rellenar todo el formulario';
    } else {
        $query = "INSERT INTO coches VALUES ('$matricula', '$modelo','$marca','$año')";
        $result = mysqli_query($conn, $query);
        if (!$result) {
            echo 'Fallo';
        } else {
            echo 'Formulario rellenado con éxito';
        }
    }
?>