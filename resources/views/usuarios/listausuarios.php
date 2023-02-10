<!doctype html>
<html lang="en">

<head>
    <title>IGM</title>
    <link href="<?= URL::to("assets/css") ?>" rel="stylesheet" type="text/css"/>
</head>
<body data-urlbase="<?= URL::base() ?>">
<div class="container">
    <div class="card mt-5">
        <div class="card-header text-center bg-dark text-white">
            <h5>Solicitudes</h5>
        </div>
        <div class="card-body mt-5">
            <div class="btn-group">
                <a href="crearusuario"></a>
                <a href="<?= URL::to("usuarios/form/crear") ?>" class="btn btn-primary">Crear usuario</a>
            </div>
            <hr/>
            <h4 class="card-title mb-4"> Lista de usuarios en espera</h4>
            <table class="table table-responsive{-sm|-md|-lg|-xl}" width="100%" id="tablaListaUsuarios">
                <thead class="bg-dark text-white">
                <tr>
                    <th>Nombre</th>
                    <th>Apellido</th>
                    <th>Usuario</th>
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
        </div>
    </div>
</div>
<script src="<?= URL::to("assets/plugins/jquery.js") ?>" type="text/javascript"></script>
<script src="<?= URL::to("assets/js/global/helperform.js") ?>" type="text/javascript"></script>
<script src="<?= URL::to("assets/js/global/rutas.api.js") ?>" type="text/javascript"></script>
<script src="<?= URL::to("assets/js/global/app.global.js") ?>" type="text/javascript"></script>
<script src="<?= URL::to("assets/js/modulos/lista.usuarios.js") ?>" type="text/javascript"></script>
</body>
</html>