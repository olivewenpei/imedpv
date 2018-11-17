<?php
/**
 * @var \App\View\AppView $this
 * @var \App\Model\Entity\SdSectionValue $sdSectionValue
 */
?>
<nav class="large-3 medium-4 columns" id="actions-sidebar">
    <ul class="side-nav">
        <li class="heading"><?= __('Actions') ?></li>
        <li><?= $this->Html->link(__('List Sd Section Values'), ['action' => 'index']) ?></li>
        <li><?= $this->Html->link(__('List Sd Section Structures'), ['controller' => 'SdSectionStructures', 'action' => 'index']) ?></li>
        <li><?= $this->Html->link(__('New Sd Section Structure'), ['controller' => 'SdSectionStructures', 'action' => 'add']) ?></li>
        <li><?= $this->Html->link(__('List Sd Activity Log'), ['controller' => 'SdActivityLog', 'action' => 'index']) ?></li>
        <li><?= $this->Html->link(__('New Sd Activity Log'), ['controller' => 'SdActivityLog', 'action' => 'add']) ?></li>
    </ul>
</nav>
<div class="sdSectionValues form large-9 medium-8 columns content">
    <?= $this->Form->create($sdSectionValue) ?>
    <fieldset>
        <legend><?= __('Add Sd Section Value') ?></legend>
        <?php
            echo $this->Form->control('case_no');
            echo $this->Form->control('version_no');
            echo $this->Form->control('sd_section_structure_id', ['options' => $sdSectionStructures]);
            echo $this->Form->control('set_number');
            echo $this->Form->control('field_value');
            echo $this->Form->control('created_time');
            echo $this->Form->control('status');
        ?>
    </fieldset>
    <?= $this->Form->button(__('Submit')) ?>
    <?= $this->Form->end() ?>
</div>
