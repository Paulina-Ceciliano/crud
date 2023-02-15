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
        Este es el home de los administradores
    </div>
</main>

<script>
    const toggleMenu = () => document.body.classList.toggle("open");
</script>
<script src="<?= URL::to("assets/plugins/jquery.js")?>" type="text/javascript"></script>
</body>
</html>
