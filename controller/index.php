<!DOCTYPE html>
<html lang="es">
<head>
    <title> InteliGO </title>
    <link rel="stylesheet" type="text/css" href="view/css/index.css">
    <link rel="shortcut icon" href="view/img/logofinal/logoIco3.ico">
    <script src="https://kit.fontawesome.com/58fb14bc94.js" crossorigin="anonymous"></script>
    <script src="https://unpkg.com/ionicons@4.5.10-0/dist/ionicons.js"></script>
</head>
<body>
    <main>
        <div class="inteligo-login">
            <img src="view/img/logofinal/blackLogo.png">
        </div>
        <span class="login"> LOGIN </span>
        <form method="POST" action="controller/login.php">
            <div class="form-group">
                <i class="fa-solid fa-id-card"></i>
                <input type="text" name="cedula" id="user" required>
                <label for="cedula"> Cédula </label>
            </div>
            <div class="form-group">
                <ion-icon id="not-seePass" name="eye-off"></ion-icon>
                <ion-icon id="seePass" name="eye" onclick="seeingPassword()"></ion-icon>
                <input type="password" name="pass" id="pass" required>
                <label for="pass"> Contraseña </label>
            </div>
            <button type="submit" id="login-user">
                <ion-icon name="log-in"></ion-icon>
                <span> INGRESAR </span>
            </button>
        </form>
    </main>
    <script src="view/js/index.js"></script>
</body>
</html>