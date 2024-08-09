<h1>Listado Productos</h1>
<table class="table">
    <thead>
        <tr>
            <th>ID</th>
            <th>MARCA</th>
            <th>CATEGORIA</th>
            <th>CODIGO</th>
            <th>NOMBRE</th>
            <th>STOCK</th>
            <th>VRU VENTA</th>
            <th>VRU COMPRA</th>
            <th>IMAGEN</th>
            <th>DESCRIPCION</th>
            <?php
            if (isset($_SESSION["usuario"])) : ?>
                <th>
                    <a href="productos/crear" class="btn btn-success" title="Crear Nuevo Productos">+</a>
                </th>
            <?php endif ?>
        </tr>
    </thead>
    <tbody>
        <?php if (count($datos["registros"]) == 0) : ?>
            <tr>
                <td colspan="10">
                    No hay registros.
                </td>
            </tr>
        <?php else : ?>
            <?php for ($i = 0; $i < count($datos["registros"]); $i++) : ?>
                <tr>
                    <?php foreach ($datos["registros"][$i] as $clave => $dato) : ?>
                        <td>
                            <?php echo ($clave === "urlimagen") ? "<img src='img/productos/{$dato}' width='50'>" : $dato; ?>
                        </td>
                    <?php endforeach ?>

                    <?php
                    if (isset($_SESSION["usuario"])) : ?>
                        <td>
                            <a href="ver/<?= $datos["registros"][$i]["id"] ?>" class="btn btn-secondary btn-sm">Ver</a>
                            <a href="editar/<?= $datos["registros"][$i]["id"] ?>" class="btn btn-warning btn-sm">Editar</a>
                            <a href="eliminar/<?= $datos["registros"][$i]["id"] ?>" class="btn btn-danger btn-sm">Eliminar</a>
                        </td>
                    <?php endif ?>

                </tr>
            <?php endfor ?>
        <?php endif ?>
    </tbody>
</table>
<?php
echo "Total registros: " . $datos["totalRegistros"] . "<br>";
echo "Total paginas: " . $datos["totalPaginas"] . "<br>";
echo "Pagina: ";
//ciclo for para imprimir los link de las paginas.
for ($i = 1; $i <= $datos["totalPaginas"]; $i++) : ?>
    <a style="font-size: xx-large;" href="categorias?pagina=<?= $i ?>"><?= $i ?></a>
<?php endfor ?>