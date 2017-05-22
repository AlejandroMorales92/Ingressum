<?php

class agregarUsuario extends controllerExtended {

  public function main(\request $request) {
    try {
      $this->loadTableusuario();

      $usuario = new usuario();
      $usuario->setCedula($request->getParam('cedula'));
      $usuario->setNombre($request->getParam('nombre'));
      $usuario->setApellido($request->getParam('apellido'));
      $usuario->setTelefono($request->getParam('telefono'));
      $usuario->setAlias($request->getParam('alias'));
      $usuario->setRolId($request->getParam('rol'));
      $usuario->setPassword($request->getParam('contrasena'), $this->getConfig()->getHash());

      $usuarioDAO = new usuarioDAOExt($this->getConfig());
      $respuesta1 = $usuarioDAO->insert($usuario);
      $respuesta2 = array(
          'code' => ($respuesta1 > 0) ? 200 : 500,
          'datos' => $respuesta1
      );

      $this->setParam('rsp', $respuesta2);
      $this->setView('imprimirJson');
    } catch (Exception $exc) {
      echo $exc->getMessage();
    }
  }

  private function loadTableusuario() {
    require $this->getConfig()->getPath() . 'model/table/table.usuario.php';
    require $this->getConfig()->getPath() . 'model/interface/interface.usuario.php';
    require $this->getConfig()->getPath() . 'model/DAO/class.usuarioDAO.php';
    require $this->getConfig()->getPath() . 'model/extended/class.usuarioDAOExt.php';
  }

}