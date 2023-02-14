<!doctype html>
<html lang="en">

<head>
    <title>IGM</title>
    <link href="<?= URL::to("assets/css/navbar.css") ?>" rel="stylesheet" type="text/css"/>
    <link href="<?= URL::to("assets/css/body.css") ?>" rel="stylesheet" type="text/css"/>
</head>
<body data-urlbase="<?= URL::base() ?>">

<nav class="navbar">
    <button onclick="toggleMenu()" class="burger"></button>
    <a href="<?= URL::to("/usuarios/home") ?>">
        <button class="button">Inicio</button>
    </a>
    <div class="dropdowns">
        <div class="dropdown">
            <button class="button">
                Pagos
                <img src="<?= URL::to("assets/svg/chevron.svg") ?>" />
            </button>
            <div class="dropdown-menu">
                <button>Inscripciones</button>
                <button>Reinscripciones</button>
                <button>Mensualidades</button>
                <button>Productos</button>
            </div>
        </div>
        <div class="dropdown">
            <button class="button">
                Calificaciones
                <img src="<?= URL::to("assets/svg/chevron.svg") ?>" />
            </button>
            <div class="dropdown-menu">
                <button>Examenes</button>
                <button>Finales</button>
                <button>Parciales</button>
            </div>
        </div>
        <div class="dropdown">
            <button class="button">
                Reportes
                <img src="<?= URL::to("assets/svg/chevron.svg") ?>" />
            </button>
            <div class="dropdown-menu">
                <button>Reporte gráfico</button>
                <button>Reporte en Tablas</button>
            </div>
        </div>
    </div>
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
                        <th>Cobrador</th>
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