<?php

class SimpleFrontController {

  const DEFAULT_CONTROLLER = "IndexController";
  const DEFAULT_ACTION = "defaultAction";

  protected $controller = self::DEFAULT_CONTROLLER;
  protected $action = self::DEFAULT_ACTION;
  protected $params = array();
  public static $basePath = 'sisae/';

  public function __construct(array $options = array()) {
    
    if (empty($options)) {
      $this->parseUri();
    } else {
      if (isset($options["controller"])) {
        $this->setController($options["controller"]);
      }
      if (isset($options["action"])) {
        $this->setAction($options["action"]);
      }
      if (isset($options["params"])) {
        $this->setParams($options["params"]);
      }
    }
  }


  protected function parseUri() {
    
    $path = trim(parse_url($_SERVER["REQUEST_URI"], PHP_URL_PATH), "/");
//        $path = preg_replace('/[^a-zA-Z0-9]/', "", $path);
   
    if (strpos($path, SimpleFrontController::$basePath) === 0) {
      $path = substr($path, strlen(SimpleFrontController::$basePath));

    }
    $arr = explode("/", $path);

    if (count($arr) > 0) {
      $this->setController($arr[0]);
    }
    if (count($arr) > 1) {
      $this->setAction($arr[1]);
    }
    if (count($arr) > 2) {        
        for ($i = 2; $i<count($arr); $i++){
            $this->params [] = $arr[$i];
        }
    }
  }

  public function setController($controller) {
    $controller = ucfirst(strtolower($controller)) . "Controller";
    if (class_exists($controller)) {
      $this->controller = $controller;
    }
    return $this;
  }

  public function setAction($action) {
    $reflector = new ReflectionClass($this->controller);
    if ($reflector->hasMethod($action)) {
      $this->action = $action;
    }
    return $this;
  }

  public function getAction() {
    return $this->action;
  }

  public function setParams(array $params) {
    $this->params = $params;
    return $this;
  }

  public function run() {
//      var_dump($this->params);
    call_user_func_array(array(new $this->controller, $this->action), $this->params);
  }

}
