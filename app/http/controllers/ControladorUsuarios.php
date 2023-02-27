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

    public function listaVista()
    {
        return $this->view("usuarios/listausuarios");
    }

    public function formCrearUsuario()
    {
        return $this->view("usuarios/registrarusuario");
    }

    public function formEdicionUsuario()
    {

    }

    public function login(Request $request) {
        $usuarioModel = new Usuarios();
        $usuario = $usuarioModel->where("correo", "=", $request->correo)
            ->where("password", "=", md5($request->password))
            ->where("estatus", "=",2)->first();

        if ($usuario) {
            return new Respuesta(EMensajes::CORRECTO, "Se hace login");
        }

        return new Respuesta(EMensajes::ERROR, "Datos de usuario no encontrados o incorrectos");
    }

    /*public function enviarCorreo($correo, $asunto, $mensaje) {
        $mail = new PHPMailer(true); //Crea una instancia de PHPMailer
        try {
            //Configura los detalles del servidor SMTP
            $mail->isSMTP();
            $mail->Host = 'smtp.gmail.com';
            $mail->SMTPAuth = true;
            $mail->Username = 'tucorreo@gmail.com';
            $mail->Password = 'tucontraseña';
            $mail->SMTPSecure = PHPMailer::ENCRYPTION_STARTTLS;
            $mail->Port = 587;
            //Configura los detalles del correo electrónico
            $mail->setFrom('tucorreo@gmail.com', 'Tu Nombre');
            $mail->addAddress($correo);
            $mail->isHTML(true);
            $mail->Subject = $asunto;
            $mail->Body = $mensaje;
            //Envía el correo electrónico
            $mail->send();
            return true;
        } catch (Exception $e) {
            return false;
        }
    }*/

    public function insertarUsuario(Request $request) {
        $usuarioModel = new Usuarios();
        $usuario = $usuarioModel->where("correo", "=", $request->correo)->first();
        if ($usuario) {
            return new Respuesta(EMensajes::ERROR, "El correo o nombre de usuario ya se encuentran registrados.");
        }
        //Esto se hace para añadir campos al request
        $request->__set('estatus', $usuarioModel::ESTATUS_INACTIVO);
        $request->password = md5($request->password);
        $id = $usuarioModel->insert($request->all());
        $v = ($id > 0);
        $respuesta = new Respuesta($v ? EMensajes::INSERCION_EXITOSA : EMensajes::ERROR_INSERSION);

        /*$respuesta->setDatos($id);
        $this->enviarCorreo($request->correo, "Solicitud de registro", "Su solicitud ha sido recibida y está pendiente de validación");*/
        return $respuesta;
    }

    public function listarUsuarios() {
        $usuarioModel = new Usuarios();
        $lista = $usuarioModel->where('estatus','=',1)->get();

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

    public function activarUsuario($id){
        $idUsuario = base64_decode($id);
        $usuarioModel = new Usuarios();
        $usuario = $usuarioModel->where("id", " = ", $idUsuario)->first();
        $usuario->estatus = 2;
        $usuarioActualizado = $usuario->update();
        $v = ($usuarioActualizado > 0);
        return new Respuesta($v ? EMensajes::ACTUALIZACION_EXITOSA : EMensajes::ERROR_ACTUALIZACION);
    }

}
