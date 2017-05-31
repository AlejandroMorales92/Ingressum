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




      $validate = $this->validateData($colaborador);
      if ($validate['code'] === 300) {
        $this->setParam('rsp', $validate);
        $this->setView('imprimirJson');
      } else {
        $usuarioDAO = new usuarioDAOExt($this->getConfig());
        $respuesta1 = $usuarioDAO->insert($usuario);
        $respuesta2 = array(
            'code' => ($respuesta1 > 0) ? 200 : 500,
            'datos' => $respuesta1
        );

        $this->setParam('rsp', $respuesta2);
        $this->setView('imprimirJson');
      }
    } catch (Exception $exc) {
//      echo $exc->getMessage();
      $this->showException($exc);
    }
  }

  private function loadTableusuario() {
    require $this->getConfig()->getPath() . 'model/table/table.usuario.php';
    require $this->getConfig()->getPath() . 'model/interface/interface.usuario.php';
    require $this->getConfig()->getPath() . 'model/DAO/class.usuarioDAO.php';
    require $this->getConfig()->getPath() . 'model/extended/class.usuarioDAOExt.php';
  }

  //Validaciones
  private function validateData(usuario $usuario) {
    $answer['code'] = 200;
    $usuarioDAO = new usuarioDAOExt($this->getConfig());



    // Validación cedula
    if (is_integer((integer) $usuario->getCedula()) === false) {
      $answer['code'] = 300;
      $answer['datos']['cedula'] = 'La cédula no es un número válido';
    } elseif (!preg_match('/^[0-9]+/', $colaborador->getCedula())) {
      $answer['code'] = 300;
      $answer['datos']['cedula'] = 'La cédula no es un número válido';
    } elseif (count($usuarioDAO->search($usuario->getCedula())) > 0) {
      $answer['code'] = 300;
      $answer['datos']['cedula'] = 'El número de cédula ya existe !!!';
    }



    // Validación nombre
    $nombreLen = 100;
    if (strlen($usuario->getNombre()) > $nombreLen) {
      $answer['code'] = 300;
      $answer['datos']['nombre'] = 'El número máximo de caracteres permitidos es ' . $nombreLen;
    } elseif (!preg_match('/^[a-z A-Z]+/', $usuario->getNombre())) {
      $answer['code'] = 300;
      $answer['datos']['nombre'] = 'No es un nombre válido';
    }


    // Validación apellido
    $apellidoLen = 100;
    if (strlen($usuario->getApellido()) > $apellidoLen) {
      $answer['code'] = 300;
      $answer['datos']['apellido'] = 'El número máximo de caracteres permitidos es ' . $apellidoLen;
    } elseif (!preg_match('/^[a-z A-Z]+/', $usuario->getApellido())) {
      $answer['code'] = 300;
      $answer['datos']['apellido'] = 'No es un apellido válido';
    }


    // Validación telefono
    $telefonoLen = 100;
    if (strlen($usuario->getTelefono()) > $telefonoLen) {
      $answer['code'] = 300;
      $answer['datos']['telefono'] = 'El número máximo de caracteres permitidos es ' . $telefonoLen;
    } elseif (!preg_match('/^[0-9]+/', $usuario->getTelefono())) {
      $answer['code'] = 300;
      $answer['datos']['telefono'] = 'El Teléfono no es un número válido';
    }



    // Validación alias
    $aliasLen = 100;
    if (strlen($usuario->getAlias()) > $aliasLen) {
      $answer['code'] = 300;
      $answer['datos']['alias'] = 'El número máximo de caracteres permitidos es ' . $aliasLen;
    }


    // Validación password
    $passwordLen = 100;
    if (strlen($usuario->getPassword()) > $passwordLen) {
      $answer['code'] = 300;
      $answer['datos']['password'] = 'El número máximo de caracteres permitidos es ' . $passwordLen;
    }

    // Validación Rol
    $rolLen = 100;
    if (strlen($usuario->getRolId()) > $rolLen) {
      $answer['code'] = 300;
      $answer['datos']['rol'] = 'El número máximo de caracteres permitidos es ' . $rolLen;
    }

    return $answer;
  }

}
