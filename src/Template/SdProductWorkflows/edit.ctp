<?php
/**
 * @var \App\View\AppView $this
 * @var \App\Model\Entity\SdProductWorkflow $sdProductWorkflow
 */
?>
<nav class="large-3 medium-4 columns" id="actions-sidebar">
    <ul class="side-nav">
        <li class="heading"><?= __('Actions') ?></li>
        <li><?= $this->Form->postLink(
                __('Delete'),
                ['action' => 'delete', $sdProductWorkflow->id],
                ['confirm' => __('Are you sure you want to delete # {0}?', $sdProductWorkflow->id)]
            )
        ?></li>
        <li><?= $this->Html->link(__('List Sd Product Workflows'), ['action' => 'index']) ?></li>
        <li><?= $this->Html->link(__('List Sd Products'), ['controller' => 'SdProducts', 'action' => 'index']) ?></li>
        <li><?= $this->Html->link(__('New Sd Product'), ['controller' => 'SdProducts', 'action' => 'add']) ?></li>
        <li><?= $this->Html->link(__('List Sd Workflows'), ['controller' => 'SdWorkflows', 'action' => 'index']) ?></li>
        <li><?= $this->Html->link(__('New Sd Workflow'), ['controller' => 'SdWorkflows', 'action' => 'add']) ?></li>
        <li><?= $this->Html->link(__('List Sd Users'), ['controller' => 'SdUsers', 'action' => 'index']) ?></li>
        <li><?= $this->Html->link(__('New Sd User'), ['controller' => 'SdUsers', 'action' => 'add']) ?></li>
        <li><?= $this->Html->link(__('List Sd Cases'), ['controller' => 'SdCases', 'action' => 'index']) ?></li>
        <li><?= $this->Html->link(__('New Sd Case'), ['controller' => 'SdCases', 'action' => 'add']) ?></li>
        <li><?= $this->Html->link(__('List Sd User Assignments'), ['controller' => 'SdUserAssignments', 'action' => 'index']) ?></li>
        <li><?= $this->Html->link(__('New Sd User Assignment'), ['controller' => 'SdUserAssignments', 'action' => 'add']) ?></li>
    </ul>
</nav>
<div class="sdProductWorkflows form large-9 medium-8 columns content">
    <?= $this->Form->create($sdProductWorkflow) ?>
    <fieldset>
        <legend><?= __('Edit Sd Product Workflow') ?></legend>
        <?php
            echo $this->Form->control('sd_product_id', ['options' => $sdProducts]);
            echo $this->Form->control('sd_workflow_id', ['options' => $sdWorkflows]);
            echo $this->Form->control('sd_user_id', ['options' => $sdUsers, 'empty' => true]);
            echo $this->Form->control('sd_company_id');
        ?>
    </fieldset>
    <?= $this->Form->button(__('Submit')) ?>
    <?= $this->Form->end() ?>
</div>
