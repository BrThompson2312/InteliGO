<?php require_once '../conexion.php';

ini_set('display_errors', 'on');

$query = 'SELECT chofer.ci, coches.matricula, nombre, modelo, marca, año, telefono from maneja
join chofer on chofer.ci = maneja.ci
join coches on coches.matricula = maneja.matricula
join tel_chofer on tel_chofer.ci = chofer.ci';

$result = mysqli_query($conn, $query);
$json = array();

$fecha_ingreso = date("d-m-Y");
$hora_ingreso = date("h:i:s");

if($result){
    while($row = mysqli_fetch_assoc($result)){
        $json[] = array(
            'col1' => $row['ci'],
            'col2' => $row['matricula'],
            'col3' => $row['nombre'],
            'col4' => $row['telefono'],
            'col5' => $row['modelo'],
            'col6' => $row['marca'],
            'col7' => $row['año'],
        );
    }
    echo json_encode($json);
} else {
    echo 'Error';
};

?>