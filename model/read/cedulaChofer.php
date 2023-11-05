<?php require_once '../conf_page/conexion.php'; ini_set('display_errors','on');

$query = "SELECT cedula FROM chofer WHERE activo = 1";
$result = mysqli_query($conn, $query);
$cedula_chofer = array();

if ($result) {
    while ($row = mysqli_fetch_assoc($result)){
        $cedula_chofer[] = array (
            'cedula' => $row['cedula']
        );
    } 
    echo json_encode($cedula_chofer);
}

?>