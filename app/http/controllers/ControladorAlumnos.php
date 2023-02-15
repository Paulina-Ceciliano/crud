<?php

class ControladorAlumnos extends Controller
{

    function __construct()
    {
        parent::__construct();
    }

    public function buscarAlumno(Request $request) {
        $alumnoModel = new Alumnos();
        $alumnos = $alumnoModel->orWhere("matricula", " LIKE% ", $request->alumno)
            ->orWhere("nombre", " LIKE% ", $request->alumno)
            ->orWhere("apellido", " LIKE% ", $request->alumno)
            ->orWhere("correo", " LIKE% ", $request->alumno)->get();
        $v = count($alumnos);
        $respuesta = new Respuesta($v ? EMensajes::CORRECTO : EMensajes::NO_HAY_REGISTROS);
        $respuesta->setDatos($alumnos);
        return $respuesta;
    }
}
