<?php require_once '../conf_page/conexion.php';

ini_set('display_errors','on');

$rut = $_POST['rut_empresa'];
$lista_negra = $_POST['ln_empresa'];
$nombre = $_POST['nombre_empresa'];
$razon_social = $_POST['rs_empresa'];
$direccion = $_POST['direccion_empresa'];
$telefono = $_POST['tel_empresa'];
$contacto = $_POST['contacto_empresa'];
$correo = $_POST['correo_empresa'];

if ($cod == NULL || $rut == NULL || $lista_negra == NULL || $nombre == NULL || $razon_social == NULL || $direccion == NULL || $telefono == NULL || $contacto == NULL){
    echo 'Error, formulario incompleto';
} else if (strlen($rut) == 9 && strlen($telefono) == 9){
    $query_empresa = "INSERT INTO empresa VALUES (cod_cliente, '$rut','$razon_social','$nombre','$correo')";
    $query_cliente = "INSERT INTO cliente VALUES (cod_cliente, '$lista_negra','$direccion')";
    $query_telefono = "INSERT INTO telefono_cliente VALUES (cod_cliente, '$telefono')";

    $result_empresa = mysqli_query($conn, $query_empresa);
    $result_cliente = mysqli_query($conn, $query_cliente);
    $result_telefono = mysqli_query($conn, $query_telefono);

    if ($result_empresa && $result_cliente && $result_telefono){
        echo 1;
    } else {
        echo 0;
    }

} else {
    echo 'Error';
}

?>