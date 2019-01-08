<?php
/**
 * @var \App\View\AppView $this
 * @var \App\Model\Entity\SdPhase $sdPhase
 */
?>
<nav class="large-3 medium-4 columns" id="actions-sidebar">
    <ul class="side-nav">
        <li class="heading"><?= __('Actions') ?></li>
        <li><?= $this->Html->link(__('List Sd Phases'), ['action' => 'index']) ?></li>
        <li><?= $this->Html->link(__('List Sd Workflows'), ['controller' => 'SdWorkflows', 'action' => 'index']) ?></li>
        <li><?= $this->Html->link(__('New Sd Workflow'), ['controller' => 'SdWorkflows', 'action' => 'add']) ?></li>
        <li><?= $this->Html->link(__('List Sd Cases'), ['controller' => 'SdCases', 'action' => 'index']) ?></li>
        <li><?= $this->Html->link(__('New Sd Case'), ['controller' => 'SdCases', 'action' => 'add']) ?></li>
        <li><?= $this->Html->link(__('List Sd Phase Role Permissions'), ['controller' => 'SdPhaseRolePermissions', 'action' => 'index']) ?></li>
        <li><?= $this->Html->link(__('New Sd Phase Role Permission'), ['controller' => 'SdPhaseRolePermissions', 'action' => 'add']) ?></li>
        <li><?= $this->Html->link(__('List Sd Product Assignments'), ['controller' => 'SdProductAssignments', 'action' => 'index']) ?></li>
        <li><?= $this->Html->link(__('New Sd Product Assignment'), ['controller' => 'SdProductAssignments', 'action' => 'add']) ?></li>
    </ul>
</nav>
<div class="sdPhases form large-9 medium-8 columns content">
    <?= $this->Form->create($sdPhase) ?>
    <fieldset>
        <legend><?= __('Add Sd Phase') ?></legend>
        <?php
            echo $this->Form->control('sd_workflow_id', ['options' => $sdWorkflows]);
            echo $this->Form->control('order_no');
            echo $this->Form->control('step_forward');
            echo $this->Form->control('step_backward');
            echo $this->Form->control('phase_name');
        ?>
    </fieldset>
    <?= $this->Form->button(__('Submit')) ?>
    <?= $this->Form->end() ?>
</div>
