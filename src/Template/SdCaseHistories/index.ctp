<?php
/**
 * @var \App\View\AppView $this
 * @var \App\Model\Entity\SdCaseHistory[]|\Cake\Collection\CollectionInterface $sdCaseHistories
 */
?>
<nav class="large-3 medium-4 columns" id="actions-sidebar">
    <ul class="side-nav">
        <li class="heading"><?= __('Actions') ?></li>
        <li><?= $this->Html->link(__('New Sd Case History'), ['action' => 'add']) ?></li>
        <li><?= $this->Html->link(__('List Sd Cases'), ['controller' => 'SdCases', 'action' => 'index']) ?></li>
        <li><?= $this->Html->link(__('New Sd Case'), ['controller' => 'SdCases', 'action' => 'add']) ?></li>
        <li><?= $this->Html->link(__('List Sd Workflow Activities'), ['controller' => 'SdWorkflowActivities', 'action' => 'index']) ?></li>
        <li><?= $this->Html->link(__('New Sd Workflow Activity'), ['controller' => 'SdWorkflowActivities', 'action' => 'add']) ?></li>
        <li><?= $this->Html->link(__('List Sd Users'), ['controller' => 'SdUsers', 'action' => 'index']) ?></li>
        <li><?= $this->Html->link(__('New Sd User'), ['controller' => 'SdUsers', 'action' => 'add']) ?></li>
    </ul>
</nav>
<div class="sdCaseHistories index large-9 medium-8 columns content">
    <h3><?= __('Sd Case Histories') ?></h3>
    <table cellpadding="0" cellspacing="0">
        <thead>
            <tr>
                <th scope="col"><?= $this->Paginator->sort('id') ?></th>
                <th scope="col"><?= $this->Paginator->sort('sd_case_id') ?></th>
                <th scope="col"><?= $this->Paginator->sort('sd_workflow_activity_id') ?></th>
                <th scope="col"><?= $this->Paginator->sort('sd_user_id') ?></th>
                <th scope="col"><?= $this->Paginator->sort('enter_time') ?></th>
                <th scope="col"><?= $this->Paginator->sort('close_time') ?></th>
                <th scope="col" class="actions"><?= __('Actions') ?></th>
            </tr>
        </thead>
        <tbody>
            <?php foreach ($sdCaseHistories as $sdCaseHistory): ?>
            <tr>
                <td><?= $this->Number->format($sdCaseHistory->id) ?></td>
                <td><?= $sdCaseHistory->has('sd_case') ? $this->Html->link($sdCaseHistory->sd_case->id, ['controller' => 'SdCases', 'action' => 'view', $sdCaseHistory->sd_case->id]) : '' ?></td>
                <td><?= $sdCaseHistory->has('sd_workflow_activity') ? $this->Html->link($sdCaseHistory->sd_workflow_activity->id, ['controller' => 'SdWorkflowActivities', 'action' => 'view', $sdCaseHistory->sd_workflow_activity->id]) : '' ?></td>
                <td><?= $sdCaseHistory->has('sd_user') ? $this->Html->link($sdCaseHistory->sd_user->title, ['controller' => 'SdUsers', 'action' => 'view', $sdCaseHistory->sd_user->id]) : '' ?></td>
                <td><?= h($sdCaseHistory->enter_time) ?></td>
                <td><?= h($sdCaseHistory->close_time) ?></td>
                <td class="actions">
                    <?= $this->Html->link(__('View'), ['action' => 'view', $sdCaseHistory->id]) ?>
                    <?= $this->Html->link(__('Edit'), ['action' => 'edit', $sdCaseHistory->id]) ?>
                    <?= $this->Form->postLink(__('Delete'), ['action' => 'delete', $sdCaseHistory->id], ['confirm' => __('Are you sure you want to delete # {0}?', $sdCaseHistory->id)]) ?>
                </td>
            </tr>
            <?php endforeach; ?>
        </tbody>
    </table>
    <div class="paginator">
        <ul class="pagination">
            <?= $this->Paginator->first('<< ' . __('first')) ?>
            <?= $this->Paginator->prev('< ' . __('previous')) ?>
            <?= $this->Paginator->numbers() ?>
            <?= $this->Paginator->next(__('next') . ' >') ?>
            <?= $this->Paginator->last(__('last') . ' >>') ?>
        </ul>
        <p><?= $this->Paginator->counter(['format' => __('Page {{page}} of {{pages}}, showing {{current}} record(s) out of {{count}} total')]) ?></p>
    </div>
</div>
