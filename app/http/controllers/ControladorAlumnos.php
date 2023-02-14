<?php

class ControladorAlumnos extends Controller
{

    function __construct()
    {
        parent::__construct();
    }

    public function buscarUsuarioPorId($idUsuario) {
        $usuarioModel = new Usuarios();
        $usuario = $usuarioModel->where("id", " = ", $idUsuario)->first();
        $v = ($usuario != null);
        return new Respuesta($v ? EMensajes::CORRECTO : EMensajes::NO_HAY_REGISTROS);
    }
}
