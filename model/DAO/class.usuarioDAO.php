<?php

class usuarioDAO extends dataSource implements IUsuario {
  
  public function delete($id) {
    $sql = 'DELETE FROM usuario WHERE id = :id';
    $params = array(
        ':id' => $id
    );
    return $this->execute($sql, $params);
  }

  public function insert(\usuario $usuario) {
    $sql = 'INSERT INTO usuario (usuario, contrasena) VALUES (:user, :pass)';
    $params = array(
        ':user' => $usuario->getUsuario(),
        ':pass' => $usuario->getContrasena($this->getConfig()->getHash())
    );
    return $this->execute($sql, $params);
  }

  public function search($user, $password) {
    $sql = 'SELECT id FROM usuario WHERE usuario = :user AND contrasena = :pass';
    $params = array(
        ':user' => $user,
        ':pass' => $password
    );
    return $this->query($sql, $params);
  }

  public function select() {
    $sql = 'SELECT id, usuario, contrasena FROM usuario';
    return $this->query($sql);
  }

  public function selectById($id) {
    $sql = 'SELECT usuario, contrasena FROM usuario WHERE id = :id';
    $params = array(
        ':id' => $id
    );
    return $this->query($sql, $params);
  }

  public function update(\usuario $usuario) {
    $sql = 'UPDATE usuario SET usuario = :user, contrasena = :pass WHERE id = :id';
    $params = array(
        ':user' => $usuario->getUsuario(),
        ':pass' => $usuario->getContrasena($this->getConfig()->getHash()),
        ':id' => $usuario->getId()
    );
    $this->execute($sql, $params);
  }

}