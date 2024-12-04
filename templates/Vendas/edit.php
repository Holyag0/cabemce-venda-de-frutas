<?php

/**
 * @var \App\View\AppView $this
 * @var \App\Model\Entity\Venda $venda
 * @var string[]|\Cake\Collection\CollectionInterface $users
 * @var string[]|\Cake\Collection\CollectionInterface $frutas
 */
?>
<div class="row">
    <aside class="column">
        <div class="side-nav">
            <h4 class="heading"><?= __('Actions') ?></h4>
            <?= $this->Form->postLink(
                __('Delete'),
                ['action' => 'delete', $venda->id],
                ['confirm' => __('Are you sure you want to delete # {0}?', $venda->id), 'class' => 'side-nav-item']
            ) ?>
            <?= $this->Html->link(__('List Vendas'), ['action' => 'index'], ['class' => 'side-nav-item']) ?>
        </div>
    </aside>
    <div class="column column-80">
        <div class="vendas form content"> <?= $this->Form->create($venda) ?> <fieldset>
                <legend><?= __('Edit Sale') ?></legend> 
                <?php echo $this->Form->control('user_id', ['options' => $users]);
                            echo $this->Form->control('fruta_id', ['options' => $frutas]);
                            echo $this->Form->control('quantidade');
                            echo $this->Form->control('valor');
                            echo $this->Form->control('desconto', ['type' => 'select',
                             'options' => [5 => '5%', 10 => '10%', 15 => '15%', 20 => '20%', 25 => '25%'],
                             'empty' => 'Choose a discount']); 
                             ?>
            </fieldset> 
            <?= $this->Form->button(__('Save')) ?> <?= $this->Form->end() ?>
         </div>
    </div>
</div>