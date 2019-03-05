<?php
/**
 * @var \App\View\AppView $this
 * @var \App\Model\Entity\SdCaseHistory $sdCaseHistory
 */
?>
<nav class="large-3 medium-4 columns" id="actions-sidebar">
    <ul class="side-nav">
        <li class="heading"><?= __('Actions') ?></li>
        <li><?= $this->Html->link(__('Edit Sd Case History'), ['action' => 'edit', $sdCaseHistory->id]) ?> </li>
        <li><?= $this->Form->postLink(__('Delete Sd Case History'), ['action' => 'delete', $sdCaseHistory->id], ['confirm' => __('Are you sure you want to delete # {0}?', $sdCaseHistory->id)]) ?> </li>
        <li><?= $this->Html->link(__('List Sd Case Histories'), ['action' => 'index']) ?> </li>
        <li><?= $this->Html->link(__('New Sd Case History'), ['action' => 'add']) ?> </li>
        <li><?= $this->Html->link(__('List Sd Cases'), ['controller' => 'SdCases', 'action' => 'index']) ?> </li>
        <li><?= $this->Html->link(__('New Sd Case'), ['controller' => 'SdCases', 'action' => 'add']) ?> </li>
        <li><?= $this->Html->link(__('List Sd Workflow Activities'), ['controller' => 'SdWorkflowActivities', 'action' => 'index']) ?> </li>
        <li><?= $this->Html->link(__('New Sd Workflow Activity'), ['controller' => 'SdWorkflowActivities', 'action' => 'add']) ?> </li>
        <li><?= $this->Html->link(__('List Sd Users'), ['controller' => 'SdUsers', 'action' => 'index']) ?> </li>
        <li><?= $this->Html->link(__('New Sd User'), ['controller' => 'SdUsers', 'action' => 'add']) ?> </li>
    </ul>
</nav>
<div class="sdCaseHistories view large-9 medium-8 columns content">
    <h3><?= h($sdCaseHistory->id) ?></h3>
    <table class="vertical-table">
        <tr>
            <th scope="row"><?= __('Sd Case') ?></th>
            <td><?= $sdCaseHistory->has('sd_case') ? $this->Html->link($sdCaseHistory->sd_case->id, ['controller' => 'SdCases', 'action' => 'view', $sdCaseHistory->sd_case->id]) : '' ?></td>
        </tr>
        <tr>
            <th scope="row"><?= __('Sd Workflow Activity') ?></th>
            <td><?= $sdCaseHistory->has('sd_workflow_activity') ? $this->Html->link($sdCaseHistory->sd_workflow_activity->id, ['controller' => 'SdWorkflowActivities', 'action' => 'view', $sdCaseHistory->sd_workflow_activity->id]) : '' ?></td>
        </tr>
        <tr>
            <th scope="row"><?= __('Sd User') ?></th>
            <td><?= $sdCaseHistory->has('sd_user') ? $this->Html->link($sdCaseHistory->sd_user->title, ['controller' => 'SdUsers', 'action' => 'view', $sdCaseHistory->sd_user->id]) : '' ?></td>
        </tr>
        <tr>
            <th scope="row"><?= __('Id') ?></th>
            <td><?= $this->Number->format($sdCaseHistory->id) ?></td>
        </tr>
        <tr>
            <th scope="row"><?= __('Enter Time') ?></th>
            <td><?= h($sdCaseHistory->enter_time) ?></td>
        </tr>
        <tr>
            <th scope="row"><?= __('Close Time') ?></th>
            <td><?= h($sdCaseHistory->close_time) ?></td>
        </tr>
    </table>
    <div class="row">
        <h4><?= __('Comment') ?></h4>
        <?= $this->Text->autoParagraph(h($sdCaseHistory->comment)); ?>
    </div>
</div>
