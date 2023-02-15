<!doctype html>
<html lang="en">
<head>
    <title>Instituto Gnóstico de México</title>
    <link href="<?= URL::to("assets/plugins/sweetalert/sweetalert.css")?>" rel="stylesheet" type="text/css"/>
</head>
<body  data-urlbase=" <?= URL::base()?>">
<div class="container">
    <div class = "card mx-auto mt-5" style="width: 500px" >
        <div class="card-header">
            <h5>Inicio de sesión </h5>
        </div>
        <div class="card-body">
            <hr/>
            <form id="formLogin" action="usuarios/login" method="POST" >
                <div class="form-group">
                    <label for="correo">Correo(*)</label>
                    <input type="email" class="form-control" id="correo" name="correo" required="required"/>
                </div>
                <div class="form-group">
                    <label for="password">Contraseña(*)</label>
                    <input type="password" class="form-control" id="password" name="password" required="required"/>
                </div>
                <div class="form-group  mt-3">
                    <button type="submit" class="btn btn-primary">Entrar</button>
                </div>
            </form>
            <div>
                <label>¿No tienes una cuenta? Realiza tu solicitud de registro <a href=" <?= URL::to("/usuarios/form/crear")?> ">aquí</a> </label>
            </div>
        </div>
    </div>
</div>
<script src="<?= URL::to("assets/plugins/jquery.js")?>" type="text/javascript"></script>
<script src="<?= URL::to("assets/js/global/helperform.js"  )?>" type="text/javascript"></script>
<script src="<?= URL::to("assets/js/global/rutas.api.js"  )?>" type="text/javascript"></script>
<script src="<?= URL::to("assets/js/global/app.global.js")?>" type="text/javascript"></script>
<script src="<?= URL::to("assets/js/modulos/login.usuarios.js")?>" type="text/javascript"></script>
<script src="<?= URL::to("assets/plugins/sweetalert/sweetalert.js")?>" type="text/javascript"></script>
</body>
</html>