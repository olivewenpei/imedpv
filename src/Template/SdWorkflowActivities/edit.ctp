<?php
/**
 * @var \App\View\AppView $this
 * @var \App\Model\Entity\SdWorkflowActivity $sdWorkflowActivity
 */
?>
<nav class="large-3 medium-4 columns" id="actions-sidebar">
    <ul class="side-nav">
        <li class="heading"><?= __('Actions') ?></li>
        <li><?= $this->Form->postLink(
                __('Delete'),
                ['action' => 'delete', $sdWorkflowActivity->id],
                ['confirm' => __('Are you sure you want to delete # {0}?', $sdWorkflowActivity->id)]
            )
        ?></li>
        <li><?= $this->Html->link(__('List Sd Workflow Activities'), ['action' => 'index']) ?></li>
        <li><?= $this->Html->link(__('List Sd Workflows'), ['controller' => 'SdWorkflows', 'action' => 'index']) ?></li>
        <li><?= $this->Html->link(__('New Sd Workflow'), ['controller' => 'SdWorkflows', 'action' => 'add']) ?></li>
        <li><?= $this->Html->link(__('List Sd Cases'), ['controller' => 'SdCases', 'action' => 'index']) ?></li>
        <li><?= $this->Html->link(__('New Sd Case'), ['controller' => 'SdCases', 'action' => 'add']) ?></li>
    </ul>
</nav>
<div class="sdWorkflowActivities form large-9 medium-8 columns content">
    <?= $this->Form->create($sdWorkflowActivity) ?>
    <fieldset>
        <legend><?= __('Edit Sd Workflow Activity') ?></legend>
        <?php
            echo $this->Form->control('sd_workflow_id', ['options' => $sdWorkflows]);
            echo $this->Form->control('order_no');
            echo $this->Form->control('step_forward');
            echo $this->Form->control('step_backward');
            echo $this->Form->control('activity_name');
        ?>
    </fieldset>
    <?= $this->Form->button(__('Submit')) ?>
    <?= $this->Form->end() ?>
</div>
