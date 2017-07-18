<?php

class controlDAOExt extends controlDAO {

  public function reporteGeneralPersonal() {
    $sql = "select c.cot_fecha_entrada, c.cot_fecha_salida, co.col_cedula, co.col_nombre, co.col_apellido, co.col_categoria "
            . "from ces_control as c, ces_colaborador as co "
            . "where c.cot_id = co.col_id "
            . "and c.usu_id_salida is null "
            . "and c.cot_fecha_salida is null";
    return $this->query($sql);
  }

  public function reportePorPersona($cedula) {
    $sql = "select c.cot_fecha_entrada, c.cot_fecha_salida, co.col_cedula, co.col_nombre, co.col_apellido, co.col_categoria "
            . "from ces_control as c, ces_colaborador as co "
            . "where c.cot_id = co.col_id "
            . "and co.col_cedula = :cedula";
    $params = array(
        ':cedula' => (string) $cedula
    );
    return $this->query($sql, $params);
  }

  public function reportePorFecha($fechaInicial, $fechaFinal) {
    $sql = "select c.cot_fecha_entrada, c.cot_fecha_salida, co.col_cedula, co.col_nombre, co.col_apellido, co.col_categoria
            from ces_control as c, ces_colaborador as co
            where c.cot_id = co.col_id
            AND (c.cot_fecha_entrada >= :fechaInicial AND c.cot_fecha_salida <= :fechaFinal
            OR c.cot_fecha_entrada >= :fechaInicial AND c.cot_fecha_salida IS NULL)";
    $params = array(
        ':fechaInicial' => $fechaInicial,
        ':fechaFinal' => $fechaFinal
    );
    return $this->query($sql, $params);
  }

  public function reportePorFechayHora($fecha, $HoraInicial, $HoraFinal) {
    $sql = "select c.cot_fecha_entrada, c.cot_fecha_salida, co.col_cedula, co.col_nombre, co.col_apellido, co.col_categoria
            from ces_control as c, ces_colaborador as co
            where c.cot_id = co.col_id
            AND c.cot_fecha_entrada = :fecha AND ((c.cot_fecha_entrada >= :horaInicial AND c.cot_fecha_salida <= :horaFinal) OR (c.cot_fecha_entrada >= :horaInicial AND c.cot_fecha_salida IS NULL))";
    $params = array(
        ':fecha' => $fecha,
        ':horaInicial' => $HoraInicial,
        ':horaFinal' => $HoraFinal
    );
    return $this->query($sql, $params);
  }

  public function reporteGeneralPersonalCategoria($categoria) {
    $sql = "select c.cot_fecha_entrada, c.cot_fecha_salida, co.col_cedula, co.col_nombre, co.col_apellido, co.col_categoria "
            . "from ces_control as c, ces_colaborador as co "
            . "where c.cot_id = co.col_id "
            . "and co.col.categoria = :categoria "
            . "and c.usu_id_salida is null "
            . "and c.cot_fecha_salida is null";
    $params = array(
        ':categoria' => $categoria
    );
    return $this->query($sql, $params);
  }

  public function reportePorFechaCategoria($fechaInicialC, $fechaFinalC, $categoria) {
    $sql = "select c.cot_fecha_entrada, c.cot_fecha_salida, co.col_cedula, co.col_nombre, co.col_apellido, co.col_categoria 
            from ces_control as c, ces_colaborador as co 
            where c.cot_id = co.col_id 
            AND ((c.cot_fecha_entrada >= :fechaInicialC AND c.cot_fecha_salida <= :fechaFinalC AND co.col_categoria = :categoria) 
            OR (c.cot_fecha_entrada >= :fechaInicialC AND c.cot_fecha_salida IS NULL))";
    $params = array(
        ':fechaInicialC' => $fechaInicialC,
        ':fechaFinalC' => $fechaFinalC,
        ':categoria' => $categoria
    );
    return $this->query($sql, $params);
  }

}
