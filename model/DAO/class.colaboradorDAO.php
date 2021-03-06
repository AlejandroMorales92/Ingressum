<?php

class colaboradorDAO extends dataSource implements IColaborador {

    public function delete($id, $logico = true) {
        if ($logico === true) {
            $sql = 'UPDATE ces_colaborador SET col_deleted_at = now() WHERE col_id = :id';
            $params = array(
                ':id' => $id
            );
            return $this->execute($sql, $params);
        } else if ($logico === false) {
            $sql = 'DELETE FROM ces_colaborador WHERE id = :id AND col_deleted_at IS NULL';
            $params = array(
                ':id' => (integer) $id
            );
            return $this->execute($sql, $params);
        }
    }

    public function insert(\colaborador $colaborador) {
        $sql = 'INSERT INTO ces_colaborador (col_cedula, col_nombre, col_apellido, col_categoria, col_telefono, col_direccion, col_correo) VALUES (:cedula, :nombre, :apellido, :categoria, :telefono, :direccion, :correo)';
        $params = array(
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

    public function search($cedula) {
        $sql = 'SELECT col_id, col_cedula, col_nombre, col_apellido, col_categoria,col_telefono, col_direccion, col_correo FROM ces_colaborador WHERE col_cedula = :cedula';
        $params = array(
            ':cedula' => $cedula
        );
        return $this->query($sql, $params);
    }

    public function select() {
        $sql = 'SELECT col_id, col_cedula, col_nombre, col_apellido, col_categoria, col_telefono, col_direccion, col_correo FROM ces_colaborador WHERE col_deleted_at IS NULL';
        return $this->query($sql);
    }

    public function selectById($id) {
        $sql = 'SELECT col_id, col_cedula, col_nombre, col_apellido, col_categoria, col_telefono, col_direccion, col_correo FROM ces_colaborador WHERE id = :id';
        $params = array(
            ':id' => $id
        );
        return $this->query($sql, $params);
    }

    public function update(\colaborador $colaborador) {
        $sql = 'UPDATE ces_colaborador SET col_cedula = :cedula, col_nombre = :nombre, col_apellido = :apellido, col_categoria = :categoria, col_telefono = :telefono, col_direccion = :direccion, col_correo = :correo WHERE col_id = :id';
        $params = array(
            ':cedula' => $colaborador->getCedula(),
            ':nombre' => $colaborador->getNombre(),
            ':apellido' => $colaborador->getApellido(),
            ':categoria' => $colaborador->getCategoria(),
            ':telefono' => $colaborador->getTelefono(),
            ':direccion' => $colaborador->getDireccion(),
            ':correo' => $colaborador->getCorreo(),
            ':id' => $colaborador->getId()
        );
        return $this->execute($sql, $params);
    }

}
