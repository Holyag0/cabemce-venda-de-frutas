<?php
/**
 * @var \App\View\AppView $this
 * @var iterable<\App\Model\Entity\Venda> $vendas
 */
?>
<div class="vendas index content">
    <?= $this->Html->link(__('New Venda'), ['action' => 'add'], ['class' => 'button float-right']) ?>
    <h3><?= __('Vendas') ?></h3>
    <div class="table-responsive">
        <table>
            <thead>
                <tr>
                    <th><?= $this->Paginator->sort('id') ?></th>
                    <th><?= $this->Paginator->sort('user_id') ?></th>
                    <th><?= $this->Paginator->sort('fruta_id') ?></th>
                    <th><?= $this->Paginator->sort('quantidade') ?></th>
                    <th><?= $this->Paginator->sort('desconto') ?></th>
                    <th><?= $this->Paginator->sort('valor_total') ?></th>
                    <th><?= $this->Paginator->sort('created') ?></th>
                    <th class="actions"><?= __('Actions') ?></th>
                </tr>
            </thead>
            <tbody>
                <?php foreach ($vendas as $venda): ?>
                <tr>
                    <td><?= $this->Number->format($venda->id) ?></td>
                    <td><?= $venda->hasValue('user') ? $this->Html->link($venda->user->nome, ['controller' => 'Users', 'action' => 'view', $venda->user->id]) : '' ?></td>
                    <td><?= $venda->hasValue('fruta') ? $this->Html->link($venda->fruta->nome, ['controller' => 'Frutas', 'action' => 'view', $venda->fruta->id]) : '' ?></td>
                    <td><?= $this->Number->format($venda->quantidade) ?></td>
                    <td><?= $this->Number->format($venda->desconto) ?></td>
                    <td><?= $this->Number->format($venda->valor_total) ?></td>
                    <td><?= h($venda->created) ?></td>
                    <td class="actions">
                        <?= $this->Html->link(__('View'), ['action' => 'view', $venda->id]) ?>
                        <?= $this->Html->link(__('Edit'), ['action' => 'edit', $venda->id]) ?>
                        <?= $this->Form->postLink(__('Delete'), ['action' => 'delete', $venda->id], ['confirm' => __('Are you sure you want to delete # {0}?', $venda->id)]) ?>
                    </td>
                </tr>
                <?php endforeach; ?>
            </tbody>
        </table>
    </div>
    <div class="paginator">
        <ul class="pagination">
            <?= $this->Paginator->first('<< ' . __('first')) ?>
            <?= $this->Paginator->prev('< ' . __('previous')) ?>
            <?= $this->Paginator->numbers() ?>
            <?= $this->Paginator->next(__('next') . ' >') ?>
            <?= $this->Paginator->last(__('last') . ' >>') ?>
        </ul>
        <p><?= $this->Paginator->counter(__('Page {{page}} of {{pages}}, showing {{current}} record(s) out of {{count}} total')) ?></p>
    </div>
</div>