<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8" />
    <meta http-equiv="X-UA-Compatible" content="IE=edge" />
    <meta name="viewport" content="width=device-width, initial-scale=1.0" />
    <title>IGM</title>
    <link rel="preconnect" href="https://fonts.googleapis.com">
    <link rel="preconnect" href="https://fonts.gstatic.com" crossorigin>
    <link href="https://fonts.googleapis.com/css2?family=Roboto:wght@300;400;500&display=swap"
          rel="stylesheet">
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
        <div class="card-forms">
            <div class="card-header">
                <h2>Mensualidades</h2>
            </div>
            <div class="card-body">
                <form id="formAlumno" action="buscarlumnos">
                    <div class="form-group">
                        <label for="alumno">Alumno (*)</label>
                        <input type="text" name="iptBuscar" id="iptBuscar"/>
                        <button class="btnBuscar" id="buscarAlumno">Buscar</button>
                    </div>
                </form>
                <hr/>
                <form id="formPagos" action="pagos/registroPagos" method="POST" autocomplete="off" >
                    <div class="form-group">
                        <select name="alumno" id="alumno">
                            <option>...</option>
                        </select>
                    </div>
                    <div class="form-group">
                        <label for="concepto">Concepto (*)</label>
                        <input type="text" class="form-control" id="concepto" name="concepto" required="required"/>
                    </div>
                    <div class="form-group">
                        <label for="monto">Monto (*)</label>
                        <input type="number" class="form-control" id="monto" name="monto" required="required"/>
                    </div>
                    <div class="form-group">
                        <label for="atraso">Atraso (*)</label>
                        <select name="atraso" id="atraso">
                            <option>Seleccione...</option>
                            <option value="1">0%</option>
                            <option>5%</option>
                            <option>10%</option>
                            <option>15%</option>
                            <option>20%</option>
                        </select>
                    </div>
                    <div class="form-group">
                        <label for="monto">Monto a pagar(*)</label>
                        <input type="number" class="form-control" id="monto" name="monto"/>
                    </div>
                    <div class="form-group mt-3">
                        <button type="submit" class="btn btn-primary">Guardar</button>
                    </div>
                </form>
            </div>
        </div>
    </div>
</main>

<script>const toggleMenu = () => document.body.classList.toggle("open");</script>
<script src="<?= URL::to("assets/plugins/jquery.js") ?>" type="text/javascript"></script>
<script src="<?= URL::to("assets/js/global/helperform.js") ?>" type="text/javascript"></script>
<script src="<?= URL::to("assets/js/global/rutas.api.js") ?>" type="text/javascript"></script>
<script src="<?= URL::to("assets/js/global/app.global.js") ?>" type="text/javascript"></script>
<script src="<?= URL::to("assets/plugins/sweetalert/sweetalert.js") ?>" type="text/javascript"></script>
<script src="<?= URL::to("assets/js/modulos/registrar.pagos.js") ?>" type="text/javascript"></script>
</body>
</html>

