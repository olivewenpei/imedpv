<?php
/**
 * @var \App\View\AppView $this
 * @var \App\Model\Entity\SdCase $sdCase
 */
?>
<nav class="large-3 medium-4 columns" id="actions-sidebar">
    <ul class="side-nav">
        <li class="heading"><?= __('Actions') ?></li>
        <li><?= $this->Html->link(__('List Sd Cases'), ['action' => 'index']) ?></li>
        <li><?= $this->Html->link(__('List Sd Product Workflows'), ['controller' => 'SdProductWorkflows', 'action' => 'index']) ?></li>
        <li><?= $this->Html->link(__('New Sd Product Workflow'), ['controller' => 'SdProductWorkflows', 'action' => 'add']) ?></li>
        <li><?= $this->Html->link(__('List Sd Workflow Activities'), ['controller' => 'SdWorkflowActivities', 'action' => 'index']) ?></li>
        <li><?= $this->Html->link(__('New Sd Workflow Activity'), ['controller' => 'SdWorkflowActivities', 'action' => 'add']) ?></li>
        <li><?= $this->Html->link(__('List Sd Users'), ['controller' => 'SdUsers', 'action' => 'index']) ?></li>
        <li><?= $this->Html->link(__('New Sd User'), ['controller' => 'SdUsers', 'action' => 'add']) ?></li>
        <li><?= $this->Html->link(__('List Sd Case General Infos'), ['controller' => 'SdCaseGeneralInfos', 'action' => 'index']) ?></li>
        <li><?= $this->Html->link(__('New Sd Case General Info'), ['controller' => 'SdCaseGeneralInfos', 'action' => 'add']) ?></li>
        <li><?= $this->Html->link(__('List Sd Field Values'), ['controller' => 'SdFieldValues', 'action' => 'index']) ?></li>
        <li><?= $this->Html->link(__('New Sd Field Value'), ['controller' => 'SdFieldValues', 'action' => 'add']) ?></li>
    </ul>
</nav>
<div class="sdCases form large-9 medium-8 columns content">
    <?= $this->Form->create($sdCase) ?>
    <fieldset>
        <legend><?= __('Add Sd Case') ?></legend>
        <?php
            echo $this->Form->control('sd_product_workflow_id', ['options' => $sdProductWorkflows]);
            echo $this->Form->control('caseNo');
            echo $this->Form->control('sd_workflow_activity_id', ['options' => $sdWorkflowActivities]);
            echo $this->Form->control('status');
            echo $this->Form->control('sd_user_id', ['options' => $sdUsers]);
            echo $this->Form->control('priority');
            echo $this->Form->control('activity_due_date');
            echo $this->Form->control('submission_due_date');
            echo $this->Form->control('product_type');
            echo $this->Form->control('classification');
        ?>
    </fieldset>
    <?= $this->Form->button(__('Submit')) ?>
    <?= $this->Form->end() ?>
</div>
