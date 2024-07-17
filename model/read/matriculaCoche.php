<?php require_once '../conf_page/conexion.php';

$query = "SELECT matricula, marca, modelo FROM coches WHERE activo = 1";
$result = mysqli_query($conn, $query);
$json = array();

if ($result) {
    while($row = mysqli_fetch_assoc($result)){
        $json[] = array (
            'matricula' => $row['matricula'],
            'marca' => $row['marca'],
            'modelo' => $row['modelo']
        );
    }
    echo json_encode($json);
} else {
    echo 'No funciono';
}

?>