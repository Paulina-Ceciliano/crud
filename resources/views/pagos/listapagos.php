<!doctype html>
<html lang="en">

<head>
    <title>IGM</title>
</head>
<body data-urlbase="<?= URL::base() ?>">
<nav>
    <ul>
        <li><a href="#">Inicio</a></li>
        <li><a href="#">Pagos</a></li>
        <li><a href="#">Calificaciones</a></li>
        <li><a href="#">Cerrar sesión</a></li>
    </ul>
</nav>
<main>
    <div class="contenedor-principal">
        <div class="card mt-5">
            <div class="card-header">
                <h5>Lista de pagos realizados</h5>
            </div>
            <div class="card-body mt-5">
                <hr/>
                <table class="table" id="tablaListaPagos">
                    <thead>
                    <tr>
                        <th>Alumno</th>
                        <th>Concepto</th>
                        <th>Atraso</th>
                        <th>Fecha</th>
                        <th>Monto</th>
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
</main>

<script src="<?= URL::to("assets/plugins/jquery.js") ?>" type="text/javascript"></script>
<script src="<?= URL::to("assets/js/global/helperform.js") ?>" type="text/javascript"></script>
<script src="<?= URL::to("assets/js/global/rutas.api.js") ?>" type="text/javascript"></script>
<script src="<?= URL::to("assets/js/global/app.global.js") ?>" type="text/javascript"></script>
<script src="<?= URL::to("assets/js/modulos/lista.pagos.js") ?>" type="text/javascript"></script>
</body>
</html>