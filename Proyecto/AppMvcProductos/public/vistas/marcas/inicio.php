<h3>Listado de Marcas</h3>
<table>
    <thead>
        <tr>
            <th>ID</th>
            <th>NOMBRE</th>
            <th>DESCRIPCION</th>
            <th><a href="marcas/crear" class="btn btn-success btn-small" title="Crear nueva marca">+</a></th>
        </tr>
    </thead>
    <tbody>
        <?php for ($i = 0; $i < $datos["totalRegistros"]; $i++) : ?>
            <tr>
                <?php foreach ($datos["registros"][$i] as $dato) : ?>
                    <td><?= $dato ?></td>
                <?php endforeach ?>
                <td>
                    <a href="marcas/ver/<?= $datos['registros'][$i]["id"] ?>">Ver</a>
                    <a href="marcas/editar/<?= $datos['registros'][$i]["id"] ?>">Editar</a>
                    <form id="formEliminar" method="post" action="marcas/eliminar/<?= $datos[$i]['id'] ?>">
                        <a href="javascript:eliminar(<?= $datos['registros'][$i]['id'] ?>)">Eliminar</a>
                    </form>
                </td>
            </tr>
        <?php endfor ?>
    </tbody>
</table>