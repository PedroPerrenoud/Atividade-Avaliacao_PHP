<?php
  //INCLUDE CONTROLADORES
  include_once CONTROLLER_PATH.'ProdutoController.php';
  include_once CONTROLLER_PATH.'VendaController.php';

  $method = $_SERVER['REQUEST_METHOD'];
  $path_info = $_SERVER['PATH_INFO'] ?? '';

  $path_parts = explode('/', trim($path_info, '/'));
  $controller_class = ucfirst( $path_parts[0] )."Controller" ?? null;
  $method = $path_parts[1] ?? null;

  if( class_exists($controller_class) && method_exists($controller_class, $method) ){
    $controller_obj = new $controller_class();
    $controller_obj->$method();
  }

  header("Location: index.php")
?>