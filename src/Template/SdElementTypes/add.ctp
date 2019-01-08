<?php
/**
 * @var \App\View\AppView $this
 * @var \App\Model\Entity\SdElementType $sdElementType
 */
?>
<nav class="large-3 medium-4 columns" id="actions-sidebar">
    <ul class="side-nav">
        <li class="heading"><?= __('Actions') ?></li>
        <li><?= $this->Html->link(__('List Sd Element Types'), ['action' => 'index']) ?></li>
        <li><?= $this->Html->link(__('List Sd Fields'), ['controller' => 'SdFields', 'action' => 'index']) ?></li>
        <li><?= $this->Html->link(__('New Sd Field'), ['controller' => 'SdFields', 'action' => 'add']) ?></li>
    </ul>
</nav>
<div class="sdElementTypes form large-9 medium-8 columns content">
    <?= $this->Form->create($sdElementType) ?>
    <fieldset>
        <legend><?= __('Add Sd Element Type') ?></legend>
        <?php
            echo $this->Form->control('type_name');
            echo $this->Form->control('status');
        ?>
    </fieldset>
    <?= $this->Form->button(__('Submit')) ?>
    <?= $this->Form->end() ?>
</div>
