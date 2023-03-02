<!doctype html>
<html lang="en">
<head>
    <title>IGM</title>
    <script src="https://cdn.jsdelivr.net/npm/sweetalert2@11"></script>
</head>
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
                <h1>Solicitudes de Alumnos</h1>
            </div>
            <div>
                <a href="crearusuario"></a>
                <a href="<?= URL::to("alumnos/formRegistro") ?>" class="btn btn-primary">Crear usuario</a>
            </div>
            <div>
                <hr/>
                <h2> Lista de usuarios en espera</h2>
                <table class="table" id="tablaListaAlumnos">
                    <thead class="">
                    <tr>
                        <th>Nombre</th>
                        <th>Apellido</th>
                        <th>Matrícula</th>
                        <th>Promoción</th>
                        <th>Correo</th>
                        <th>Fecha</th>
                        <th>Estatus</th>
                        <th>Acciones</th>
                    </tr>
                    </thead>
                    <tbody>
                    <tr>
                        <td colspan="8">Consultando...</td>
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
<script src="<?= URL::to("assets/js/modulos/alumnos/listar.alumnos.js") ?>" type="text/javascript"></script>
</body>
</html>
