<?php

class Usuarios extends ModeloGenerico {

    protected $id;
    protected $nombre;
    protected $apellido;
    protected $username;
    protected $correo;
    protected $password;
    protected $fecha;
    protected $idRol;
    protected $estatus;


    public function __construct($propiedades = null) {
        parent::__construct("usuarios", Usuarios::class, $propiedades);
    }

//GETTERS
    public function getId()
    {
        return $this->id;
    }

    public function getNombre()
    {
        return $this->nombre;
    }


    public function getApellido()
    {
        return $this->apellido;
    }


    public function getUsername()
    {
        return $this->username;
    }

    public function getCorreo()
    {
        return $this->correo;
    }


    public function getPassword()
    {
        return $this->password;
    }


    public function getFecha()
    {
        return $this->fecha;
    }


    public function getIdRol()
    {
        return $this->idRol;
    }


    public function getEstatus()
    {
        return $this->estatus;
    }

    //SETTERS
    public function setId($id): void
    {
        $this->id = $id;
    }

    public function setNombre($nombre): void
    {
        $this->nombre = $nombre;
    }

    public function setApellido($apellido): void
    {
        $this->apellido = $apellido;
    }

    public function setUsername($username): void
    {
        $this->username = $username;
    }

    public function setCorreo($correo): void
    {
        $this->correo = $correo;
    }


    public function setPassword($password): void
    {
        $this->password = $password;
    }

    public function setFecha($fecha): void
    {
        $this->fecha = $fecha;
    }

    public function setIdRol($idRol): void
    {
        $this->idRol = $idRol;
    }

    public function setEstatus($estatus): void
    {
        $this->estatus = $estatus;
    }

}
