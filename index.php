<!DOCTYPE html>
<html lang="es">
<head>
    <title> InteliGO </title>
    <link rel="stylesheet" type="text/css" href="css/index.css">
</head>
<body>
    <main>
        <div class="inteligo-login">
            <h1 class="inteligo"> INTELI<span>GO</span></h1>
            <span></span>
            <span class="login"> LOGIN </span>
        </div>
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
</body>
</html>