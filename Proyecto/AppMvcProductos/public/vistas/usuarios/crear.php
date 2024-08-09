<h3>Crear Usuario</h3>
<form action="../usuarios/crear" method="post">
    <div>
        <label for="nombres">Nombre</label><br>
        <input type="text" name="nombres" id="nombres"><br>
        <label for="apellidos">Apellidos</label><br>
        <input type="text" name="apellidos" id="apellidos"><br>
    </div>
    <div>
        <label for="numIdentificacion">numIdentificacion</label><br>
        <input type="text" name="numIdentificacion" id="numIdentificacion"><br>
        <label for="tipoIdentificacion">Tipo de Identificacion</label><br>
        <select name="tipoIdentificacion">
            <option value="1">Cedula de Ciudadania</option>
            <option value="2">Cedula de Extranjeria</option>
            <option value="3">Tarjeta de Identidad</option>
            <option value="4">NIT</option>
        </select>
    </div>
    <div>
        <label for="correo">correo</label><br>
        <input type="email" name="correo" id="correo"><br>
        <label for="usuario">usuario</label><br>
        <input type="text" name="usuario" id="usuario"><br>
    </div>
    <div>
        <label for="clave">clave</label><br>
        <input type="password" name="clave" id="clave"><br>
        <label for="telefono">telefono</label><br>
        <input type="text" name="telefono" id="telefono"><br>
    </div>
    <div>
        <label for="direccion">direccion</label><br>
        <input type="text" name="direccion" id="direccion"><br>

    </div>

    <button type="submit" name="btnCrear" value="registrarse">Registrarse</button>
</form>