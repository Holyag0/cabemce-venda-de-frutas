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
            <?= $this->Html->link(__('List Frutas'), ['action' => 'index'], ['class' => 'side-nav-item']) ?>
        </div>
    </aside>
    <div class="column column-80">
        <div class="frutas form content">
            <?= $this->Form->create($fruta) ?>
            <fieldset>
                <legend><?= __('Add Fruta') ?></legend>
                <?php
                    echo $this->Form->control('nome');
                    echo $this->Form->control('classificacao',[
                        'type' => 'select', 'options' =>
                         ['Extra' => 'Extra',
                          'Primeira' => 'Primeira',
                          'Segunda' => 'Segunda', 
                          'Terceira' => 'Terceira']
                        ]);
                    echo $this->Form->control('fresca', ['type' => 'checkbox']);
                    echo $this->Form->control('quantidade');
                    echo $this->Form->control('valor');
                ?>
            </fieldset>
            <?= $this->Form->button(__('Submit')) ?>
            <?= $this->Form->end() ?>
        </div>
    </div>
</div>
