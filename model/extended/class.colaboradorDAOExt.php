<?php

class colaboradorDAOExt extends colaboradorDAO {
    
    public function agregar(\colaborador $colaborador) {
    $sql = 'INSERT INTO ces_colaborador (col_id, col_cedula, col_nombre, col_apellido, col_categoria, col_telefono, col_direccion, col_correo) VALUES (:id, :cedula, :nombre, :apellido, :categoria, :telefono, :direccion, :correo)';
    $params = array(
        ':id' => $colaborador->getId(),
        ':cedula' => $colaborador->getCedula(),
        ':nombre' => $colaborador->getNombre(),
        ':apellido' => $colaborador->getApellido(),
        ':categoria' => $colaborador->getCategoria(),
        ':telefono' => $colaborador->getTelefono(),
        ':direccion' => $colaborador->getDireccion(),
        ':correo' => $colaborador->getCorreo(),
    );
    return $this->execute($sql, $params);
  }
}
