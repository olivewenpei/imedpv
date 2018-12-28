<?php
/**
 * @var \App\View\AppView $this
 * @var \App\Model\Entity\SdTab $sdTab
 */
?>
<nav class="large-3 medium-4 columns" id="actions-sidebar">
    <ul class="side-nav">
        <li class="heading"><?= __('Actions') ?></li>
        <li><?= $this->Form->postLink(
                __('Delete'),
                ['action' => 'delete', $sdTab->id],
                ['confirm' => __('Are you sure you want to delete # {0}?', $sdTab->id)]
            )
        ?></li>
        <li><?= $this->Html->link(__('List Sd Tabs'), ['action' => 'index']) ?></li>
        <li><?= $this->Html->link(__('List Sd Sections'), ['controller' => 'SdSections', 'action' => 'index']) ?></li>
        <li><?= $this->Html->link(__('New Sd Section'), ['controller' => 'SdSections', 'action' => 'add']) ?></li>
    </ul>
</nav>
<div class="sdTabs form large-9 medium-8 columns content">
    <?= $this->Form->create($sdTab) ?>
    <fieldset>
        <legend><?= __('Edit Sd Tab') ?></legend>
        <?php
            echo $this->Form->control('tab_name');
            echo $this->Form->control('display_order');
            echo $this->Form->control('status');
        ?>
    </fieldset>
    <?= $this->Form->button(__('Submit')) ?>
    <?= $this->Form->end() ?>
</div>
