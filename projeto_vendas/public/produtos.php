<?php
    require_once __DIR__ . '/../config/path_config.php';
?>

<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Produtos</title>
    <link rel="stylesheet" href="<?php echo CSS_URL.'style.css'; ?>">
</head>
<body>

    <?php include VIEW_PATH . 'template/header.php'; ?>
    <?php include VIEW_PATH . 'produtos/listar.php'; ?>
    <?php include VIEW_PATH . 'template/footer.php'; ?>
    
</body>
</html>