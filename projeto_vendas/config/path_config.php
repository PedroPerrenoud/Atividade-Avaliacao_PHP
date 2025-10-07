<?php

  // Caminho base
  define( 'BASE_PATH', dirname(__DIR__) . DIRECTORY_SEPARATOR );
  // Caminho base url
  define( 'URL_BASE', '/Atividade-Avaliacao_PHP/projeto_vendas/' );

  define( 'CONTROLLER_PATH', BASE_PATH . "app" . DIRECTORY_SEPARATOR . "controller" . DIRECTORY_SEPARATOR );
  define( 'MODEL_PATH', BASE_PATH . "app" . DIRECTORY_SEPARATOR . "model" . DIRECTORY_SEPARATOR );
  define( 'VIEW_PATH', BASE_PATH . "app" . DIRECTORY_SEPARATOR . "view" . DIRECTORY_SEPARATOR );
  define( 'DATABASE_PATH', BASE_PATH . "config" . DIRECTORY_SEPARATOR . "database.php" );
  define( 'LOG_PATH', BASE_PATH . "config" . DIRECTORY_SEPARATOR . "log_config.php" );
  define( 'ERROR_LOG_PATH', BASE_PATH . "config" . DIRECTORY_SEPARATOR . "php_error.log" );

  define( 'PUBLIC_PATH', BASE_PATH . 'public' . DIRECTORY_SEPARATOR );
  define( 'PUBLIC_URL', URL_BASE . 'public/');

  define( 'INDEX_PATH', BASE_PATH . 'public/index.php' );
  define( 'INDEX_URL', URL_BASE . 'public/index.php' ); 

  define( 'API_PATH', URL_BASE . 'public/api.php' );
  define( 'CSS_URL', URL_BASE . 'app/view/css/' );

  
 
?>