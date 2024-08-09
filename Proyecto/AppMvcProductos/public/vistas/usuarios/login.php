<h3>Iniciar sesion</h3>

<form action="../usuarios/login" method="post">
    <div>
        <label for="usuario">Usuario</label><br>
        <input type="text" name="usuario" id="usuario"><br>
        <label for="clave">Clave</label><br>
        <input type="password" name="clave" id="clave"></input><br><br>
    </div>

    <button type="submit">Iniciar Sesion</button>
    <a href="crear">Registrarse</a><br><br>
</form>

<div>
    <?= isset($datos["mensaje"]) ? $datos["mensaje"] : "" ?>
</div>