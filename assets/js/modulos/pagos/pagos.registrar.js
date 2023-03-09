var vista = {
    controles: {
        //objetos JQuery
        formPagos: $('#formPagos'),
    },
    init: function () {
        vista.eventos();
    },
    eventos: function () {
        vista.controles.formPagos.on('submit', vista.callbacks.eventos.accionesFormRegistro.ejecutar);
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
                swal('Error', respuesta.mensaje, 'Error al registrar');
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
    }
};
$(vista.init);