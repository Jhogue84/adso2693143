<!DOCTYPE html>
<html lang="en">

<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=f, initial-scale=1.0">
    <title>Document</title>
</head>

<body>
    <form action="validar.php" method="post">

        <div>
            <label for="usuario">Usuario</label><br>
            <input type="text" name="usuario" id="usuario" required><br>
            <label for="clave">Clave</label><br>
            <input type="password" name="clave" id="clave" required></input><br><br>
        </div>

        <button type="submit" name="iniciarSesion">Iniciar Sesion</button>
        <br>
        <a href="formRegistro.php">Registrarse</a>
    </form>
</body>

</html>