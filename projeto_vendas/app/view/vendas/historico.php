<?php

    $url_api = 'http://localhost/prova/Atividade-Avaliacao_PHP/projeto_vendas/public/api.php?controller=venda&method=listar';

    $listaHistorico = [];

    try {
        $json_data = file_get_contents($url_api);

        if ($json_data === FALSE) {
            throw new Exception("Não foi possível acessar a API.");
        }

        $dados_api = json_decode($json_data);

        if ($dados_api === NULL && json_last_error() !== JSON_ERROR_NONE) {
            throw new Exception("Erro ao decodificar JSON: " . json_last_error_msg());
        }

        $listaHistorico = $dados_api;

    } catch (Exception $e) {
        error_log("Erro na API: " . $e->getMessage());
        $listaHistorico = [];
    }
    
?>    


<html>
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
                                <td><?php echo $venda->getId(); ?></td>
                                <td><?php echo $venda->getProdId(); ?></td>
                                <td><?php echo $venda->getQtd(); ?></td>
                                <td>R$ <?php echo number_format($venda->getValue(), 2, ',', '.'); ?></td>
                                <td><?php echo $venda->getDate(); ?></td>
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
</html>  