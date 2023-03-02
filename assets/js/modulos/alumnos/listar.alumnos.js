var vista = {
    controles: {
        tbodyListaUsuarios: $('#tablaListaAlumnos tbody'),
        botonActivar : null,
        botonEliminar: null,
    },
    init: function () {
        vista.peticiones.listarUsuarios();
    },
    eventos: function () {},
    callbacks: {
        eventos: {
            accionesBotonActivar: {
                ejecutar: function (element){
                    Swal.fire({
                        title: '¿Desea activar este usuario?',
                        text: "Al activar la cuenta el usuario tendrá acceso al sistema",
                        icon: 'warning',
                        showCancelButton: true,
                        confirmButtonColor: '#3085d6',
                        cancelButtonColor: '#dd3333',
                        confirmButtonText: 'Activar'
                    }).then((result) => {
                        if (result.isConfirmed) {
                            var id = element.dataset.userid;
                            var obj = {
                                id: id,
                            };
                            vista.peticiones.activarUsuario(obj);
                        }
                    })
                }
            },
            accionesBotonEliminar: {
                ejecutar: function (element){
                    Swal.fire({
                        title: '¿Desea eliminar este usuario?',
                        text: "Al eliminar esta cuenta no se podrán recuperar los datos",
                        icon: 'warning',
                        showCancelButton: true,
                        confirmButtonColor: '#3085d6',
                        cancelButtonColor: '#d33',
                        confirmButtonText: 'Eliminar'
                    }).then((result) => {
                        if (result.isConfirmed) {
                            var id = element.dataset.userid;
                            var obj = {
                                id: id,
                            };
                            vista.peticiones.eliminarUsuario(obj);
                        }
                    })
                }
            }
        },
        peticiones: {
            listarUsuarios: {
                beforeSend: function () {
                    var tbody = vista.controles.tbodyListaUsuarios;
                    tbody.html(vista.utils.templates.consultando());
                },
                completo: function (respuesta) {//respuesta del controlador
                    var tbody = vista.controles.tbodyListaUsuarios;
                    var datos = __app.parsearRespuesta(respuesta); //construye un array
                    if (datos && datos.length > 0) {
                        tbody.html('');
                        for (var i = 0; i < datos.length; i++) {
                            var dato = datos[i];
                            if(dato['estatus']== 1){
                                dato['estatus']='Inactivo';
                            }else if(dato['estatus']== 2){
                                dato['estatus']='Activo';
                            }
                            tbody.append(vista.utils.templates.item(dato));
                        }
                    } else {
                        tbody.html(vista.utils.templates.noHayRegistros());
                    }
                    vista.controles.botonActivar = $('.activar');
                    vista.controles.botonEliminar = $('.eliminar');
                }
            },
            activarUsuario:{
                beforeSend: function () {
                    vista.controles.botonActivar.prop('disabled', true);
                    //propiedades botón
                },
                completo: function () {
                    vista.controles.botonActivar.prop('disabled', false);
                },
                finalizado: function (respuesta) {
                    if (__app.validarRespuesta(respuesta)) {
                        Swal.fire('Usuario Activado',
                            'Se ha activado correctamente el usuario',
                            'success');
                        vista.peticiones.listarUsuarios();
                        return;
                    }
                    Swal.fire('Error',
                        respuesta.mensaje,
                        'error');
                }
            },
            eliminarUsuario:{
                beforeSend: function () {
                    vista.controles.botonEliminar.prop('disabled', true);
                    //propiedades botón
                },
                completo: function () {
                    vista.controles.botonEliminar.prop('disabled', false);
                },
                finalizado: function (respuesta) {
                    if (__app.validarRespuesta(respuesta)) {
                        Swal.fire('Usuario Eliminado',
                            'Se ha eliminado el usuario correctamente',
                            'success');
                        vista.peticiones.listarUsuarios();
                        return;
                    }
                    Swal.fire('Error al eliminar el usuario',
                        respuesta.mensaje,
                        'error');
                }
            }
        }
    },
    peticiones: {
        listarUsuarios: function () {
            __app.get(RUTAS_API.ALUMNOS.LISTAR)
                .beforeSend(vista.callbacks.peticiones.listarUsuarios.beforeSend)
                .success(vista.callbacks.peticiones.listarUsuarios.completo)
                .error(vista.callbacks.peticiones.listarUsuarios.completo)
                .send();
        },
        activarUsuario: function (obj){
            __app.post(RUTAS_API.ALUMNOS.ACTIVAR,obj)
                .beforeSend(vista.callbacks.peticiones.activarUsuario.beforeSend)
                .complete(vista.callbacks.peticiones.activarUsuario.completo)
                .success(vista.callbacks.peticiones.activarUsuario.finalizado)
                .error(vista.callbacks.peticiones.activarUsuario.finalizado)
                .send();
        },
        eliminarUsuario: function (obj){
            __app.post(RUTAS_API.ALUMNOS.ELIMINAR,obj)
                .beforeSend(vista.callbacks.peticiones.eliminarUsuario.beforeSend)
                .complete(vista.callbacks.peticiones.eliminarUsuario.completo)
                .success(vista.callbacks.peticiones.eliminarUsuario.finalizado)
                .error(vista.callbacks.peticiones.eliminarUsuario.finalizado)
                .send();
        }
    },
    utils: {
        templates: {
            item: function (obj) {
                return '<tr>'
                    +'<td>'+ obj.nombre +'</td>'
                    +'<td>'+ obj.apellido +'</td>'
                    +'<td>'+ obj.matricula +'</td>'
                    +'<td>'+ obj.promocion +'</td>'
                    +'<td>'+ obj.correo +'</td>'
                    +'<td>'+ obj.fecha +'</td>'
                    +'<td>'+ obj.estatus +'</td>'
                    +'<td>'
                    +'<button class="activar" data-userid="'+btoa(obj.id)+'" ' +
                    'onclick="vista.callbacks.eventos.accionesBotonActivar.ejecutar(this)">Activar</button>'
                    +' | '
                    +'<button class="eliminar" data-userid="'+btoa(obj.id)+'" ' +
                    'onclick="vista.callbacks.eventos.accionesBotonEliminar.ejecutar(this)">Eliminar</button>'
                    +'<td>'
                    +'<tr>'
            },
            consultando: function () {
                return '<tr><td colspan="6">Consultando...</td></tr>'
            },
            noHayRegistros: function () {
                return '<tr><td colspan="6">No hay registros...</td></tr>';
            }
        }
    },
};
$(vista.init);