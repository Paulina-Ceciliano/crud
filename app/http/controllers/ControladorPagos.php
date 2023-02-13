<?php

class ControladorPagos extends Controller
{

    function __construct()
    {
        parent::__construct();
    }

    public function index()
    {
        return $this->view("usuarios/formPagos.php");
    }

    public function insert()
    {

    }

    public function update()
    {

    }

    public function delete(){

    }
}
