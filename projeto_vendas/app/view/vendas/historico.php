<?php

/* 

require_once '../../model/Venda.php';

session_start();

$listaHistorico = Venda::listar(); // >>> exemplo 

*/

?>


<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Histórico</title>
    <link rel="stylesheet" href="../css/style.css">
</head>
<body>

    <?php include '../template/header.php'; ?>

    <main>
        <div class="divisao">

        <div class="tabela">
            <h1>Histórico de Vendas</h1>

            <?php if (count($listaHistorico) > 0): ?>

                <table>

                    <thead><tr>
                            <th>ID</th>
                            <th>Produto</th>
                            <th>Quantidade</th>
                            <th>Valor Total(R$)</th>
                            <th>Data</th>
                    </tr></thead>

                    <tbody>
                        <?php foreach ($historico as $venda): ?>
                            <tr>
                                <td><?php echo $produto->getId(); ?></td>
                                <td><?php echo $produto->getNomeProduto(); ?></td>
                                <td><?php echo $produto->getQuantidade(); ?></td>
                                <td>R$ <?php echo number_format($fun->getTotal(), 2, ',', '.'); ?></td>
                                <td><?php echo $produto->getData(); ?></td>
                            </tr>
                        <?php endforeach; ?>
                    </tbody>

                </table>

            <?php else: ?>
                <p>Nenhuma venda efetuada.</p>
            <?php endif; ?> 
        </div>

        </div>
    </main>

    <?php include '../template/footer.php'; ?>
    
</body>
</html>