<!DOCTYPE html>
<html lang="en">

<head>
    <meta charset="UTF-8">
    <meta http-equiv="X-UA-Compatible" content="IE=edge">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Iniciar Sesiòn</title>
    <link href="https://cdn.jsdelivr.net/npm/bootstrap@5.2.0/dist/css/bootstrap.min.css" rel="stylesheet"
        integrity="sha384-gH2yIJqKdNHPEq0n4Mqa/HGKIhSkIHeL5AyhkYV8i59U5AR6csBvApHHNl/vI1Bx" crossorigin="anonymous">
    <script src="https://cdn.jsdelivr.net/npm/bootstrap@5.2.0/dist/js/bootstrap.bundle.min.js"
        integrity="sha384-A3rJD856KowSb7dwlZdYEkO39Gagi7vIsF0jrRAoQmDKKtQBHUuLZ9AsSv4jD4Xa" crossorigin="anonymous">
    </script>
    </script>
</head>

<body class="m-0 vh-100 row justify-content-center align-items-center">

    <div class="col-auto p-5 border">
        <form action="<?php echo base_url('/check') ?>" method="post">
            <?= csrf_field(); ?>
            <?php if(!empty(session()->getFlashdata('fail'))) : ?>
                <div class="alert alert-danger"><?= session()->getFlashdata('fail'); ?></div>
            <?php endif ?>
            <h2>Iniciar sesiòn</h2>
            <div class="mb-3 col-20">
                <label for="email" class="form-label">Correo</label>
                <input type="text" class="form-control" id="email" name="email" aria-describedby="emailHelp" value="<?= set_value('email'); ?>">
                <span class="text-danger"><?= isset($validation) ? display_error($validation, 'email') : '' ?></span>
            </div>
            <div class="mb-3 col-20">
                <label for="password" class="form-label">Contraseña</label>
                <input type="password" class="form-control" id="password" name="password" value="<?= set_value('password'); ?>">
                <span class="text-danger"><?= isset($validation) ? display_error($validation, 'password') : '' ?></span>
            </div>
            <button type="submit" class="btn btn-primary m-2">Iniciar sesion</button>
            <a href="<?php echo base_url() ?>/register">Registrarse</a>
        </form>
    </div>



    <script src="https://cdn.jsdelivr.net/npm/@popperjs/core@2.11.5/dist/umd/popper.min.js"
        integrity="sha384-Xe+8cL9oJa6tN/veChSP7q+mnSPaj5Bcu9mPX5F5xIGE0DVittaqT5lorf0EI7Vk" crossorigin="anonymous">
    </script>
    <script src="https://cdn.jsdelivr.net/npm/bootstrap@5.2.0/dist/js/bootstrap.min.js"
        integrity="sha384-ODmDIVzN+pFdexxHEHFBQH3/9/vQ9uori45z4JjnFsRydbmQbmL5t1tQ0culUzyK" crossorigin="anonymous">
    </script>
</body>

</html>