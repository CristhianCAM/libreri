<?=$cabecera?>

<div class="card mx-5 my-5  border border-0">
    <div class="card-body mx-2 my-2 px-2 py-2 d-flex justify-content-center">
        <!-- <p class="card-text"> -->

        <form action="<?=base_url('/save') ?>" method="post" enctype="multipart/form-data" class="col-md-6">
            <h5 class="card-title">Crear un libro</h5>
            <div class="form-group my-3">
                <label for="titulo">Titulo</label>
                <input type="text" id="titulo" name="titulo" class="form-control">
            </div>
            <div class="form-group my-3">
                <label for="autor">autor</label>
                <input type="text" id="autor" name="autor" class="form-control">
            </div>
            <div class="form-group my-3">
                <label for="descripcion">descripcion</label>
                <input type="textarea" id="descripcion" name="descripcion" class="form-control">
            </div>
            <div class="form-group my-3">
                <label for="imagen">Imagen</label>
                <br>
                <input type="file" id="imagen" name="imagen" class="form-control-file">
            </div>
            <button class="btn btn-success" type="submit">Guardar</button>
        </form>
        <!-- </p> -->
    </div>
</div>

<?=$pie?>