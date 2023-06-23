<!DOCTYPE html>
<html lang="es">
<head>
    <title> Back_Pocitos </title>
    <link rel="stylesheet" type="text/css" href="css/index.css">
</head>
<body>
    <main>
        <span class="login"> LOGIN </span>
        <form method="POST" action="login.php">
            <div class="form-group">
                <label for="user"> Usuario </label>
                <input type="text" name="user" id="user">
            </div>
            <div class="form-group">
                <label for="pass"> Contraseña </label>
                <input type="password" name="pass" id="pass">
            </div>
            <input type="checkbox"> Recordar usuario y contraseña
            <br>
            <input type="submit" value="INGRESAR">
        </form>
    </main>
    <!-- <script>
        let user = document.querySelector('#user');
        let pass = document.querySelector('#pass');
        function valores() {
            if (user.value == 'root' && pass.value == 'root') {
                window.location.href = "administrador.php";
            } else {
                user.style.border = "2px solid red";
                pass.style.border = "2px solid red";
                alert('Usuario y/o contraseña incorrectos');
            }
        }
    </script> -->
</body>
</html>