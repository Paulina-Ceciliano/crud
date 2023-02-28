<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8" />
    <meta http-equiv="X-UA-Compatible" content="IE=edge" />
    <meta name="viewport" content="width=device-width, initial-scale=1.0" />
    <title>IGM</title>
    <link href="<?= URL::to("assets/css/sidebar.css") ?>" rel="stylesheet" type="text/css"/>
    <link href="<?= URL::to("assets/css/body.css") ?>" rel="stylesheet" type="text/css"/>
    <link rel="preconnect" href="https://fonts.googleapis.com">
    <link rel="preconnect" href="https://fonts.gstatic.com" crossorigin>
    <link href="https://fonts.googleapis.com/css2?family=Roboto:wght@300;400;500&display=swap"
          rel="stylesheet">
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
            <div class="card-body">
                <hr/>
                <form id="formPagos" action="usuarios/registroPagos" method="POST" autocomplete="off" >
                    <div class="form-group">
                        <label for="cobrador">Cobrador(*)</label>
                        <select>
                            <option>Seleccione...</option>
                            <option>Kevin Diaz</option>
                            <option>Paulina Ceciliano </option>
                            <option>Karla Sandoval</option>
                            <option>Ehtan Esquivel</option>
                        </select>
                    </div>
                    <div class="form-group">
                        <label for="alumno">Alumno (*)</label>
                        <input type="text" class="form-control" id="alumno" name="alumno" required="required"/>
                        <button type="submit" name="buscarAlumno" id="buscarAlumno" >Buscar Alumno</button>
                    </div>
                    <div class="form-group">
                        <label for="concepto">Concepto (*)</label>
                        <input type="text" class="form-control" id="concepto" name="concepto" required="required"/>
                    </div>
                    <div class="form-group">
                        <label for="atraso">Atraso (*)</label>
                        <select>
                            <option>Seleccione...</option>
                            <option>0%</option>
                            <option>5%</option>
                            <option>10%</option>
                            <option>15%</option>
                            <option>20%</option>
                        </select>
                    </div>
                    <div class="form-group">
                        <label for="monto">Monto a pagar(*)</label>
                        <input type="number" class="form-control" id="monto" name="monto" disabled/>
                    </div>
                    <div class="form-group">
                        <label for="fecha">Fecha (*)</label>
                        <input type="date" class="form-control" id="fecha" name="fecha" required="required"/>
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
<script src="<?= URL::to("assets/plugins/jquery.js")?>" type="text/javascript"></script>
<script src="<?= URL::to("assets/bootstrap/js/bootstrap.min.js")?>"  type="text/javascript"></script>
</body>
</html>
