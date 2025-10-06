<html>
    <main>
        <div class="divisao">

        <div class="tabela" style="width: 90%;">
            <h1>Histórico de Vendas</h1>

            <?php if (count($listaHistorico) > 0): ?>

                <table>

                    <thead><tr>
                            <th>ID do Produto</th>
                            <th>Produto</th>
                            <th>Quantidade</th>
                            <th>Valor Total(R$)</th>
                            <th>Data</th>
                    </tr></thead>

                    <tbody>
                        <!-- $listaHistorico === array associativo -->
                        <?php foreach ($listaHistorico as $venda): ?>
                            <tr>
                                <td><?php echo htmlspecialchars($venda['prodId']); ?></td>
                                <td><?php echo htmlspecialchars($venda['prodName']); ?></td>
                                <td><?php echo htmlspecialchars($venda['qtd']); ?></td>
                                <td>R$ <?php echo number_format($venda['value'], 2, ',', '.'); ?></td>
                                <td><?php echo date('d/m/Y H:i:s', strtotime($venda['date'])); ?></td>
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