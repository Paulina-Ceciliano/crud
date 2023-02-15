var vista = {
    controles: {
        formPagos: $('#formPagos'), //objeto JQuery
        btnBuscarAlumno: $('#buscarAlumno'),
        inputAlumno: $('#iptBuscar'),
    },
    init: function () {
        vista.eventos();
    },
    eventos: function () {
        vista.controles.formPagos.on('submit', vista.callbacks.eventos.accionesFormRegistro.ejecutar);
        vista.controles.btnBuscarAlumno.on('click', vista.callbacks.eventos.accionesBotonBuscar.ejecutar);
    },
    callbacks: {
        eventos: {
            accionesFormRegistro: {
                ejecutar: function (evento) {
                    __app.detenerEvento(evento);
                    var form = vista.controles.formPagos;
                    var obj = form.getFormData();
                    console.log(obj);
                    vista.peticiones.registrarPago(obj);
                }
            },
            accionesBotonBuscar: {
                ejecutar: function (evento){
                    __app.detenerEvento(evento);

                }
            }
        },
        peticiones: {
            beforeSend: function () {
                vista.controles.formPagos.find('input,button').prop('disabled', true);
            },
            completo: function () {
                vista.controles.formPagos.find('input,button').prop('disabled', false);
            },
            finalizado: function (respuesta) {
                if (__app.validarRespuesta(respuesta)) {
                    vista.controles.formPagos.find('input').val('');
                    console.log(respuesta);
                    swal('Correcto', 'Se ha registrado correctamente el usuario', 'success');
                    return;
                }
                swal('Error', respuesta.mensaje, 'error');
            }
        }
    },
    peticiones: {
        registrarPago: function (obj) {
            __app.post(RUTAS_API.PAGOS.REGISTRAR_PAGO, obj)
                .beforeSend(vista.callbacks.peticiones.beforeSend)
                .complete(vista.callbacks.peticiones.completo)
                .success(vista.callbacks.peticiones.finalizado)
                .error(vista.callbacks.peticiones.finalizado)
                .send();
        },
        buscarAlumno: function (obj){
            __app.post(RUTAS_API.PAGOS.REGISTRAR_PAGO, obj)
                .beforeSend(vista.callbacks.peticiones.beforeSend)
                .complete(vista.callbacks.peticiones.completo)
                .success(vista.callbacks.peticiones.finalizado)
                .error(vista.callbacks.peticiones.finalizado)
                .send();
        }
    }
};
$(vista.init);