<?php require_once '../conf_page/conexion.php'; ini_set('display_errors', 'on');

$query = 
'SELECT c.nombre as chofer_nombre, co.matricula, c.cedula
from chofer c 
join maneja m on m.cedula = c.cedula
join coches co on co.matricula = m.matricula
join tel_chofer t on t.cedula = c.cedula';

$result = mysqli_query($conn, $query);
$json = array();

if ($result) {
    while ($row = mysqli_fetch_assoc($result)){
        $json[] = array(
            'col1' => $row['cedula'],
            'col2' => $row['chofer_nombre'],
            'col3' => $row['matricula'],
        );
    }
    echo json_encode($json);
} else {
    echo false;
}

?>