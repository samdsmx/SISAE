<?php
session_start();
require_once './constantes.php';
require_once './autoload.php';
require './vendor/phpmailer/phpmailer/PHPMailerAutoload.php';
ini_set('display_errors', 1); 
error_reporting(E_ALL);
$controller = new SimpleFrontController();
$controller->run();

?>
