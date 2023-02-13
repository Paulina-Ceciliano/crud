<?php

class ControladorCalificaciones extends Controller
{

    function __construct()
    {
        parent::__construct();
    }

    public function index()
    {
        return $this->view("usuarios/formCalificaciones");
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
