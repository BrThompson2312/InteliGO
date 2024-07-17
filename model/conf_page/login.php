<?php require_once 'conexion.php'; 

session_start();

$user = $data['cedula'];
$pass = $data['pass'];

$query = "SELECT * FROM view_usuario WHERE cedula = '$user' AND contrasena = '$pass' AND activo = 1";

$result = mysqli_query($conn, $query);

if ($result->num_rows == 1) {
    while ($row = mysqli_fetch_assoc($result)){
        $_SESSION['tipoUsuario'] = $row['rol_usuario'];
        $_SESSION['nombreUsuario'] = $row['nombre_usuario'];
        echo true;
    }
} else {
    echo false;
}

?>