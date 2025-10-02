<?php

    $url_api = 'http://localhost/prova/Atividade-Avaliacao_PHP/projeto_vendas/public/api.php?controller=produto&method=listar';

    $listaProdutos = [];

    try {
        $json_data = file_get_contents($url_api);

        if ($json_data === FALSE) {
            throw new Exception("Não foi possível acessar a API.");
        }

        $dados_api = json_decode($json_data);

        if ($dados_api === NULL && json_last_error() !== JSON_ERROR_NONE) {
            throw new Exception("Erro ao decodificar JSON: " . json_last_error_msg());
        }

        $listaProdutos = $dados_api;

    } catch (Exception $e) {
        error_log("Erro na API: " . $e->getMessage());
        $listaProdutos = [];
    }

    echo "<script> console.log( ".$id." ) </script>";

?>

<html>
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
                                <td><?php echo $id; ?></td>
                                <td><?php echo $name; ?></td>
                                <td>R$ <?php echo number_format($value, 2, ',', '.'); ?></td>
                                <td><?php echo $qtd; ?></td>
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
</html>