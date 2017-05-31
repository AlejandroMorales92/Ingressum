<?php

class agregarColaborador extends controllerExtended {

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

      $validate = $this->validateData($colaborador);
      if ($validate['code'] === 300) {
        $this->setParam('rsp', $validate);
        $this->setView('imprimirJson');
      } else {
        $colaboradorDAO = new colaboradorDAOExt($this->getConfig());
        $respuesta1 = $colaboradorDAO->insert($colaborador);
        $respuesta2 = array(
            'code' => ($respuesta1 > 0) ? 200 : 500,
            'datos' => $respuesta1
        );

        $this->setParam('rsp', $respuesta2);
        $this->setView('imprimirJson');
      }
    } catch (Exception $exc) {
      $this->showException($exc);
    }
  }

  private function loadTablecolaborador() {
    require $this->getConfig()->getPath() . 'model/table/table.colaborador.php';
    require $this->getConfig()->getPath() . 'model/interface/interface.colaborador.php';
    require $this->getConfig()->getPath() . 'model/DAO/class.colaboradorDAO.php';
    require $this->getConfig()->getPath() . 'model/extended/class.colaboradorDAOExt.php';
  }

// Validaciones
  private function validateData(colaborador $colaborador) {
    $answer['code'] = 200;
    $colaboradorDAO = new colaboradorDAOExt($this->getConfig());



// Validación cedula
    if (is_integer((integer) $colaborador->getCedula()) === false) {
      $answer['code'] = 300;
      $answer['datos']['cedula'] = 'La cédula no es un número válido';
    } elseif (!preg_match('/^[0-9]+/', $colaborador->getCedula())) {
      $answer['code'] = 300;
      $answer['datos']['cedula'] = 'La cédula no es un número válido';
    } elseif (count($colaboradorDAO->search($colaborador->getCedula())) > 0) {
      $answer['code'] = 300;
      $answer['datos']['cedula'] = 'El número de cédula ya existe !!!';
    }

// Validación nombre
    $nombreLen = 100;
    if (strlen($colaborador->getNombre()) > $nombreLen) {
      $answer['code'] = 300;
      $answer['datos']['nombre'] = 'El número máximo de caracteres permitidos es ' . $nombreLen;
    } elseif (!preg_match('/^[a-z A-Z]+/', $colaborador->getNombre())) {
      $answer['code'] = 300;
      $answer['datos']['cedula'] = 'No es un nombre válido';
    }

// Validación apellido
    $apellidoLen = 100;
    if (strlen($colaborador->getApellido()) > $apellidoLen) {
      $answer['code'] = 300;
      $answer['datos']['apellido'] = 'El número máximo de caracteres permitidos es ' . $apellidoLen;
    }


// Validación categoria
    $categoriaLen = 100;
    if (strlen($colaborador->getCategoria()) > $categoriaLen) {
      $answer['code'] = 300;
      $answer['datos']['categoria'] = 'El número máximo de caracteres permitidos es ' . $categoriaLen;
      // preg_match('/hombre|mujer|marikita feo/', $subject)
    }



// Validación telefono
    $telefonoLen = 100;
    if (strlen($colaborador->getTelefono()) > $telefonoLen) {
      $answer['code'] = 300;
      $answer['datos']['telefono'] = 'El número máximo de caracteres permitidos es ' . $telefonoLen;
    }


// Validación direccion
    $direccionLen = 100;
    if (strlen($colaborador->getDireccion()) > $direccionLen) {
      $answer['code'] = 300;
      $answer['datos']['direccion'] = 'El número máximo de caracteres permitidos es ' . $direccionLen;
    }



// Validación correo
    $correoLen = 100;
    if (strlen($colaborador->getCorreo()) > $correoLen) {
      $answer['code'] = 300;
      $answer['datos']['direccion'] = 'El número máximo de caracteres permitidos es ' . $correoLen;
    } elseif (!filter_var($colaborador->getCorreo(), FILTER_VALIDATE_EMAIL)) {
      $answer['code'] = 300;
      $answer['datos']['correo'] = 'El correo no es válido';
    }

    return $answer;
  }

}
