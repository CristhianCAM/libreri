<!DOCTYPE html>
<html lang="en">

<head>
    <meta charset="UTF-8">
    <meta http-equiv="X-UA-Compatible" content="IE=edge">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Registro</title>
    <link href="<?php echo base_url() ?>/public/css/bootstrap.min.css" rel="stylesheet">
    <script src="<?php echo base_url() ?>/public/js/bootstrap.bundle.min.js">
    </script>
</head>

<body class="m-0 vh-100 row justify-content-center align-items-center">

    <div class="col-auto p-5 border">
        <form id="form-register" method="post" action="<?php echo base_url() ?>/register">
            <?= csrf_field() ?>
            <?php if(!empty(session()->getFlashdata('fail'))) : ?>
                <div class="alert alert-danger"><?= session()->getFlashdata('fail'); ?></div>
            <?php endif ?>
            <?php if(!empty(session()->getFlashdata('success'))) : ?>
                <div class="alert alert-success"><?= session()->getFlashdata('success'); ?></div>
            <?php endif ?>
            <h2>Registrate</h2>
            <div class="mb-3">
                <label for="name" class="form-label">Nombre</label>
                <input type="text" class="form-control col-20" id="name" name="name" aria-describedby="emailHelp" value="<?= set_value('name'); ?>">
                <span class="text-danger"><?= isset($validation) ? display_error($validation, 'name') : '' ?></span>
            </div>
            <div class="mb-3">
                <label for="email" class="form-label">Correo</label>
                <input type="email" class="form-control col-20" id="email" name="email" aria-describedby="emailHelp" value="<?= set_value('email'); ?>">
                <span class="text-danger"><?= isset($validation) ? display_error($validation, 'email') : '' ?></span>
            </div>
            <div class="mb-3">
                <label for="password" class="form-label">Contraseña</label>
                <input type="password" minlength="4" maxlength="20" class="form-control col-20" id="password"
                    name="password" value="<?= set_value('password'); ?>">
                <span class="text-danger"><?= isset($validation) ? display_error($validation, 'password') : '' ?></span>
            </div>
            <div class="mb-3">
                <label for="password2" class="form-label">Repetir Contraseña</label>
                <input type="password" minlength="4" maxlength="20" class="form-control col-20" id="password2"
                    name="password2" value="<?= set_value('password2'); ?>">
                <span class="text-danger"><?= isset($validation) ? display_error($validation, 'password2') : '' ?></span>
            </div>
            <button id="btn-register" type="submit" class="btn btn-primary m-2">Registrarse</button>
            <div class="mb-3">
                <label for="inicio" class="form-label">Ya cuentas con una cuenta inicia sesion</label>
            </div>
            <a href="<?php echo base_url() ?>/login">Iniciar sesion</a>
        </form>
    </div>


    <script src="<?php echo base_url() ?>/public/js/jquery.min.js"></script>
    <script src="https://cdn.jsdelivr.net/npm/@popperjs/core@2.11.5/dist/umd/popper.min.js"
        integrity="sha384-Xe+8cL9oJa6tN/veChSP7q+mnSPaj5Bcu9mPX5F5xIGE0DVittaqT5lorf0EI7Vk" crossorigin="anonymous">
    </script>
    <script src="<?php echo base_url() ?>/public/js/bootstrap.min.js"></script>
</body>

</html>