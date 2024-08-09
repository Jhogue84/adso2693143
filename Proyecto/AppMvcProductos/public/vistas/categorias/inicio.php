    <h1>Listado de Categorias</h1>
    <table border="1">
        <thead>
            <tr>
                <th>ID</th>
                <th>CATEGORIA</th>
                <th>DESCRIPCION</th>
                <th><a href="categorias/crear">Adicionar</a></th>
            </tr>
        </thead>
        <tbody>

            <br><br>

            <?php if(!isset($datos["mensaje"])) :?>
            <?php for ($i = 0; $i < count($datos['registros']); $i++) : ?>
            <tr>
                <?php foreach ($datos['registros'][$i] as $dato) : ?>
                <td><?= $dato ?></td>
                <?php endforeach ?>
                <td>
                    <a href="categorias/ver/<?= $datos['registros'][$i]["id"] ?>">Ver</a>
                    <a href="categorias/editar/<?= $datos['registros'][$i]["id"] ?>">Editar</a>
                    <form id="formEliminar" method="post" action="categorias/eliminar/<?= $datos[$i]['id'] ?>">
                        <a href="javascript:eliminar(<?= $datos['registros'][$i]['id'] ?>)">Eliminar</a>
                    </form>
                </td>
            </tr>
            <?php endfor ?>
            <?php endif?>
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