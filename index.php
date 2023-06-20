<!DOCTYPE html>
<html lang="en">
<head>
    <title> Back_Pocitos </title>
    <link rel="stylesheet" type="text/css" href="css/index.css">
</head>
<body>
    <main>
        <h1> LOGIN </h1>
        <form method="POST" action="login.php">
            <div class="ingreso">
                <label for="user"> Usuario </label>
                <br>
                <input type="text" name="user">
            </div>
            <div class="ingreso">
                <label for="pass"> Contraseña </label>
                <br>
                <input type="password" name="pass">
            </div>
            <input type="checkbox"> Recordar usuario y contraseña 
            <input type="submit" value="INGRESAR">
        </form>
    </main>
</body>
</html>