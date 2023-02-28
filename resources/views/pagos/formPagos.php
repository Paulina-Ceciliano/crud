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
    <link href="https://cdn.jsdelivr.net/npm/select2@4.1.0-rc.0/dist/css/select2.min.css" rel="stylesheet" />
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
        <div class="card-forms">
            <div class="card-header">
                <h2>Mensualidades</h2>
            </div>
            <div>
                <hr/>
                <form id="formPagos" action="pagos/registroPagos" method="POST" autocomplete="off" >
                    <div class="form-group">
                        <select class="js-example-basic-single" id="buscarAlumno" name="buscarAlumno[]"></select>
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
<script src="https://cdn.jsdelivr.net/npm/select2@4.1.0-rc.0/dist/js/select2.min.js"></script>
<script src="<?= URL::to("assets/js/global/helperform.js") ?>" type="text/javascript"></script>
<script src="<?= URL::to("assets/js/global/rutas.api.js") ?>" type="text/javascript"></script>
<script src="<?= URL::to("assets/js/global/app.global.js") ?>" type="text/javascript"></script>
<script src="<?= URL::to("assets/plugins/sweetalert/sweetalert.js") ?>" type="text/javascript"></script>
<script src="<?= URL::to("assets/js/modulos/pagos.registrar.js") ?>" type="text/javascript"></script>
<script src="<?= URL::to("assets/js/modulos/alumnos.buscar.js") ?>" type="text/javascript"></script>
</body>
</html>

