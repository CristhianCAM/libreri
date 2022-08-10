<?=$cabecera?>
<div class="container">
    <table class="table table-ligth">
        <thead class="thead-light">
            <tr>
                <th>#</th>
                <th>Titulo</th>
                <th>Autor</th>
                <th>Descripcion</th>
                <th>Imagen</th>
                <th>Reservar</th>
            </tr>
        </thead>
        <tbody>
            <?php foreach($libros as $libro): ?>
            <tr>
                <td><?= $libro['id_libro']; ?></td>
                <td><?= $libro['titulo']; ?></td>
                <td><?= $libro['autor']; ?></td>
                <td><?= $libro['descripcion']; ?></td>
                <td>
                    <img class="img-thumbanail" src="public/Images/<?= $libro['imagen']; ?>" width="100" alt="">
                </td>
                <td><a href="<?=base_url('/reservar/'.$libro['id_libro'])?>" class="btn btn-primary"><i class="bi bi-file-earmark-zip-fill"></i></a></td>
            </tr>
            <?php endforeach; ?>
        </tbody>
    </table>
</div>
<?=$pie?>