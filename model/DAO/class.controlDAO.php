<?php

class controlDAO extends dataSource implements IControl {

  public function delete($id) {
    $sql = 'DELETE FROM ces_control WHERE cot_id = :id';
    $params = array(
        ':id' => $id
    );
    return $this->execute($sql, $params);
  }

  public function insert(\control $control) {
    $sql = 'INSERT INTO ces_control (col_id,cot_vehiculo,cot_placa,cot_observacion,cot_fecha_entrada,cot_fecha_salida,usu_id_entrada,usu_id_salida) VALUES (:col_id,:vehiculo,:placa,:observacion,:fecha_entrada,:fecha_salida,:usu_entrada,:usu_salida';
    $params = array(
        ':col_id' => $control->getColId(),
        ':vehiculo' => $control->getVehiculo(),
        ':placa' => $control->getPlaca(),
        ':observacion' => $control->getObservacion(),
        ':fecha_entrada' => $control->getFechaEntrada(),
        ':fecha_salida' => $control->getFechaSalida(),
        ':usu_entrada' => $control->getUsuIdEntrada(),
        ':usu_salida' => $control->getUsuIdSalida(),
    );
    return $this->execute($sql, $params);
  }

  public function search($user, $password) {
    $sql = 'SELECT cot_id,cot_vehiculo,cot_placa,cot_observacion,cot_fecha_entrada,cot_fecha_salida,usu_id_entrada,usu_id_salida,cot_created_at,cot_updated_at,cot_deleted_at FROM ces_control WHERE col_id = :id ';
    $params = array(
        ':id' => $id
    );
    return $this->query($sql, $params);
  }

  public function select() {
    $sql = 'SELECT cot_id,cot_vehiculo,cot_placa,cot_observacion,cot_fecha_entrada,cot_fecha_salida,usu_id_entrada,usu_id_salida FROM ces_control';
    return $this->query($sql);
  }

  public function selectById($id) {
    $sql = 'SELECT cot_id,cot_vehiculo,cot_placa,cot_observacion,cot_fecha_entrada,cot_fecha_salida FROM usuario WHERE cot_id = :id';
    $params = array(
        ':id' => $id
    );
    return $this->query($sql, $params);
  }

  public function update(\control $control) {
    $sql = 'UPDATE ces_control SET cot_vehiculo = :vehiculo, cot_placa = :placa, cot_observacion=:observacion,cot_fecha_entrada=:fecha_entrada,cot_fecha_salida=:fecha_salida,usu_id_entrada=:usu_entrada,usu_id_salida=:usu_salida WHERE cot_id = :id';
    $params = array(
        ':col_id' => $control->getColId(),
        ':vehiculo' => $control->getVehiculo(),
        ':placa' => $control->getPlaca(),
        ':observacion' => $control->getObservacion(),
        ':fecha_entrada' => $control->getFechaEntrada(),
        ':fecha_salida' => $control->getFechaSalida(),
        ':usu_entrada' => $control->getUsuIdEntrada(),
        ':usu_salida' => $control->getUsuIdSalida()
    );
    $this->execute($sql, $params);
  }

}
