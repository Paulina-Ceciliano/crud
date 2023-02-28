var vista = {
    controles:{
        selectBuscar: $('#buscarAlumno').select2({
            theme: "classic"
        })
    },
    init: function (){
        vista.eventos();
        vista.peticiones.listarAlumnos();
    },
    eventos:function () {

    },
    callbacks:{
        eventos:{ },
        peticiones:{
            beforeSend: function (){
                var select= vista.controles.selectBuscar;
                select.html(vista.utils.templates.consultando());
            },
            completo: function (respuesta){
                var select= vista.controles.selectBuscar;
                var datos = __app.parsearRespuesta(respuesta);
                if(datos && datos.length > 0){
                    select.html('')//limpia el select
                    for(var i = 0; i< datos.length; i++){
                        var dato = datos[i];
                        select.append(vista.utils.templates.item(dato));
                    }
                }else {
                    select.html(vista.utils.templates.noHayRegistros());
                }
            },
        }
    },

    peticiones:{
        listarAlumnos: function (){
            __app.get(RUTAS_API.ALUMNOS.BUSCAR)
                .beforeSend(vista.callbacks.peticiones.beforeSend)
                .success(vista.callbacks.peticiones.completo)
                .error(vista.callbacks.peticiones.completo)
                .send();
        }
    },
    utils:{
        templates:{
            item:function(obj){
                return'<option value="'+obj.id+'">'+obj.nombre +
                    ' '+obj.apellido+'</option>'
            },
            consultando: function(){
                return '<option>Consultando</option>'
            },
            noHayRegistros: function(){
                return '<option>No hay registros</option>'
            }
        }
    }
}
$(vista.init);