<!doctype html>
<html lang="en">
<head>
    <title>IGM</title>
    <script src="https://cdn.jsdelivr.net/npm/sweetalert2@11"></script>
</head>
<body data-urlbase="<?= URL::base() ?>">
<nav>
    <ul>
        <li><a href="<?= URL::to('alumnos/login') ?>">Iniciar sesión</a></li>
    </ul>
</nav>
<div class="container">
    <div>
        <div>
            <h2>Solicitud de registro</h2>
        </div>
        <div>
            <div>
                <p>
                    ¿Ya tienes una cuenta? Inicia sesión <a href="<?= URL::to('alumnos/login') ?>" >Aquí</a>
                </p>
            </div>
            <hr/>
            <h3>Datos del Alumno: </h3>
            <form id="formAlumnos" action="alumnos/registrar" method="POST">
                <div class="form-group">
                    <label for="nombre">Nombre(s)(*)</label>
                    <input type="text" class="form-control" id="nombre" name="nombre" required="required"/>
                </div>
                <div class="form-group">
                    <label for="apellido">Apellidos (*)</label>
                    <input type="text" class="form-control" id="apellido" name="apellido" required="required"/>
                </div>
                <div class="form-group">
                    <label for="matricula">Matrícula (*)</label>
                    <input type="text" class="form-control" id="matricula" name="matricula" required="required"/>
                </div>
                <div class="form-group">
                    <label for="correo">Correo(*)</label>
                    <input type="email" class="form-control" id="correo" name="correo" required="required"/>
                </div>
                <div class="form-group">
                    <label for="password">Contraseña(*)</label>
                    <input type="password" class="form-control" id="password" name="password" required="required"/>
                </div>
                <div class="form-group mt-3">
                    <button type="submit">Enviar Solicitud</button>
                </div>
            </form>
        </div>
    </div>
</div>
<script src="<?= URL::to("assets/plugins/jquery.js") ?>" type="text/javascript"></script>
<script src="<?= URL::to("assets/js/global/helperform.js") ?>" type="text/javascript"></script>
<script src="<?= URL::to("assets/js/global/rutas.api.js") ?>" type="text/javascript"></script>
<script src="<?= URL::to("assets/js/global/app.global.js") ?>" type="text/javascript"></script>
<script src="<?= URL::to("assets/js/modulos/alumnos/registro.alumnos.js") ?>" type="text/javascript"></script>
</body>
</html>