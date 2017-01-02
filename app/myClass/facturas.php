<?php
/**
 * Created by PhpStorm.
 * User: jcesa
 * Date: 28/03/2016
 * Time: 01:58 AM
 */

namespace myClass;


class facturas
{
    private $conexion_id;
    private $secuencia;
    private $total;

    /**
     * @param mixed $mensaje
     */
    public function setMensaje($mensaje)
    {
        $this->mensaje = $mensaje;
    }


    public function setDirecion($direcion)
    {
        $this->direcion = $direcion;
    }


    public function getTotal()
    {
        return $this->total;
    }

    public function getCliente()
    {
        return $this->cliente;
    }


    public function setCliente($cliente)
    {
        $this->cliente = $cliente;
    }


    public function getDirecion()
    {
        return $this->direcion;
    }


    public function getMensaje()
    {
        return $this->mensaje;
    }
    private $cliente;
    private $direcion;
    private $mensaje;


    public function setConexionId($conexion_id)
    {
        $this->conexion_id = $conexion_id;
    }


    public function getConexionId()
    {
        return $this->conexion_id;
    }

    public function setSecuencia($secuencia)
    {
        $this->secuencia = $secuencia;
        return $this;
    }

    public function getSecuencia()
    {
        return $this->secuencia;
    }






}