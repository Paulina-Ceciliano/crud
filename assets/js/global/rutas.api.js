var RUTAS_API = {
    //endpoint del ruteo web
    USUARIOS: {
        LISTAR: 'usuarios/listar',
        REGISTRAR_USUARIO: 'usuarios/form/crear',
        LOGIN: 'usuarios/login',
        HOME: 'usuarios/home',
        ACTIVAR: 'usuarios/actualizarEstatus',
        ELIMINAR: 'usuarios/eliminarUsuario',
    },
    PAGOS:{
        REGISTRAR_PAGO: 'pagos/registrarPagos'
    },

    ALUMNOS:{
        BUSCAR: 'alumnos/buscar_alumnos',
        REGISTRAR_ALUMNO: 'alumnos/formRegistrar',
        LOGIN: 'alumnos/formLogin',
        LISTAR: 'alumnos/listarAlumnos',
        ACTIVAR: 'alumnos/activar',
        ELIMINAR: 'alumnos/eliminar',
    }
};