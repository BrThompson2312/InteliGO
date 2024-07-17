<?php
    $conn = mysqli_connect('localhost','root','1234','IntelisoftBDD');
    if (!$conn){
        echo 'No conectado';
    }
    ini_set('display_errors', 'on');
    $data = json_decode(file_get_contents("php://input"), true);
?>