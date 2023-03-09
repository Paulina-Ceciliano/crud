<?php


class Pagos extends ModeloGenerico
{
    protected $id;
    protected $cobrador;
    protected $alumno;
    protected $concepto;
    protected $monto;
    protected $atraso;
    protected $fecha;

    public function __construct($propiedades = null) {
        parent::__construct("pagos", Pagos::class, $propiedades);
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
    public function getCobrador()
    {
        return $this->cobrador;
    }

    /**
     * @param mixed $cobrador
     */
    public function setCobrador($cobrador): void
    {
        $this->cobrador = $cobrador;
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
    public function getConcepto()
    {
        return $this->concepto;
    }

    /**
     * @param mixed $concepto
     */
    public function setConcepto($concepto): void
    {
        $this->concepto = $concepto;
    }

    /**
     * @return mixed
     */
    public function getMonto()
    {
        return $this->monto;
    }

    /**
     * @param mixed $monto
     */
    public function setMonto($monto): void
    {
        $this->monto = $monto;
    }

    /**
     * @return mixed
     */
    public function getAtraso()
    {
        return $this->atraso;
    }

    /**
     * @param mixed $atraso
     */
    public function setAtraso($atraso): void
    {
        $this->atraso = $atraso;
    }

    /**
     * @return mixed
     */
    public function getFecha()
    {
        return $this->fecha;
    }

    /**
     * @param mixed $fecha
     */
    public function setFecha($fecha): void
    {
        $this->fecha = $fecha;
    }


}