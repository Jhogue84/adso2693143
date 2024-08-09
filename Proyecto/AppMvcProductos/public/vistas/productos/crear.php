<h3>Crear producto</h3>
<form action="../productos" method="post" enctype="multipart/form-data">
    <div class="row">
        <div class="col-4">
            <label for="idMarca">Marca</label><br>
            <select name="idMarca">
                <?php if (count($datos[1]['datosMarcas']) > 0) : ?>
                <?php for ($i = 0; $i < count($datos[1]['datosMarcas']); $i++) : ?>
                <option value="<?= $datos[1]['datosMarcas'][$i]["id"] ?>"><?= $datos[1]['datosMarcas'][$i]["nombre"] ?>
                </option>
                <?php endfor ?>
                <?php else : ?>
                <option value="0">No hay registros de categorias</option>
                <?php endif ?>
            </select>
        </div>
        <div class="col-4">
            <label for="idCategoria">Categoria</label><br>
            <select name="idCategoria">
                <?php if (count($datos[0]['datosCategorias']) > 0) : ?>
                <?php for ($i = 0; $i < count($datos[0]['datosCategorias']); $i++) : ?>
                <option value="<?= $datos[0]['datosCategorias'][$i]["id"] ?>">
                    <?= $datos[0]['datosCategorias'][$i]["nombre"] ?></option>
                <?php endfor ?>
                <?php else : ?>
                <option value="0">No hay registros de categorias</option>
                <?php endif ?>
            </select>
        </div>
    </div>
    <div class="row">
        <div class="col-4">
            <label for="codigo">Codigo</label><br>
            <input type="text" name="codigo" id="codigo" class="form-control" required>
        </div>
        <div class="col-4">
            <label for="nombre">Nombre</label><br>
            <input type="text" name="nombre" id="nombre" class="form-control" required>
        </div>
    </div>
    <div class="row">
        <div class="col-4">
            <label for="stock">Stock</label><br>
            <input type="number" name="stock" id="stock" class="form-control" required>
        </div>
        <div class="col-4">
            <label for="vrUnitarioVenta">Valor Unitario de Venta</label><br>
            <input type="number" name="vrUnitarioVenta" id="vrUnitarioVenta" class="form-control" required>
        </div>
    </div>
    <div class="row">
        <div class="col-4">
            <label for="vrUnitarioCompra">Valor Unitario de Compra</label><br>
            <input type="number" name="vrUnitarioCompra" id="stock" class="form-control" required>
        </div>
        <div class="col-4">
            <label for="urlImagen">Imagen del producto</label><br>
            <input type="file" name="urlImagen" id="urlImagen" class="form-control">
        </div>
    </div>
    <div class="row">
        <div class="col-4">
            <label for="descripcion">Descripcion</label><br>
            <textarea name="descripcion" id="descripcion" class="form-control mb-5"></textarea>

        </div>
    </div>
    <button type="submit" class="btn btn-success" name="btnAdicionar">Adicionar</button>
</form>