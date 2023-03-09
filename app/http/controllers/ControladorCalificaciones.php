<?php

class ControladorCalificaciones extends Controller
{

    function __construct()
    {
        parent::__construct();
    }

    public function registroVista()
    {
        return $this->view("calificaciones/form/registro");
    }

    public function insert()
    {


    }

    public function update($calificacion)
    {
        $califModelo = new Calificaciones();
        $actualizados = $califModelo->where("id", " = ", $calificacion["idCalificacion"])
            ->update($calificacion);
        $v = ($actualizados > 0);
        return new Respuesta($v ? EMensajes::ACTUALIZACION_EXITOSA : EMensajes::ERROR_ACTUALIZACION);
    }

    public function delete(){

    }
}
