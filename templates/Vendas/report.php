<?php
/**
 * @var \App\View\AppView $this
 * @var iterable<\App\Model\Entity\Venda> $vendas
 */
?>
<div class="vendas report content">
    <h3><?= __('Sales Report') ?></h3>
    <table>
        <thead>
            <tr>
                <th><?= __('Sale ID') ?></th>
                <th><?= __('Seller') ?></th>
                <th><?= __('Fruit') ?></th>
                <th><?= __('Quantity') ?></th>
                <th><?= __('Discount (%)') ?></th>
                <th><?= __('Total Value') ?></th>
                <th><?= __('Sale Time') ?></th>
            </tr>
        </thead>
        <tbody>
            <?php foreach ($vendas as $venda): ?>
            <tr>
                <td><?= $this->Number->format($venda->id) ?></td>
                <td><?= h($venda->user->nome) ?></td>
                <td><?= h($venda->fruta->nome) ?></td>
                <td><?= $this->Number->format($venda->quantidade) ?></td>
                <td><?= $this->Number->format($venda->desconto) ?></td>
                <td><?= $this->Number->format($venda->valor_total) ?></td>
                <td><?= h($venda->created->format('Y-m-d H:i:s')) ?></td>
            </tr>
            <?php endforeach; ?>
        </tbody>
    </table>
</div>
