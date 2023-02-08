<!doctype html>
<html lang="en">

<head>
    <title>IGM</title>
    <link href="<?= URL::to("assets/bootstrap/css/bootstrap.min.css") ?>" rel="stylesheet" type="text/css"/>
    <link href="<?= URL::to("assets/plugins/sweetalert/sweetalert.css") ?>" rel="stylesheet" type="text/css"/>
</head>
<body data-urlbase="<?= URL::base() ?>">
<div class="container">
    <div class= "card mx-auto" style="width: 500px">
        <div class="card-header text-center bg-dark text-white">
            <h5>Solicitud de registro</h5>
        </div>
        <div class="card-body">
            <div class="btn-group ">
                <a href="<?= URL::base() ?>" >Inicio de sesión</a>
            </div>
            <hr/>
            <h4 class="card-title mb-4"><?= isset($titulo) ? $titulo : "" ?> </h4>
            <form id="formUsuario" action="usuarios/registrar" method="POST">
                <div class="form-group">
                    <label for="nombre">Nombre(s)(*)</label>
                    <input type="text" class="form-control" id="nombre" name="nombre" required="required"/>
                </div>
                <div class="form-group">
                    <label for="apellido">Apellidos (*)</label>
                    <input type="text" class="form-control" id="apellido" name="apellido" required="required"/>
                </div>
                <div class="form-group">
                    <label for="username">Usuario(*)</label>
                    <input type="text" class="form-control" id="username" name="username" required="required"/>
                </div>
                <div class="form-group">
                    <label for="correo">Correo(*)</label>
                    <input type="email" class="form-control" id="correo" name="correo" required="required"/>
                </div>
                <div class="form-group">
                    <label for="password">Contraseña(*)</label>
                    <input type="password" class="form-control" id="password" name="password" required="required"/>
                </div>
                <div class="form-group text-right">
                    <button type="submit" class="btn btn-primary">Enviar</button>
                </div>
            </form>
        </div>
    </div>
</div>
<script src="<?= URL::to("assets/plugins/jquery.js") ?>" type="text/javascript"></script>
<script src="<?= URL::to("assets/bootstrap/js/bootstrap.min.js") ?>" type="text/javascript"></script>
<script src="<?= URL::to("assets/js/global/helperform.js") ?>" type="text/javascript"></script>
<script src="<?= URL::to("assets/js/global/rutas.api.js") ?>" type="text/javascript"></script>
<script src="<?= URL::to("assets/js/global/app.global.js") ?>" type="text/javascript"></script>
<script src="<?= URL::to("assets/plugins/sweetalert/sweetalert.js") ?>" type="text/javascript"></script>
<script src="<?= URL::to("assets/js/modulos/registrar.usuarios.js") ?>" type="text/javascript"></script>
</body>
</html>