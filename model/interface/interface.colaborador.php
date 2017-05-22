<?php

interface IColaborador {

    public function select();

    public function selectById($id);

    public function insert(colaborador $colaborador);

    public function update(colaborador $colaborador);

    public function delete($id);

    public function search($cedula);
}