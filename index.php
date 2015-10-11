<?php
session_start();
require_once './constantes.php';
require_once './autoload.php';
require './vendor/phpmailer/phpmailer/PHPMailerAutoload.php';
$controller = new SimpleFrontController();
$controller->run();

?>
