<?php

/* 

require_once '../../model/Produto.php';

session_start();

$listaProdutos = Produto::listar(); // >>> exemplo 

*/

?>


<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Produtos</title>
    <link rel="stylesheet" href="../css/style.css">
</head>
<body>

    <?php include '../template/header.php'; ?>

    <main>
        <div class="divisao">

        <div class="cadastro">
            <h1>Realizar Compra:</h1>
            
                <form class="formulario" action="" method="POST">
                    <input type="hidden" name="cadastrar_compra" value="1">

                    Selecione o Produto: 
                    <select name="id_produto">
                        <?php foreach ($listaProdutos as $produto): ?>
                            <option value="<?php echo $produto->getId(); ?>">
                                <?php echo htmlspecialchars($produto->getNome()); ?>
                            </option>
                        <?php endforeach; ?>
                    </select>
                    
                    Quantidade: <input type="number" name="qtd_produto">

                    Total: <input type="number" step='0.01' name="total_compra"> <!-- atualizar automaticament o valor -->

                    <button class="btn_salvar" type="submit">Comprar</button>
                </form>

        </div>


        <div class="tabela">
            <h1>Tabela de Produtos</h1>

            <?php if (count($listaProdutos) > 0): ?>

                <table>

                    <thead><tr>
                            <th>ID</th>
                            <th>Nome</th>
                            <th>Valor(R$)</th>
                            <th>Qtd Estoque</th>
                    </tr></thead>

                    <tbody>
                        <?php foreach ($listaProdutos as $produto): ?>
                            <tr>
                                <td><?php echo $produto->getId(); ?></td>
                                <td><?php echo $produto->getNome(); ?></td>
                                <td>R$ <?php echo number_format($fun->getValor(), 2, ',', '.'); ?></td>
                                <td><?php echo $produto->getEstoque(); ?></td>
                            </tr>
                        <?php endforeach; ?>
                    </tbody>

                </table>

            <?php else: ?>
                <p>Nenhum produto cadastrado.</p>
            <?php endif; ?> 
        </div>

        </div>
    </main>

    <?php include '../template/footer.php'; ?>
    
</body>
</html>