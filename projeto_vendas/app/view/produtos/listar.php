<html>
    <main>
        <div class="divisao">

        <div class="cadastro">
            <h1>Realizar Compra:</h1>
            
                <form class="formulario" action="" method="POST">

                    <input type="hidden" name="nova_venda" value="1">

                    Selecione o Produto: 
                    <select name="prod_id">
                        <?php foreach ($listaProdutos as $produto): ?>
                            <option value="<?php echo htmlspecialchars($produto->getId()); ?>">
                                <?php echo htmlspecialchars($produto->getName()); ?>
                            </option>
                        <?php endforeach; ?>
                    </select>
                    
                    Quantidade de Produtos: <input type="number" name="qtd">

                    Data da Venda: <input type="date" name="date">

                    <div class="botao">
                        <button class="btn_salvar" type="submit">Comprar</button>
                    </div>
                    

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
                                <td><?php echo htmlspecialchars($produto->getId()); ?></td>
                                <td><?php echo htmlspecialchars($produto->getName()); ?></td>
                                <td>R$ <?php echo number_format($produto->getValue(), 2, ',', '.'); ?></td>
                                <td><?php echo htmlspecialchars($produto->getQtd()); ?></td>
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