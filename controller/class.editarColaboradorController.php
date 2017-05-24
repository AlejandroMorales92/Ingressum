<?php

class editarColaborador extends controllerExtended {

  public function main(\request $request) {
    try {
      $this->loadTablecolaborador();

      $colaborador = new colaborador();
      $colaborador->setCedula($request->getParam('cedula'));
      $colaborador->setNombre($request->getParam('nombre'));
      $colaborador->setApellido($request->getParam('apellido'));
      $colaborador->setCategoria($request->getParam('categoria'));
      $colaborador->setTelefono($request->getParam('telefono'));
      $colaborador->setDireccion($request->getParam('direccion'));
      $colaborador->setCorreo($request->getParam('correo'));
      $colaborador->setId($request->getParam('id'));

      $colaboradorDAO = new colaboradorDAOExt($this->getConfig());
      $respuesta1 = $colaboradorDAO->update($colaborador);
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

  private function loadTablecolaborador() {
    require $this->getConfig()->getPath() . 'model/table/table.colaborador.php';
    require $this->getConfig()->getPath() . 'model/interface/interface.colaborador.php';
    require $this->getConfig()->getPath() . 'model/DAO/class.colaboradorDAO.php';
    require $this->getConfig()->getPath() . 'model/extended/class.colaboradorDAOExt.php';
  }

}