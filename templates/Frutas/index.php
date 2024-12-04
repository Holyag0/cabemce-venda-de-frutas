<?php

/**
 * @var \App\View\AppView $this
 * @var iterable<\App\Model\Entity\Fruta> $frutas
 */
?>
<div class="frutas index content">
    <?= $this->Html->link(__('New Fruit'), ['action' => 'add'], ['class' => 'button float-right']) ?>
    <h3><?= __('Fruits') ?></h3>

    <?= $this->Form->create(null, ['type' => 'get']) ?>
    <?= $this->Form->control('q', ['label' => 'Search by Name', 'value' => $this->request->getQuery('q')]) ?>
    <?= $this->Form->submit(__('Search')) ?>
    <?= $this->Form->end() ?>

    <?= $this->Form->create(null, ['type' => 'get']) ?>
    <?= $this->Form->control('classificacao', [
        'type' => 'select',
        'options' => ['Extra' => 'Extra', 'Primeira' => 'Primeira', 'Segunda' => 'Segunda', 'Terceira' => 'Terceira'],
        'label' => 'Classification',
        'empty' => 'Choose one',
        'value' => $this->request->getQuery('classificacao')
    ]) ?>
    <?= $this->Form->control('fresca', [
        'type' => 'select',
        'options' => [1 => 'Yes', 0 => 'No'],
        'label' => 'Fresh',
        'empty' => 'Choose one',
        'value' => $this->request->getQuery('fresca')
    ]) ?>
    <?= $this->Form->submit(__('Filter')) ?>
    <?= $this->Form->end() ?>
    <?= $this->Html->link(__('Limpar Filtro'), ['action' => 'index'], ['class' => 'button']) ?>

    <table>
        <thead>
            <tr>
                <th><?= $this->Paginator->sort('id') ?></th>
                <th><?= $this->Paginator->sort('nome') ?></th>
                <th><?= $this->Paginator->sort('classificacao') ?></th>
                <th><?= $this->Paginator->sort('fresca') ?></th>
                <th><?= $this->Paginator->sort('quantidade') ?></th>
                <th><?= $this->Paginator->sort('valor') ?></th>
                <th class="actions"><?= __('Actions') ?></th>
            </tr>
        </thead>
        <tbody>
            <?php foreach ($frutas as $fruta): ?>
            <tr>
                <td><?= $this->Number->format($fruta->id) ?></td>
                <td><?= h($fruta->nome) ?></td>
                <td><?= h($fruta->classificacao) ?></td>
                <td><?= $fruta->fresca ? __('Yes') : __('No') ?></td>
                <td><?= $this->Number->format($fruta->quantidade) ?></td>
                <td><?= $this->Number->format($fruta->valor) ?></td>
                <td class="actions">
                    <?= $this->Html->link(__('View'), ['action' => 'view', $fruta->id]) ?>
                    <?= $this->Html->link(__('Edit'), ['action' => 'edit', $fruta->id]) ?>
                    <?= $this->Form->postLink(__('Delete'), ['action' => 'delete', $fruta->id],
                     ['confirm' => __('Are you sure you want to delete # {0}?', $fruta->id)]) 
                    ?>
                </td>
            </tr>
            <?php endforeach; ?>
        </tbody>
    </table>
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

