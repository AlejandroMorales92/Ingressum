<?php

class buscarColaborador extends controllerExtended {

  public function main(\request $request) {
    try {
      $this->loadTablecolaborador();


      $colaborador = $request->getParam('persona');
      $colaboradorDAO = new colaboradorDAOExt($this->getConfig());
      $respuesta1 = $colaboradorDAO->buscar($colaborador);

      $respuesta2 = array(
          'code' => (count($respuesta1) > 0) ? 200 : 500,
          'colaboradores' => $respuesta1
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
