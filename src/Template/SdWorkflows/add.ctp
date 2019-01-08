<?php
/**
 * @var \App\View\AppView $this
 * @var \App\Model\Entity\SdWorkflow $sdWorkflow
 */
?>
<nav class="large-3 medium-4 columns" id="actions-sidebar">
    <ul class="side-nav">
        <li class="heading"><?= __('Actions') ?></li>
        <li><?= $this->Html->link(__('List Sd Workflows'), ['action' => 'index']) ?></li>
        <li><?= $this->Html->link(__('List Sd Products'), ['controller' => 'SdProducts', 'action' => 'index']) ?></li>
        <li><?= $this->Html->link(__('New Sd Product'), ['controller' => 'SdProducts', 'action' => 'add']) ?></li>
    </ul>
</nav>
<div class="sdWorkflows form large-9 medium-8 columns content">
    <?= $this->Form->create($sdWorkflow) ?>
    <fieldset>
        <legend><?= __('Add Sd Workflow') ?></legend>
        <?php
            echo $this->Form->control('name');
            echo $this->Form->control('description');
            echo $this->Form->control('status');
            echo $this->Form->control('country');
            echo $this->Form->control('workflow_type');
        ?>
    </fieldset>
    <?= $this->Form->button(__('Submit')) ?>
    <?= $this->Form->end() ?>
</div>
