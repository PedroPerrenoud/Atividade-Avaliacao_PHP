<?php
    require_once __DIR__ . '/../config/path_config.php';
?>

<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Inicio</title>
    <link rel="stylesheet" href="<?php echo CSS_URL.'style.css'; ?>">
</head>
<body>
    
    <?php include VIEW_PATH . 'template/header.php'; ?>

    <main>
        <div>
            <h1>Página Principal</h1>
            
            <p>Bem-vindo!</p>
        </div>
        
    </main>

    <?php include VIEW_PATH . 'template/footer.php'; ?>

</body>
</html>