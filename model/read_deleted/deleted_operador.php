<?php require_once '../conf_page/conexion.php';

$query = "SELECT * FROM usuario where activo = 0";
$result = mysqli_query($conn, $query);
$json = array();

if ($result) {
    while ($row = mysqli_fetch_assoc($result)){
        $json[] = array(
            'col1' => $row['ci_usuario'],
            'col2' => $row['nombre_usuario'],
            'col3' => $row['fecha_ingreso'],
        );
    }
    echo json_encode($json);
} else {
    echo 'Error';
}

?>