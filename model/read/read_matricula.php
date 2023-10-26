<?php require_once '../conf_page/conexion.php'; ini_set('display_errors','on');

$query = "SELECT matricula FROM coches";
$result = mysqli_query($conn, $query);
$json = array();

if ($result) {
    while($row = mysqli_fetch_assoc($result)){
        $json[] = array (
            'matricula' => $row['matricula'],
        );
    }
    echo json_encode($json);
} else {
    echo 'No funciono';
}

?>