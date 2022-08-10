<?=$cabecera?>
<div class="card mx-5 my-5  border border-0">
    <div class="card-body mx-2 my-2 px-2 py-2 d-flex justify-content-center">

        <form action="<?=base_url('/guardarReserva') ?>" method="post" enctype="multipart/form-data" class="col-md-6">
            <input type="hidden" name="id_libro" value="<?=$libro['id_libro']?>">
            <h5 class="card-title">Crear un libro</h5>
            <div class="form-group my-3">
                <label for="email">Email</label>
                <input type="text" id="email" name="email" class="form-control" value="<?=$email  ?>">
            </div>
            <div class="form-group my-3">
                <label for="titulo">Titulo</label>
                <input type="text" id="titulo" name="titulo" class="form-control" value="<?=$libro['titulo']?>">
            </div>
            <div class="form-group my-3">
                <label for="autor">autor</label>
                <input type="text" id="autor" name="autor" class="form-control" value="<?=$libro['autor']?>">
            </div>
            <div class="form-group my-3">
                <label for="descripcion">descripcion</label>
                <input type="textarea" id="descripcion" name="descripcion" class="form-control"
                    value="<?=$libro['descripcion']?>">
            </div>
            <div class="form-group my-3">
                <label for="dias">Dias</label>
                <input type="number" id="dias" name="dias" class="form-control">
            </div>
            <div class="form-group my-3">
                <label for="imagen">Imagen</label>
                <br>
                <img class="img-thumbanail" name="imagen" src="../public/Images/<?= $libro['imagen']; ?>" width="100" alt="">
                <input type="hidden" id="imagen" name="imagen"  value="../public/Images/<?= $libro['imagen']; ?>">
            </div>

            <button class="btn btn-success" type="submit">Reservar</button>
        </form>

    </div>
</div>
<?=$pie?>