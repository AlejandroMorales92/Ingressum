<?php

class control {

    private $id;
    private $col_id;
    private $vehiculo;
    private $placa;
    private $observacion;
    private $fecha_entrada;
    private $fecha_salida;
    private $usu_id_entrada;
    private $usu_id_salida;
    private $created_at;
    private $updated_at;
    private $deleted_at;
    
    public function getId() {
        return $this->id;
    }

    public function getColId() {
        return $this->col_id;
    }

    public function getVehiculo() {
        return $this->vehiculo;
    }

    public function getPlaca() {
        return $this->placa;
    }

    public function getObservacion() {
        return $this->observacion;
    }

    public function getFechaEntrada() {
        return $this->fecha_entrada;
    }

    public function getFechaSalida() {
        return $this->fecha_salida;
    }

    public function getUsuIdEntrada() {
        return $this->usu_id_entrada;
    }

    public function getUsuIdSalida() {
        return $this->usu_id_salida;
    }

    public function getCreatedAt() {
        return $this->created_at;
    }

    public function getUpdatedAt() {
        return $this->updated_at;
    }

    public function getDeletedAt() {
        return $this->deleted_at;
    }

    public function setId($id) {
        $this->id = $id;
    }

    public function setColId($col_id) {
        $this->col_id = $col_id;
    }

    public function setVehiculo($vehiculo) {
        $this->vehiculo = $vehiculo;
    }

    public function setPlaca($placa) {
        $this->placa = $placa;
    }

    public function setObservacion($observacion) {
        $this->observacion = $observacion;
    }

    public function setFechaEntrada($fecha_entrada) {
        $this->fecha_entrada = $fecha_entrada;
    }

    public function setFechaSalida($fecha_salida) {
        $this->fecha_salida = $fecha_salida;
    }

    public function setUsuIdEntrada($usu_id_entrada) {
        $this->usu_id_entrada = $usu_id_entrada;
    }

    public function setUsuIdSalida($usu_id_salida) {
        $this->usu_id_salida = $usu_id_salida;
    }

    public function setCreatedAt($created_at) {
        $this->created_at = $created_at;
    }

    public function setUpdatedAt($updated_at) {
        $this->updated_at = $updated_at;
    }

    public function setDeletedAt($deleted_at) {
        $this->deleted_at = $deleted_at;
    }



}