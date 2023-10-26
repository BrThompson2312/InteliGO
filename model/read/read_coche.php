<?php require_once '../conf_page/conexion.php';

$query = "SELECT matricula, modelo, marca, año FROM coches WHERE activo = 1";
$result = mysqli_query($conn, $query);
$json = array();

if ($result) {
    while ($row = mysqli_fetch_assoc($result)) {
        $json[] = array(
            'col1' => $row['matricula'],
            'col2' => $row['modelo'],
            'col3' => $row['marca'],
            'col4' => $row['año'],
        );
    }
    echo json_encode($json);
} else {
    echo false;
}

?>