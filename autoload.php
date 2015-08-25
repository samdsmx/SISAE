<?php

/**
 * Arreglo de directorios dónde se buscarán las clases del autoload.
 */
$paths = array(
    'util/',
    'model/core/',
    'model/dao/',
    'model/dto/',
    'model/mysql/',
    'model/mysql/ext/',
    'model/sql/',
    'controller/',
);

/**
 * Se registra la función autoload
 */
spl_autoload_register('autoload');

/**
 * Función de autocarga de clases. Para cargar las clases del API, se establece 
 * un directorio de autocarga. Los archivos primero se buscan en ese directorio
 * antes de hacer el barrido por los directorios del arreglo. Si el archivo se 
 * encuentra en el directorio de autocarga de la sesión, o en algún directorio
 * del arreglo, se incluye el archivo para que se realice la carga de la clase
 * correctamente.
 * 
 * @global array $paths Arreglo de directorios dónde se buscan las clases
 * @param type $class Nombre de la clase que se trata de autocargar
 */
function autoload($class) {
  global $paths;
  //$root = $_SERVER['DOCUMENT_ROOT'];
  $root = __DIR__;
  if (isset ($_SESSION['autoload_dir'])){
    $file = $root . "/" . $_SESSION['autoload_dir'] . $class . '.class.php';
    if (file_exists($file)) {
      include $file;
      return;
    }
  }
  foreach ($paths as $path) {    
    $file = $root . "/" . $path . $class . '.class.php';
//    print $file . '<br>';
    if (file_exists($file)) {
      include $file;
      return;
    }
  }
}
