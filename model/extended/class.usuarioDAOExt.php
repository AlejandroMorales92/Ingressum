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
  
  public function reporteGeneralUsu() {
    $sql = "select u.usu_cedula, u.usu_nombre, u.usu_apellido,u.usu_telefono, u.usu_alias, r.rol_nombre "
            . "from ces_usuario as u, ces_rol as r "
            . "where u.usu_id = r.rol_id";
    return $this->query($sql);
  }

}
