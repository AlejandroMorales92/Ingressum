<?php

class usuario {

    private $id;
    private $rol_id;
    private $cedula;
    private $nombre;
    private $apellido;
    private $telefono;
    private $alias;
    private $password;
    private $created_at;
    private $updated_at;
    private $deleted_at;
    
    public function getId() {
        return $this->id;
    }

    public function getRolId() {
        return $this->rol_id;
    }

    public function getCedula() {
        return $this->cedula;
    }

    public function getNombre() {
        return $this->nombre;
    }

    public function getApellido() {
        return $this->apellido;
    }

    public function getTelefono() {
        return $this->telefono;
    }

    public function getAlias() {
        return $this->alias;
    }

    public function getPassword() {
        return $this->password;
    }

    public function getCreatedAt() {
        return $this->createdAt;
    }

    public function getUpdatedAt() {
        return $this->updatedAt;
    }

    public function getDeletedAt() {
        return $this->deletedAt;
    }

    public function setId($id) {
        $this->id = $id;
    }

    public function setRolId($rol_id) {
        $this->rol_id = $rol_id;
    }

    public function setCedula($cedula) {
        $this->cedula = $cedula;
    }

    public function setNombre($nombre) {
        $this->nombre = $nombre;
    }

    public function setApellido($apellido) {
        $this->apellido = $apellido;
    }

    public function setTelefono($telefono) {
        $this->telefono = $telefono;
    }

    public function setAlias($alias) {
        $this->alias = $alias;
    }

    public function setPassword($password) {
        $this->password = $password;
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
