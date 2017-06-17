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

  public function buscar($cedula) {
    $sql = 'SELECT col_id, col_cedula, col_nombre, col_apellido, col_categoria,col_telefono, col_direccion, col_correo FROM ces_colaborador WHERE col_cedula LIKE :cedula OR col_nombre LIKE :cedula OR col_telefono LIKE :cedula AND col_deleted_at IS NULL';
    $params = array(
        ':cedula' => '%' . $cedula,
        ':cedula' => '%' . $cedula,
        ':cedula' => '%' . $cedula . '%'
    );
    return $this->query($sql, $params);
  }

}
