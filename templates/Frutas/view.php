<?php
/**
 * @var \App\View\AppView $this
 * @var \App\Model\Entity\Fruta $fruta
 */
?>
<div class="row">
    <aside class="column">
        <div class="side-nav">
            <h4 class="heading"><?= __('Actions') ?></h4>
            <?= $this->Html->link(__('Edit Fruta'), ['action' => 'edit', $fruta->id], ['class' => 'side-nav-item']) ?>
            <?= $this->Form->postLink(__('Delete Fruta'), ['action' => 'delete', $fruta->id], ['confirm' => __('Are you sure you want to delete # {0}?', $fruta->id), 'class' => 'side-nav-item']) ?>
            <?= $this->Html->link(__('List Frutas'), ['action' => 'index'], ['class' => 'side-nav-item']) ?>
            <?= $this->Html->link(__('New Fruta'), ['action' => 'add'], ['class' => 'side-nav-item']) ?>
        </div>
    </aside>
    <div class="column column-80">
        <div class="frutas view content">
            <h3><?= h($fruta->nome) ?></h3>
            <table>
                <tr>
                    <th><?= __('Nome') ?></th>
                    <td><?= h($fruta->nome) ?></td>
                </tr>
                <tr>
                    <th><?= __('Classificacao') ?></th>
                    <td><?= h($fruta->classificacao) ?></td>
                </tr>
                <tr>
                    <th><?= __('Id') ?></th>
                    <td><?= $this->Number->format($fruta->id) ?></td>
                </tr>
                <tr>
                    <th><?= __('Quantidade') ?></th>
                    <td><?= $this->Number->format($fruta->quantidade) ?></td>
                </tr>
                <tr>
                    <th><?= __('Valor') ?></th>
                    <td><?= $this->Number->format($fruta->valor) ?></td>
                </tr>
                <tr>
                    <th><?= __('Created') ?></th>
                    <td><?= h($fruta->created) ?></td>
                </tr>
                <tr>
                    <th><?= __('Modified') ?></th>
                    <td><?= h($fruta->modified) ?></td>
                </tr>
                <tr>
                    <th><?= __('Fresca') ?></th>
                    <td><?= $fruta->fresca ? __('Yes') : __('No'); ?></td>
                </tr>
            </table>
            <div class="related">
                <h4><?= __('Related Vendas') ?></h4>
                <?php if (!empty($fruta->vendas)) : ?>
                <div class="table-responsive">
                    <table>
                        <tr>
                            <th><?= __('Id') ?></th>
                            <th><?= __('User Id') ?></th>
                            <th><?= __('Fruta Id') ?></th>
                            <th><?= __('Quantidade') ?></th>
                            <th><?= __('Desconto') ?></th>
                            <th><?= __('Valor Total') ?></th>
                            <th><?= __('Created') ?></th>
                            <th class="actions"><?= __('Actions') ?></th>
                        </tr>
                        <?php foreach ($fruta->vendas as $venda) : ?>
                        <tr>
                            <td><?= h($venda->id) ?></td>
                            <td><?= h($venda->user_id) ?></td>
                            <td><?= h($venda->fruta_id) ?></td>
                            <td><?= h($venda->quantidade) ?></td>
                            <td><?= h($venda->desconto) ?></td>
                            <td><?= h($venda->valor_total) ?></td>
                            <td><?= h($venda->created) ?></td>
                            <td class="actions">
                                <?= $this->Html->link(__('View'), ['controller' => 'Vendas', 'action' => 'view', $venda->id]) ?>
                                <?= $this->Html->link(__('Edit'), ['controller' => 'Vendas', 'action' => 'edit', $venda->id]) ?>
                                <?= $this->Form->postLink(__('Delete'), ['controller' => 'Vendas', 'action' => 'delete', $venda->id], ['confirm' => __('Are you sure you want to delete # {0}?', $venda->id)]) ?>
                            </td>
                        </tr>
                        <?php endforeach; ?>
                    </table>
                </div>
                <?php endif; ?>
            </div>
        </div>
    </div>
</div>