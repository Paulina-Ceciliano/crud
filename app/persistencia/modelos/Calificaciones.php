<?php


class Calificaciones extends ModeloGenerico
{
    protected $id;
    protected $profesor;
    protected $alumno;
    protected $materia;
    protected $calificacion;
    protected $periodo;
    protected $comentarios;

    public function __construct($propiedades = null) {
        parent::__construct("calificaciones", Usuarios::class, $propiedades);
    }

    /**
     * @return mixed
     */
    public function getId()
    {
        return $this->id;
    }

    /**
     * @param mixed $id
     */
    public function setId($id): void
    {
        $this->id = $id;
    }

    /**
     * @return mixed
     */
    public function getProfesor()
    {
        return $this->profesor;
    }

    /**
     * @param mixed $profesor
     */
    public function setProfesor($profesor): void
    {
        $this->profesor = $profesor;
    }

    /**
     * @return mixed
     */
    public function getAlumno()
    {
        return $this->alumno;
    }

    /**
     * @param mixed $alumno
     */
    public function setAlumno($alumno): void
    {
        $this->alumno = $alumno;
    }

    /**
     * @return mixed
     */
    public function getMateria()
    {
        return $this->materia;
    }

    /**
     * @param mixed $materia
     */
    public function setMateria($materia): void
    {
        $this->materia = $materia;
    }

    /**
     * @return mixed
     */
    public function getCalificacion()
    {
        return $this->calificacion;
    }

    /**
     * @param mixed $calificacion
     */
    public function setCalificacion($calificacion): void
    {
        $this->calificacion = $calificacion;
    }

    /**
     * @return mixed
     */
    public function getPeriodo()
    {
        return $this->periodo;
    }

    /**
     * @param mixed $periodo
     */
    public function setPeriodo($periodo): void
    {
        $this->periodo = $periodo;
    }

    /**
     * @return mixed
     */
    public function getComentarios()
    {
        return $this->comentarios;
    }

    /**
     * @param mixed $comentarios
     */
    public function setComentarios($comentarios): void
    {
        $this->comentarios = $comentarios;
    }



}