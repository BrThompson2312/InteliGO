<!DOCTYPE html>
<html lang="es">
<head>
    <title> InteliGO </title>
    <link rel="stylesheet" type="text/css" href="css/index.css">
    <script src="https://kit.fontawesome.com/58fb14bc94.js" crossorigin="anonymous"></script>
    <script src="https://unpkg.com/ionicons@4.5.10-0/dist/ionicons.js"></script>
    <script>
        window.onload = function() {
            <?php
            if(isset($_GET{"error"})) {
                echo 'alert("error usuario y contraseña")';
            } 
            ?>
        };
    </script>
</head>
<body>
    <main>
        <div class="inteligo-login">
            <img class="logoImg" src="img/logofinal/whiteLogo.png">
            <span></span>
            <span class="login"> LOGIN </span>
        </div>
        <form method="POST" action="login.php">
            <div class="form-group">
                <ion-icon name="person"></ion-icon>
                <label for="user"> Usuario </label>
                <input type="text" name="user" id="user" required placeholder="Ingrese Usuario">
            </div>
            <div class="form-group">
                <ion-icon id="not-seePass" name="eye-off"></ion-icon>
                <ion-icon id="seePass" name="eye" onclick="seeingPassword()"></ion-icon>
                <label for="pass"> Contraseña </label>
                <input type="password" name="pass" id="pass" required placeholder="Ingrese contraseña">
            </div>
            <input type="checkbox"> Recordar usuario y contraseña
            <br>
            <button type="submit">
                <ion-icon name="log-in"></ion-icon>
                <span> INGRESAR </span>
            </button>
        </form>
    </main>
    <script src="js/index.js"></script>
</body>
</html>