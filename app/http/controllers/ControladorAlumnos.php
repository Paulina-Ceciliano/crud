<?php

class ControladorAlumnos extends Controller
{

    function __construct()
    {
        parent::__construct();
    }

    public function registroVista(){
        return $this->view("alumnos/registroalumnos");
    }

    public function loginVista(){
        return $this->view("alumnos/loginalumnos");
    }

    public function listaVista(){
        return $this->view("alumnos/listaralumnos");
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

    public function registro(Request $request) {
        $alumnoModel = new Alumnos();
        $alumno = $alumnoModel->where("correo", "=", $request->correo)->orWhere("matricula", "=", $request->matricula)->first();
        if ($alumno) {
            return new Respuesta(EMensajes::ERROR, "El correo o matricula ya se encuentran registrados.");
        }
        //Esto se hace para añadir campos al request
        $request->__set('estatus', 1);
        $request->__set('promocion',184);
        $request->password = md5($request->password);

        $id = $alumnoModel->insert($request->all());
        $v = ($id > 0);
        $respuesta = new Respuesta($v ? EMensajes::INSERCION_EXITOSA : EMensajes::ERROR_INSERSION);
        return $respuesta;
    }

    public function listaAlumnos() {
        $alumnoModel = new Alumnos();
        $lista = $alumnoModel->where('estatus','=',1)->get();
        $v = count($lista);
        $respuesta = new Respuesta($v ? EMensajes::CORRECTO : EMensajes::ERROR);
        $respuesta->setDatos($lista);
        return $respuesta;
    }
}
