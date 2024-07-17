<?php require_once '../conf_page/conexion.php';

$query = "SELECT cedula, nombre, apellido FROM chofer WHERE activo = 1";
$result = mysqli_query($conn, $query);
$cedula_chofer = array();

if ($result) {
    while ($row = mysqli_fetch_assoc($result)){
        $cedula_chofer[] = array (
            'cedula' => $row['cedula'],
            'nombre' => $row['nombre'],
            'apellido' => $row['apellido']
        );
    } 
    echo json_encode($cedula_chofer);
}

?>