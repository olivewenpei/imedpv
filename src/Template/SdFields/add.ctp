<?php
/**
 * @var \App\View\AppView $this
 * @var \App\Model\Entity\SdField $sdField
 */
?>
<nav class="large-3 medium-4 columns" id="actions-sidebar">
    <ul class="side-nav">
        <li class="heading"><?= __('Actions') ?></li>
        <li><?= $this->Html->link(__('List Sd Fields'), ['action' => 'index']) ?></li>
        <li><?= $this->Html->link(__('List Sd Element Types'), ['controller' => 'SdElementTypes', 'action' => 'index']) ?></li>
        <li><?= $this->Html->link(__('New Sd Element Type'), ['controller' => 'SdElementTypes', 'action' => 'add']) ?></li>
        <li><?= $this->Html->link(__('List Sd Section Structures'), ['controller' => 'SdSectionStructures', 'action' => 'index']) ?></li>
        <li><?= $this->Html->link(__('New Sd Section Structure'), ['controller' => 'SdSectionStructures', 'action' => 'add']) ?></li>
    </ul>
</nav>
<div class="sdFields form large-9 medium-8 columns content">
    <?= $this->Form->create($sdField) ?>
    <fieldset>
        <legend><?= __('Add Sd Field') ?></legend>
        <?php
            echo $this->Form->control('organization');
            echo $this->Form->control('descriptor');
            echo $this->Form->control('e2b_code');
            echo $this->Form->control('version');
            echo $this->Form->control('is_e2b');
            echo $this->Form->control('field_length');
            echo $this->Form->control('field_type');
            echo $this->Form->control('field_label');
            echo $this->Form->control('sd_element_type_id', ['options' => $sdElementTypes, 'empty' => true]);
            echo $this->Form->control('comment');
        ?>
    </fieldset>
    <?= $this->Form->button(__('Submit')) ?>
    <?= $this->Form->end() ?>
</div>
