<?php
/**
 * @var \App\View\AppView $this
 * @var \App\Model\Entity\SdSection $sdSection
 */
?>
<nav class="large-3 medium-4 columns" id="actions-sidebar">
    <ul class="side-nav">
        <li class="heading"><?= __('Actions') ?></li>
        <li><?= $this->Html->link(__('List Sd Sections'), ['action' => 'index']) ?></li>
        <li><?= $this->Html->link(__('List Sd Tabs'), ['controller' => 'SdTabs', 'action' => 'index']) ?></li>
        <li><?= $this->Html->link(__('New Sd Tab'), ['controller' => 'SdTabs', 'action' => 'add']) ?></li>
        <li><?= $this->Html->link(__('List Sd Section Structures'), ['controller' => 'SdSectionStructures', 'action' => 'index']) ?></li>
        <li><?= $this->Html->link(__('New Sd Section Structure'), ['controller' => 'SdSectionStructures', 'action' => 'add']) ?></li>
    </ul>
</nav>
<div class="sdSections form large-9 medium-8 columns content">
    <?= $this->Form->create($sdSection) ?>
    <fieldset>
        <legend><?= __('Add Sd Section') ?></legend>
        <?php
            echo $this->Form->control('section_name');
            echo $this->Form->control('section_level');
            echo $this->Form->control('parent_section');
            echo $this->Form->control('sd_tab_id', ['options' => $sdTabs]);
            echo $this->Form->control('is_addable');
            echo $this->Form->control('display_order');
            echo $this->Form->control('status');
        ?>
    </fieldset>
    <?= $this->Form->button(__('Submit')) ?>
    <?= $this->Form->end() ?>
</div>
