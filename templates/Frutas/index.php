<?php
/**
 * @var \App\View\AppView $this
 * @var iterable<\App\Model\Entity\Fruta> $frutas
 */
?>
<div class="frutas index content">
    <?= $this->Html->link(__('New Fruta'), ['action' => 'add'], ['class' => 'button float-right']) ?>
    <h3><?= __('Frutas') ?></h3>
    <div class="table-responsive">
        <table>
            <thead>
                <tr>
                    <th><?= $this->Paginator->sort('id') ?></th>
                    <th><?= $this->Paginator->sort('nome') ?></th>
                    <th><?= $this->Paginator->sort('classificacao') ?></th>
                    <th><?= $this->Paginator->sort('fresca') ?></th>
                    <th><?= $this->Paginator->sort('quantidade') ?></th>
                    <th><?= $this->Paginator->sort('valor') ?></th>
                    <th><?= $this->Paginator->sort('created') ?></th>
                    <th><?= $this->Paginator->sort('modified') ?></th>
                    <th class="actions"><?= __('Actions') ?></th>
                </tr>
            </thead>
            <tbody>
                <?php foreach ($frutas as $fruta): ?>
                <tr>
                    <td><?= $this->Number->format($fruta->id) ?></td>
                    <td><?= h($fruta->nome) ?></td>
                    <td><?= h($fruta->classificacao) ?></td>
                    <td><?= h($fruta->fresca) ?></td>
                    <td><?= $this->Number->format($fruta->quantidade) ?></td>
                    <td><?= $this->Number->format($fruta->valor) ?></td>
                    <td><?= h($fruta->created) ?></td>
                    <td><?= h($fruta->modified) ?></td>
                    <td class="actions">
                        <?= $this->Html->link(__('View'), ['action' => 'view', $fruta->id]) ?>
                        <?= $this->Html->link(__('Edit'), ['action' => 'edit', $fruta->id]) ?>
                        <?= $this->Form->postLink(__('Delete'), ['action' => 'delete', $fruta->id],
                        ['confirm' => __('Are you sure you want to delete # {0}?', $fruta->id)]) ?>
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