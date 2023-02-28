<!doctype html>
<html lang="en">
<head>
    <title>IGM</title>
    <link href="<?= URL::to("assets/plugins/sweetalert/sweetalert.css") ?>" rel="stylesheet" type="text/css"/>
</head>
<style>
    .table {
        border: #0d0d0e 1px;
        border-collapse: collapse;
    }
</style>
<body data-urlbase="<?= URL::base() ?>">
<nav>
    <ul>
        <li><a href="<?= URL::to("usuarios/home") ?>">Inicio</a></li>
        <li><a href="<?= URL::to("pagos/form/pagos") ?>">Pagos</a></li>
        <li><a href="<?= URL::to("") ?>"">Calificaciones</a></li>
        <li><a href="<?= URL::to("cerrarSesion") ?>"">Cerrar sesión</a></li>
    </ul>
</nav>
<main>
    <div class="contenedor-principal">
        <div>
            <div>
                <h1>Solicitudes</h1>
            </div>
            <div>
                <hr/>
                <h2> Lista de usuarios en espera</h2>
                <table class="table" id="tablaListaUsuarios">
                    <thead class="">
                    <tr>
                        <th>Nombre</th>
                        <th>Apellido</th>
                        <th>Correo</th>
                        <th>Fecha</th>
                        <th>Estatus</th>
                        <th>Acciones</th>
                    </tr>
                    </thead>
                    <tbody>
                    <tr>
                        <td colspan="6">Consultando...</td>
                    </tr>
                    </tbody>
                </table>
                <div class="btn-group">
                    <a href="crearusuario"></a>
                    <a href="<?= URL::to("usuarios/form/crear") ?>" class="btn btn-primary">Crear usuario</a>
                </div>
            </div>
        </div>
    </div>
</main>

<script src="<?= URL::to("assets/plugins/jquery.js") ?>" type="text/javascript"></script>
<script src="<?= URL::to("assets/js/global/helperform.js") ?>" type="text/javascript"></script>
<script src="<?= URL::to("assets/js/global/rutas.api.js") ?>" type="text/javascript"></script>
<script src="<?= URL::to("assets/js/global/app.global.js") ?>" type="text/javascript"></script>
<script src="<?= URL::to("assets/plugins/sweetalert/sweetalert.js") ?>" type="text/javascript"></script>
<script src="<?= URL::to("assets/js/modulos/lista.usuarios.js") ?>" type="text/javascript"></script>
</body>
</html>