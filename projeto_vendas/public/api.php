<?php

  require_once __DIR__ . '/../config/path_config.php';

  //INCLUDE CONTROLADORES
  include_once CONTROLLER_PATH.'ProdutoController.php';
  include_once CONTROLLER_PATH.'VendaController.php';

  $controller = $_GET['controller'] ?? 'produto';
  $method = $_GET['method'] ?? 'listar'; 
  $controller_class = ucfirst($controller).'Controller';

  if( class_exists($controller_class) && method_exists($controller_class, $method) ){
    $controller_obj = new $controller_class();
    $controller_obj->$method();
  }
?>