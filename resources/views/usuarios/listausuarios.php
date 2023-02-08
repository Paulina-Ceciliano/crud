<html>
<head>
    <title>Instituto Gnóstico de México</title>
    <link href="<?= URL::to("assets/bootstrap/css/bootstrap.min.css")?>" rel="stylesheet" type="text/css"/>
</head>
<body  data-urlbase=" <?= URL::base()?>">
<div class="container">
    <div class = "card mt-5">
        <div class="card-header bg-dark text-white">
            <h5>Solicitudes pendientes</h5>
        </div>
        <div class="card-body">
            <div class="btn-group">
                <a href="<?= URL::to("usuarios/form/crear") ?>" class="btn btn-primary">Crear usuario</a>
            </div>
            <hr/>
            <table class="table table-condensed table-hover table-striped" width="100%" id="tablaListaUsuarios" >
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
<script src="<?= URL::to("assets/plugins/jquery.js")?>" type="text/javascript"></script>
<script src="<?= URL::to("assets/bootstrap/js/bootstrap.min.js")?>"  type="text/javascript"></script>
<script src="<?= URL::to("assets/js/global/helperform.js"  )?>" type="text/javascript"></script>
<script src="<?= URL::to("assets/js/global/rutas.api.js"  )?>" type="text/javascript"></script>
<script src="<?= URL::to("assets/js/global/app.global.js")?>" type="text/javascript"></script>
<script src="<?= URL::to("assets/js/modulos/lista.usuarios.js ")?>" type="text/javascript"></script>
</body>
</html>