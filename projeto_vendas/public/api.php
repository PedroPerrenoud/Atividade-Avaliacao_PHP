<?php

  require_once __DIR__ . '/../config/path_config.php';
  require_once LOG_PATH;

  //INCLUDE CONTROLADORES
  include_once CONTROLLER_PATH.'ProdutoController.php';
  include_once CONTROLLER_PATH.'VendaController.php';
  error_log("INFO: Acessando api...");

  $controller = $_GET['controller'] ?? 'produto';
  $method = $_GET['method'] ?? 'listar'; 
  $controller_class = ucfirst($controller).'Controller';
  error_log( "INFO: controller[ ".$controller." ] | metodo[ ".$method." ]" );

  if( class_exists($controller_class) && method_exists($controller_class, $method) ){
    $controller_obj = new $controller_class();
    $controller_obj->$method();
    error_log( "INFO: Acessando ".$controller_class."->".$method."()" );
  }
?>