<h1>Editar Categorias</h1>
<form action="../../categorias/ver/<?= $datos["id"] ?>" method="post">
    <label for="id">id</label><br>
    <input type="text" value="<?= $datos["id"] ?>" disabled><br>
    <label for="nombre">Nombre</label><br>
    <input type="text" name="nombre" id="nombre" value="<?= $datos["nombre"] ?>"><br>
    <label for="descripcion">Descripcion</label><br>
    <textarea name="descripcion" id="descripcion" rows="5" cols="20"><?= $datos["descripcion"] ?>
        </textarea><br>
    <input type="hidden" name="id" value="<?= $datos["id"] ?>"><br>
    <button type="submit" <?php echo isset($datos["id"]) ? '' : 'disabled' ?>>Editar</button>
</form>