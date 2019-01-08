<?php
/**
 * @var \App\View\AppView $this
 * @var \App\Model\Entity\SdSectionStructure $sdSectionStructure
 */
?>
<nav class="large-3 medium-4 columns" id="actions-sidebar">
    <ul class="side-nav">
        <li class="heading"><?= __('Actions') ?></li>
        <li><?= $this->Html->link(__('List Sd Section Structures'), ['action' => 'index']) ?></li>
        <li><?= $this->Html->link(__('List Sd Sections'), ['controller' => 'SdSections', 'action' => 'index']) ?></li>
        <li><?= $this->Html->link(__('New Sd Section'), ['controller' => 'SdSections', 'action' => 'add']) ?></li>
        <li><?= $this->Html->link(__('List Sd Fields'), ['controller' => 'SdFields', 'action' => 'index']) ?></li>
        <li><?= $this->Html->link(__('New Sd Field'), ['controller' => 'SdFields', 'action' => 'add']) ?></li>
        <li><?= $this->Html->link(__('List Sd Section Values'), ['controller' => 'SdSectionValues', 'action' => 'index']) ?></li>
        <li><?= $this->Html->link(__('New Sd Section Value'), ['controller' => 'SdSectionValues', 'action' => 'add']) ?></li>
    </ul>
</nav>
<div class="sdSectionStructures form large-9 medium-8 columns content">
    <?= $this->Form->create($sdSectionStructure) ?>
    <fieldset>
        <legend><?= __('Add Sd Section Structure') ?></legend>
        <?php
            echo $this->Form->control('sd_section_id', ['options' => $sdSections]);
            echo $this->Form->control('sd_field_id', ['options' => $sdFields]);
            echo $this->Form->control('position');
            echo $this->Form->control('is_required');
        ?>
    </fieldset>
    <?= $this->Form->button(__('Submit')) ?>
    <?= $this->Form->end() ?>
</div>
