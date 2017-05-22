<?php

class obtenerColaborador extends controllerExtended {

  public function main(\request $request) {
    try {
      $this->loadTablecolaborador();

      $colaboradorDAO = new colaboradorDAOExt($this->getConfig());
      $respuesta1 = $colaboradorDAO->select();
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

