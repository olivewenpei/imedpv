<?php
/**
 * @var \App\View\AppView $this
 * @var \App\Model\Entity\SdCaseHistory $sdCaseHistory
 */
?>
<nav class="large-3 medium-4 columns" id="actions-sidebar">
    <ul class="side-nav">
        <li class="heading"><?= __('Actions') ?></li>
        <li><?= $this->Form->postLink(
                __('Delete'),
                ['action' => 'delete', $sdCaseHistory->id],
                ['confirm' => __('Are you sure you want to delete # {0}?', $sdCaseHistory->id)]
            )
        ?></li>
        <li><?= $this->Html->link(__('List Sd Case Histories'), ['action' => 'index']) ?></li>
        <li><?= $this->Html->link(__('List Sd Cases'), ['controller' => 'SdCases', 'action' => 'index']) ?></li>
        <li><?= $this->Html->link(__('New Sd Case'), ['controller' => 'SdCases', 'action' => 'add']) ?></li>
        <li><?= $this->Html->link(__('List Sd Workflow Activities'), ['controller' => 'SdWorkflowActivities', 'action' => 'index']) ?></li>
        <li><?= $this->Html->link(__('New Sd Workflow Activity'), ['controller' => 'SdWorkflowActivities', 'action' => 'add']) ?></li>
        <li><?= $this->Html->link(__('List Sd Users'), ['controller' => 'SdUsers', 'action' => 'index']) ?></li>
        <li><?= $this->Html->link(__('New Sd User'), ['controller' => 'SdUsers', 'action' => 'add']) ?></li>
    </ul>
</nav>
<div class="sdCaseHistories form large-9 medium-8 columns content">
    <?= $this->Form->create($sdCaseHistory) ?>
    <fieldset>
        <legend><?= __('Edit Sd Case History') ?></legend>
        <?php
            echo $this->Form->control('sd_case_id', ['options' => $sdCases]);
            echo $this->Form->control('sd_workflow_activity_id', ['options' => $sdWorkflowActivities]);
            echo $this->Form->control('sd_user_id', ['options' => $sdUsers]);
            echo $this->Form->control('comment');
            echo $this->Form->control('enter_time');
            echo $this->Form->control('close_time');
        ?>
    </fieldset>
    <?= $this->Form->button(__('Submit')) ?>
    <?= $this->Form->end() ?>
</div>
