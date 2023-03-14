<?php

class ControladorAlumnos extends Controller
{

    function __construct()
    {
        parent::__construct();
    }

    public function registroVista()
    {
        return $this->view("alumnos/registroalumnos");
    }

    public function loginVista()
    {
        return $this->view("alumnos/loginalumnos");
    }

    public function listaVista()
    {
        return $this->view("usuarios/listaralumnos");
    }

    public function buscarAlumno(Request $request)
    {
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

    public function login(Request $request)
    {
        $alumnoModel = new Alumnos();
        $alumno = $alumnoModel->where("correo", "=", $request->correo)
            ->where("password", "=", md5($request->password))
            ->where("estatus", "=", 2)->first();

        if ($alumno) {
            return new Respuesta(EMensajes::CORRECTO, "Se hace login");
        }

        return new Respuesta(EMensajes::ERROR, "Datos de usuario no encontrados o incorrectos");
    }

    public function registro(Request $request)
    {
        $alumnoModel = new Alumnos();
        $promoModel = new Promociones();
        $alumno = $alumnoModel->where("correo", "=", $request->correo)->orWhere("matricula", "=", $request->matricula)->first();
        if ($alumno) {
            return new Respuesta(EMensajes::ERROR, "El correo o matricula ya se encuentran registrados.");
        }
        //Esto se hace para añadir campos al request
        $request->__set('estatus', $alumnoModel::ESTATUS_INACTIVO);
        $request->__set('promocion',$promoModel::ESTATUS_DESHABILITADA );
        $request->password = md5($request->password);

        $id = $alumnoModel->insert($request->all());
        $v = ($id > 0);
        $respuesta = new Respuesta($v ? EMensajes::INSERCION_EXITOSA : EMensajes::ERROR_INSERSION);
        return $respuesta;
    }

    public function listaAlumnos()
    {
        $alumnoModel = new Alumnos();
        $promoModel = new Promociones();

        $arrayLista = [];

        $lista = $alumnoModel->where('estatus', '=', $alumnoModel::ESTATUS_INACTIVO)->get();
        $v = count($lista);
        $arrayLista['alumnos']= $lista;
        $listaPromo = $promoModel->where('estatus', '=', $promoModel::ESTATUS_ACTIVA)->get();
        $v2 = count($listaPromo);
        $arrayLista['promociones']= $listaPromo;
        $respuesta = new Respuesta($v ? EMensajes::CORRECTO : EMensajes::ERROR);
        $respuesta->setDatos($arrayLista);
        return $respuesta;
    }

    public function activarAlumno(Request $request)
    {
        $idAlumno = base64_decode($request->id);
        $alumnosModel = new Alumnos();
        $alumno = $alumnosModel->where("id", " = ", $idAlumno)->first();
        $alumnoArray = [
            'id' => $alumno->id,
            'matricula' => $alumno->matricula,
            'nombre' => $alumno->nombre,
            'apellido' => $alumno->apellido,
            'promocion' => $alumno->promocion,
            'correo' => $alumno->correo,
            'password' => $alumno->password,
            'fecha' => $alumno->fecha,
            'estatus' => 2
        ];
        $alumnoActivado = $alumnosModel->update($alumnoArray);
        $v = ($alumnoActivado > 0);
        return new Respuesta($v ? EMensajes::ACTUALIZACION_EXITOSA : EMensajes::ERROR_ACTUALIZACION);
    }

    public function eliminarAlumno(Request $request)
    {
        $idAlumno = base64_decode($request->id);
        $alumnoModel = new Alumnos();
        $eliminados = $alumnoModel->where("id", " = ", $idAlumno)->delete();
        $v = ($eliminados > 0);
        return new Respuesta($v ? EMensajes::ELIMINACION_EXITOSA : EMensajes::ERROR_ELIMINACION);
    }
}
