<?php require_once '../conf_page/conexion.php'; ini_set('display_errors', 'on');

$query = 
    'SELECT telefono, nombre, maneja.cedula as cedula, maneja.matricula FROM maneja
    JOIN chofer on chofer.cedula = maneja.cedula
    JOIN coches on coches.matricula = maneja.matricula
    JOIN tel_chofer on tel_chofer.cedula = chofer.cedula
    WHERE chofer.activo = 1';

$result = mysqli_query($conn, $query);
$json   = array();

if($result){
    while($row = mysqli_fetch_assoc($result)){
        $json[] = array(
            'col1' => $row['telefono'],
            'col2' => $row['nombre'],
            'col3' => $row['cedula'],
            'col4' => $row['matricula'],
            'col5' => $row['cedula']
        );
    }
    echo json_encode($json);
} else {
    echo 'Error';
};

?>