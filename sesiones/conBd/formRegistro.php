<!DOCTYPE html>
<html lang="en">

<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Document</title>
</head>

<body>
    <form action="validar.php" method="post">
        <div>
            <label for="nombre">Nombre</label><br>
            <input type="password" name="nombre" id="nombre" required><br>
            <label for="usuario">Usuario</label><br>
            <input type="text" name="usuario" id="usuario" required><br>
            <label for="clave">Clave</label><br>
            <input type="password" name="clave" id="clave" required></input><br><br>
        </div>
        <button type="submit" name="registrarse">Registrarse</button>
        <br>
    </form>
</body>

</html>