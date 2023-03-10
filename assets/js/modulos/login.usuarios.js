var vista = {
    controles: {
        formLogin: $('#formLogin'),
    },
    init: function(){
        vista.eventos();
    },
    eventos: function() {
        vista.controles.formLogin.on('submit', vista.callbacks.eventos.accionesFormLogin.ejecutar)
    },
    callbacks: {
        eventos: {
            accionesFormLogin: {
                ejecutar: function (evento){
                    __app.detenerEvento(evento);
                    var form = vista.controles.formLogin;
                    var obj = form.getFormData();
                    vista.peticiones.login(obj);
                }
            }
        },
        peticiones:{//Petición de las vistas a los controladores
            beforeSend: function(){
                //Desabilita los inputs y los botones
                vista.controles.formLogin.find('input,button').prop('disabled', true);
            },
            completo: function (){
                vista.controles.formLogin.find('input,button').prop('disabled', false);
            },
            finalizado: function (respuesta){//respuesta del controlador
                if(__app.validarRespuesta(respuesta)){
                    vista.controles.formLogin.find('input').val('');//limpiar los inputs
                    window.location.href = __app.urlTo("usuarios/home");//Funciones de JS
                    return;
                }
                swal('Error', respuesta.mensaje,'error');
            }
        }
    },
    peticiones: {
        login: function (obj){
            __app.post(RUTAS_API.USUARIOS.LOGIN,obj)
                .beforeSend(vista.callbacks.peticiones.beforeSend)
                .complete(vista.callbacks.peticiones.completo)
                .success(vista.callbacks.peticiones.finalizado)
                .error(vista.callbacks.peticiones.finalizado)
                .send();
        },
    }
};
$(vista.init);