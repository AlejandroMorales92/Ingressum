<?php

class usuario {
  
  private $id;
  private $usuario;
  private $contrasena;
  
  public function getId() {
    return $this->id;
  }

  public function getUsuario() {
    return $this->usuario;
  }

  public function getContrasena($hash) {
    return hash($hash, $this->contrasena, false);
  }

  public function setId($id) {
    $this->id = $id;
  }

  public function setUsuario($usuario) {
    $this->usuario = $usuario;
  }

  public function setContrasena($contrasena) {
    $this->contrasena = $contrasena;
  }

}