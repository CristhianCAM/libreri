<?=$cabecera?>
<div class="container">
    <table class="table table-ligth">
        <thead class="thead-light">
            <tr>
                <th>#</th>
                <th>Titulo</th>
                <th>Email</th>
                <th>Autor</th>
                <th>Descripcion</th>
                <th>Dias</th>
                <th>Quitar Reserva</th>
            </tr>
        </thead>
        <tbody>
            <?php foreach($reservas as $reserva): ?>
            <tr>
                <input type="hidden" name="id_libro" value="<?=$reserva['id_libro']?>">
                <td><?= $reserva['id_reserva']; ?></td>
                <td><?= $reserva['titulo']; ?></td>
                <td><?= $reserva['email']; ?></td>
                <td><?= $reserva['autor']; ?></td>
                <td><?= $reserva['descripcion']; ?></td>
                <td><?= $reserva['Dias']; ?></td>
                <td><a href="<?=base_url('/borrar/'.$reserva['id_reserva'])?>" class="btn btn-danger" type="button"><i class="bi bi-trash3-fill"></i></a></td>
            </tr>
            <?php endforeach; ?>
        </tbody>
    </table>
</div>
<?=$pie?>