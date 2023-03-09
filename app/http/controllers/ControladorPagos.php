<?php

class ControladorPagos extends Controller
{

    function __construct()
    {
        parent::__construct();
    }

    public function index()
    {
        return $this->view("pagos/formPagos");
    }

    public function insertarPago(Request $request)
    {
        $pagoModelo = new Pagos();
        $request->__set('fecha', date('YYYY-MM-DD'));
        $request->__set('cobrador', 1);

        $id = $pagoModelo->insert($request->all());
        $v = ($id > 0);
        $respuesta = new Respuesta($v ? EMensajes::INSERCION_EXITOSA : EMensajes::ERROR_INSERSION);
        $respuesta->setDatos($id);
        return $respuesta;
    }

    public function listarPagosVista()
    {
        return $this->view("pagos/listapagos");
    }

    public function actualizarPago($pago)
    {
        $pagoModelo = new Pagos();
        $actualizados = $pagoModelo->where("id", " = ", $pago["idPago"])
            ->update($pago);
        $v = ($actualizados > 0);
        return new Respuesta($v ? EMensajes::ACTUALIZACION_EXITOSA : EMensajes::ERROR_ACTUALIZACION);
    }

    public function eliminarPago($idPago)
    {
        $pagoModelo = new Pagos();
        $eliminados = $pagoModelo->where("id", " = ", $idPago)->delete();
        $v = ($eliminados > 0);
        return new Respuesta($v ? EMensajes::ELIMINACION_EXITOSA : EMensajes::ERROR_ELIMINACION);
    }

    public function listarPagos()
    {
        $pagoModelo = new Pagos();
        $lista = $pagoModelo->get();
        $v = count($lista);
        $respuesta = new Respuesta($v ? EMensajes::CORRECTO : EMensajes::ERROR);
        $respuesta->setDatos($lista);
        return $respuesta;
    }

    public function buscarPago($idPago)
    {
    }
}
