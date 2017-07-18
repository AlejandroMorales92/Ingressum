<?php

class obtenerRepPorFechayHora extends controllerExtended {

  public function main(\request $request) {
    try {
      $this->loadTablecontrol();

      $controlDAO = new controlDAOExt($this->getConfig());
      $respuesta1 = $controlDAO->reportePorFechayHora($request->getParam('fecha'), $request->getParam('HoraInicial'), $request->getParam('HoraFinal'));
      $respuesta2 = array(
          'code' => (count($respuesta1) > 0) ? 200 : 500,
          'datos' => $respuesta1
      );

      $this->setParam('rsp', $respuesta2);
      $this->setView('imprimirJson');
    } catch (Exception $exc) {
      echo $exc->getMessage();
    }
  }

  private function loadTablecontrol() {
    require $this->getConfig()->getPath() . 'model/table/table.control.php';
    require $this->getConfig()->getPath() . 'model/interface/interface.control.php';
    require $this->getConfig()->getPath() . 'model/DAO/class.controlDAO.php';
    require $this->getConfig()->getPath() . 'model/extended/class.controlDAOExt.php';
  }

}

