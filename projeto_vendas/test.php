<?php
    require_once './config/path_config.php';
    require_once LOG_PATH;

    echo "Log inserido e erro de teste gerado";
    // Seu log customizado
    error_log('INFO: Este log foi inserido');

?>