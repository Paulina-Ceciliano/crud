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
<header>
    <nav>
        <ul>
            <li><a href="#">Inicio</a></li>
            <li><a href="#">Pagos</a></li>
            <li><a href="#">Calificaciones</a></li>
            <li><a href="#">Cerrar sesión</a></li>
        </ul>
    </nav>
</header>
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
