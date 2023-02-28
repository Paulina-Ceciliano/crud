var vista = {
    controles: {
        tbodyListaUsuarios: $('#tablaListaUsuarios tbody'),
        botonActivar : null
    },
    init: function () {
        vista.peticiones.listarUsuarios();
    },
    eventos: function () {
    },
    callbacks: {
        eventos: {
            accionesBotonActivar: {
                ejecutar: function (element){
                    var id = element.dataset.userid;
                    var obj = {
                        id: id,
                    };
                    vista.peticiones.activarUsuario(obj);
                    console.log("el id es: "+ id);
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
                        swal('Correcto', 'Se ha activado correctamente el usuario', 'success');
                        return;
                    }
                    swal('Error', respuesta.mensaje, 'error');
                }
            }
        }
    },
    peticiones: {
        listarUsuarios: function () {
            __app.get(RUTAS_API.USUARIOS.LISTAR)
                .beforeSend(vista.callbacks.peticiones.listarUsuarios.beforeSend)
                .success(vista.callbacks.peticiones.listarUsuarios.completo)
                .error(vista.callbacks.peticiones.listarUsuarios.completo)
                .send();
        },
        activarUsuario: function (obj){
            __app.post(RUTAS_API.USUARIOS.ACTIVAR,obj)
                .beforeSend(vista.callbacks.peticiones.activarUsuario.beforeSend)
                .complete(vista.callbacks.peticiones.activarUsuario.completo)
                .success(vista.callbacks.peticiones.activarUsuario.finalizado)
                .error(vista.callbacks.peticiones.activarUsuario.finalizado)
                .send();
        }
    },
    utils: {
        templates: {
            item: function (obj) {
                return '<tr>'
                    +'<td>'+ obj.nombre +'</td>'
                    +'<td>'+ obj.apellido +'</td>'
                    +'<td>'+ obj.correo +'</td>'
                    +'<td>'+ obj.fecha +'</td>'
                    +'<td>'+ obj.estatus +'</td>'
                    +'<td>'
                    //+ '<a href="' + __app.urlTo('/usuarios/actualizarEstatus/' + btoa(obj.id)) + '" class="btn-accion activar">Activar</a>'
                    +'<button class="activar" data-userid="'+btoa(obj.id)+'" onclick="vista.callbacks.eventos.accionesBotonActivar.ejecutar(this)" >Activar</button>'
                    +' | '
                    +'<a href="javascript:;" class="btn-accion eliminar">Eliminar</a>'
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