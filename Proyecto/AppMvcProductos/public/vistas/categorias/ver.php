<h1>Vista de Categorias</h1>
<a href="../../categorias">Volver</a>

<form action="../../categorias/eliminar/<?= $datos["id"] ?>" method="post">
    <label for="id">id</label><br>
    <input type="text" name="id" id="id" value="<?= $datos["id"] ?>" disabled><br>
    <label for="nombre">Nombre</label><br>
    <input type="text" name="nombre" id="nombre" value="<?= $datos["nombre"] ?>" disabled><br>
    <label for="descripcion">Descripcion</label><br>
    <textarea name="descripcion" id="descripcion" rows="5" cols="20" readonly>
        <?= $datos["descripcion"] ?>
        </textarea><br>
    <button type="submit">Eliminar</button>
</form>