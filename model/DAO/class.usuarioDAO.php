<?php

class usuarioDAO extends dataSource implements IUsuario {
  
  public function delete($id, $logico = true) {
        if ($logico === true) {
            $sql = 'UPDATE ces_usuario SET usu_deleted_at = now() WHERE usu_id = :id';
            $params = array(
                ':id' => $id
            );
            return $this->execute($sql, $params);
        } else if ($logico === false) {
            $sql = 'DELETE FROM ces_usuario WHERE usu_id = :id AND usu_deleted_at IS NULL';
            $params = array(
                ':id' => (integer) $id
            );
            return $this->execute($sql, $params);
        }
    }

  public function insert(\usuario $usuario) {
    $sql = 'INSERT INTO ces_usuario (rol_id, usu_cedula, usu_nombre, usu_apellido, usu_telefono, usu_alias, usu_password) VALUES (:rolId, :cedula, :nombre, :apellido, :telefono, :alias, :password)';
    $params = array(
        ':rolId' => $usuario->getRolId(),
        ':cedula' => $usuario->getCedula(),
        ':nombre' => $usuario->getNombre(),
        ':apellido' => $usuario->getApellido(),
        ':telefono' => $usuario->getTelefono(),
        ':alias' => $usuario->getAlias(),
        ':password' => $usuario->getPassword(),
    );
    return $this->execute($sql, $params);
  }

  public function search($alias, $password) {
    $sql = 'SELECT usu_id, rol_id, usu_cedula, usu_nombre, usu_apellido, usu_telefono, usu_alias, usu_password FROM ces_usuario WHERE usu_alias = :alias AND usu_password = :password';
    $params = array(
        ':alias' => $alias,
        ':password' => $password
    );
    return $this->query($sql, $params);
  }

  public function select() {
    $sql = 'SELECT usu_id, rol_id, usu_cedula, usu_nombre, usu_apellido, usu_telefono, usu_alias, usu_password FROM ces_usuario WHERE usu_deleted_at IS NULL';
    return $this->query($sql);
  }

  public function selectById($id) {
    $sql = 'usu_id, rol_id, usu_cedula, usu_nombre, usu_apellido, usu_telefono, usu_alias, usu_password FROM ces_usuario WHERE usu_id = :id';
    $params = array(
        ':id' => $id
    );
    return $this->query($sql, $params);
  }

  public function update(\usuario $usuario) {
    $sql = 'UPDATE ces_usuario SET rol_id = :rolId, usu_cedula = :cedula, usu_nombre = :nombre, usu_apellido = :apellido, usu_telefono = :telefono, usu_alias = :alias, usu_password = :password WHERE usu_id = :id';
    $params = array(
        ':rolId' => $usuario->getRolId(),
        ':cedula' => $usuario->getCedula(),
        ':nombre' => $usuario->getNombre(),
        ':apellido' => $usuario->getApellido(),
        ':telefono' => $usuario->getTelefono(),
        ':alias' => $usuario->getAlias(),
        ':password' => $usuario->getPassword($this->getConfig()->getHash()),
        ':id' => $usuario->getId()
    );
    return $this->execute($sql, $params);
  }

}