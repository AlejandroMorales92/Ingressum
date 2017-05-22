<?php

$config = new myConfig();
$config->setPath('C:/xampp/htdocs/Ingressum/');

$config->setDrive('pgsql');
$config->setHost('localhost');
$config->setPort(5432);
$config->setUser('postgres');
$config->setPassword('123');
$config->setDbname('control_entrada_salida');
$config->setHash('md5');

$config->setUrl('http://localhost/Ingressum/www/');