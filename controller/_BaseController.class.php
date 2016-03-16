<?php
/**
 * Description of _BaseController
 *
 * @author Israel
 */
class _BaseController {

  protected $needValidation;

  public function __construct($needValidation = false) {
    $this->needValidation = $needValidation;
  }

  public function defaultAction() {
    header('HTTP/1.0 404 Not Found');
    print 'Este lugar no existe - Te saliste de la matrix';
    die;
  }

  public function closeSession() {
    session_destroy();
    header("Location: http://" . SERVER_URL);
  }
  
  public function cerrarSesion (){
        session_destroy();
        header("Location: http://" . SERVER_URL);
    }

  public function validateUser() {
    if (!isset($_SESSION['usuario'])) {
      print 'No tienes permisos para estar aqui';
      $button = new html_element('a');
      $button ->set('href', '/sisae/index/login');      
      $button ->set('text', 'Click here!');
      $button ->output();
      die;
    }
  }
  
  public function getOpciones($dao, $id, $descripcion) {
      
        $elementos = $dao->queryAll();
      
        $opciones = array();

        foreach ($elementos as $elemento) {            
            $opciones[$elemento->$id] = $elemento->$descripcion;
        }
        return $opciones;
    }
    
    public function getOpcionesOrder($dao, $id, $descripcion, $campo) {
        $elementos = $dao->queryAllOrderBy($campo);
        
        $opciones = array();

        foreach ($elementos as $elemento) {            
            $opciones[$elemento->$id] = $elemento->$descripcion;
        }
        return $opciones;
    }

    public function redirect ($url){
        header("Location: http://" . SERVER_URL . $url);
        exit ();
    }
}
