<?php require_once 'conexion.php';

ini_set('display_errors','on');

session_start();

$user = $_POST['cedula'];
$pass = $_POST['pass'];

$query = "SELECT * FROM usuario WHERE cedula = '$user'";
$ejQuery = mysqli_query($conn, $query);

if($ejQuery){
    $flgEncontroUsuario=false;
    while($row = mysqli_fetch_assoc($ejQuery)) {
        $flgEncontroUsuario=true;
        if($row['contrasena'] == $pass)  {
            $_SESSION['tipoUsuario'] = $row['rol_usuario'];
            $_SESSION['nombreUsuario']  = $row['nombre_usuario'];
            echo true;
        } else {
            echo 'Campos ingresados incorrectos o usuario no existente';
        }
    }
    if(!$flgEncontroUsuario) {
        echo 'Campos ingresados incorrectos o usuario no existente';
    }
} else {
    echo 'Fallo en el $result';
}

?>