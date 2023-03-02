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
        $alumnosModelo = new Alumnos();
        $alumno = $alumnosModelo->where("correo", "=", $request->correo)->first();
        if ($alumno) {
            return new Respuesta(EMensajes::ERROR, "El correo o nombre de usuario ya se encuentran registrados.");
        }
        //Esto se hace para añadir campos al request
        $request->__set('estatus', $alumnosModelo::ESTATUS_INACTIVO);
        $request->password = md5($request->password);
        $request->__set('promocion',1);

        $id = $alumnosModelo->insert($request->all());
        $v = ($id > 0);
        $respuesta = new Respuesta($v ? EMensajes::INSERCION_EXITOSA : EMensajes::ERROR_INSERSION);
        return $respuesta;
    }

    public function login(Request $request) {
        $alumnosModelo = new Alumnos();
        $alumnos = $alumnosModelo->where("correo", "=", $request->correo)
            ->where("password", "=", md5($request->password))
            ->where("estatus", "=",2)->first();

        if ($alumnos) {
            return new Respuesta(EMensajes::CORRECTO, "Se hace login");
        }

        return new Respuesta(EMensajes::ERROR, "Datos de usuario no encontrados o incorrectos");
    }
}
