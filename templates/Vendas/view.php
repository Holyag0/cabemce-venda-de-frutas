<?php
/**
 * @var \App\View\AppView $this
 * @var \App\Model\Entity\Venda $venda
 */
?>
<div class="row">
    <aside class="column">
        <div class="side-nav">
            <h4 class="heading"><?= __('Actions') ?></h4>
            <?= $this->Html->link(__('Edit Venda'), ['action' => 'edit', $venda->id], ['class' => 'side-nav-item']) ?>
            <?= $this->Form->postLink(__('Delete Venda'), ['action' => 'delete', $venda->id], ['confirm' => __('Are you sure you want to delete # {0}?', $venda->id), 'class' => 'side-nav-item']) ?>
            <?= $this->Html->link(__('List Vendas'), ['action' => 'index'], ['class' => 'side-nav-item']) ?>
            <?= $this->Html->link(__('New Venda'), ['action' => 'add'], ['class' => 'side-nav-item']) ?>
        </div>
    </aside>
    <div class="column column-80">
        <div class="vendas view content">
            <h3><?= h($venda->id) ?></h3>
            <table>
                <tr>
                    <th><?= __('User') ?></th>
                    <td><?= $venda->hasValue('user') ? $this->Html->link($venda->user->nome, ['controller' => 'Users', 'action' => 'view', $venda->user->id]) : '' ?></td>
                </tr>
                <tr>
                    <th><?= __('Fruta') ?></th>
                    <td><?= $venda->hasValue('fruta') ? $this->Html->link($venda->fruta->nome, ['controller' => 'Frutas', 'action' => 'view', $venda->fruta->id]) : '' ?></td>
                </tr>
                <tr>
                    <th><?= __('Id') ?></th>
                    <td><?= $this->Number->format($venda->id) ?></td>
                </tr>
                <tr>
                    <th><?= __('Quantidade') ?></th>
                    <td><?= $this->Number->format($venda->quantidade) ?></td>
                </tr>
                <tr>
                    <th><?= __('Desconto') ?></th>
                    <td><?= $this->Number->format($venda->desconto) ?></td>
                </tr>
                <tr>
                    <th><?= __('Valor Total') ?></th>
                    <td><?= $this->Number->format($venda->valor_total) ?></td>
                </tr>
                <tr>
                    <th><?= __('Created') ?></th>
                    <td><?= h($venda->created) ?></td>
                </tr>
            </table>
        </div>
    </div>
</div>