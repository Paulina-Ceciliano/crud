var vista = {
    controles: {
        tbodyListaUsuarios: $('#tablaListaUsuarios tbody')
    },
    init: function () {
        vista.eventos();
        vista.peticiones.listarUsuarios();
    },
    eventos: function () {

    },
    callbacks: {
        eventos: {

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
                    + '<a href="' + __app.urlTo('/usuarios/actualizarEstatus/' + btoa(obj.id)) + '" class="btn-accion activar">Activar</a>'
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