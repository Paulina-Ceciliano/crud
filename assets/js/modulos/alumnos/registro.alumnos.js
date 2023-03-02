var vista = {
    controles: {
        formAlumnos: $('#formAlumnos'),
    },
    init: function () {
        vista.eventos();
    },
    eventos: function () {
        vista.controles.formAlumnos.on('submit', vista.callbacks.eventos.accionesFormRegistro.ejecutar);
    },
    callbacks: {
        eventos: {
            accionesFormRegistro: {
                ejecutar: function (evento){
                    __app.detenerEvento(evento);
                    Swal.fire({
                        title: '¿Desea enviar el registro?',
                        text: "Un administrador revisará su solicitud, será notificado por correo en caso de ser aceptado",
                        icon: 'warning',
                        showCancelButton: true,
                        confirmButtonColor: '#3085d6',
                        cancelButtonColor: '#dd3333',
                        confirmButtonText: 'Enviar'
                    }).then((result) => {
                        if (result.isConfirmed) {
                            var form = vista.controles.formAlumnos;
                            var obj = form.getFormData();
                            vista.peticiones.registrarAlumno(obj);
                        }
                    })
                }
            },
        },
        peticiones: {
            beforeSend: function () {
                vista.controles.formAlumnos.find('input,button').prop('disabled', true);
            },
            completo: function () {
                vista.controles.formAlumnos.find('input,button').prop('disabled', false);
            },
            finalizado: function (respuesta) {
                if (__app.validarRespuesta(respuesta)) {
                    vista.controles.formAlumnos.find('input').val(''); //Limpiar
                    Swal.fire('Solicitud enviado',
                        'Se ha registrado tu cuenta, espera a que un administrador la active para poder hacer uso del sistema',
                        'success');
                    return;
                }
                Swal.fire('Error al enviar su registro',
                    respuesta.mensaje,
                    'error');
            }
        }
    },
    peticiones: {
        registrarAlumno: function (obj) {
            __app.post(RUTAS_API.ALUMNOS.REGISTRAR_ALUMNO,obj)
                .beforeSend(vista.callbacks.peticiones.beforeSend)
                .complete(vista.callbacks.peticiones.completo)
                .success(vista.callbacks.peticiones.finalizado)
                .error(vista.callbacks.peticiones.finalizado)
                .send();
        }
    }
};
$(vista.init);