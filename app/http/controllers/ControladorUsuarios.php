<?php

class ControladorUsuarios extends Controller
{

    function __construct()
    {
        parent::__construct();
    }

    public function index()
    {
        return $this->view("login.php");
    }

    public function home(){
        return $this->view("usuarios/home");
    }

    public function lista()
    {
        return $this->view("usuarios/listausuarios");
    }

    public function formPagos()
    {
        return $this->view("usuarios/formPagos");
    }

    public function formCrearUsuario()
    {
        return $this->view("registrarusuario");
    }

    public function formEdicionUsuario()
    {
        $variables = [
            'titulo' => 'Actualizar información'
        ];
        return $this->view("usuarios/registrarusuario", $variables);
    }

    public function login(Request $request) {
        $usuarioModel = new Usuarios();
        $usuario = $usuarioModel->where("correo", "=", $request->correo)
            ->where("password", "=", md5($request->password))
            ->first();

        if ($usuario) {
            return new Respuesta(EMensajes::CORRECTO, "Se hace login");
        }

        return new Respuesta(EMensajes::ERROR, "Datos de usuario no encontrados o incorrectos");
    }

    public function insertarUsuario(Request $request) {
        $usuarioModel = new Usuarios();
        $usuario = $usuarioModel->where("correo", "=", $request->correo)
            ->orWhere("username", "=", $request->username)->first();
        if ($usuario) {
            return new Respuesta(EMensajes::ERROR, "El correo o nombre de usuario ya se encuentran registrados.");
        }

        //Esto se hace para añadir campos al request
        $request->__set('fecha', date('d-m-Y'));
        $request->__set('estatus', 'Inactivo');
        $request->__set('idRol', 2);

        //Encriptar contraseña
        $request->password = md5($request->password);

        $id = $usuarioModel->insert($request->all());
        $v = ($id > 0);
        $respuesta = new Respuesta($v ? EMensajes::INSERCION_EXITOSA : EMensajes::ERROR_INSERSION);
        $respuesta->setDatos($id);

        //$this->enviarCorreo($request->correo, "Solicitud de registro", "Su solicitud ha sido recibida y está pendiente de validación");

        return $respuesta;
    }

    public function listarUsuarios() {
        $usuarioModel = new Usuarios();
        $lista = $usuarioModel->get();
        $v = count($lista);
        $respuesta = new Respuesta($v ? EMensajes::CORRECTO : EMensajes::ERROR);
        $respuesta->setDatos($lista);
        return $respuesta;
    }

    public function actualizarUsuario($usuario) {
        $usuarioModel = new Usuarios();
        $actualizados = $usuarioModel->where("id", " = ", $usuario["idUsuario"])
            ->update($usuario);
        $v = ($actualizados > 0);
        return new Respuesta($v ? EMensajes::ACTUALIZACION_EXITOSA : EMensajes::ERROR_ACTUALIZACION);
    }

    public function eliminarusuario($idUsuario) {
        $usuarioModel = new Usuarios();
        $eliminados = $usuarioModel->where("id", " = ", $idUsuario)->delete();
        $v = ($eliminados > 0);
        return new Respuesta($v ? EMensajes::ELIMINACION_EXITOSA : EMensajes::ERROR_ELIMINACION);
    }

    public function buscarUsuarioPorId($idUsuario) {
        $usuarioModel = new Usuarios();
        $usuario = $usuarioModel->where("id", " = ", $idUsuario)->first();
        $v = ($usuario != null);
        return new Respuesta($v ? EMensajes::CORRECTO : EMensajes::NO_HAY_REGISTROS);
    }

    /*public function enviarCorreo($destinatario, $asunto, $mensaje) {
        $headers = "From: gibbymetal@hotmail.com";
        mail($destinatario, $asunto, $mensaje, $headers);
    }*/

}
