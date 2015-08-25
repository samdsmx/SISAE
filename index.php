<?php
session_start();
require_once './constantes.php';
require_once './autoload.php';
$controller = new SimpleFrontController();
$controller->run();

?>
