<?php

class usuarioDAOExt extends usuarioDAO {

  public function buscar($usuario, $contrasena) {
    $sql = 'SELECT usu_id, rol_id, usu_cedula, usu_nombre, usu_apellido, usu_telefono, usu_alias, usu_password FROM ces_usuario WHERE usu_alias = :alias AND usu_password = :password';
    $params = array(
        ':alias' => $usuario,
        ':password' => $contrasena,
    );
    
    return $this->query($sql, $params);
  }

}
