<?php

interface IControl {

    public function select();

    public function selectById($id);

    public function insert(control $Control);

    public function update(control $Control);

    public function delete($id);

    public function search($user, $password);
}

