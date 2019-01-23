<?php
/**
 * @var \App\View\AppView $this
 * @var \App\Model\Entity\SdUserAssignment[]|\Cake\Collection\CollectionInterface $sdUserAssignments
 */
?>
<nav class="large-3 medium-4 columns" id="actions-sidebar">
    <ul class="side-nav">
        <li class="heading"><?= __('Actions') ?></li>
        <li><?= $this->Html->link(__('New Sd User Assignment'), ['action' => 'add']) ?></li>
        <li><?= $this->Html->link(__('List Sd Users'), ['controller' => 'SdUsers', 'action' => 'index']) ?></li>
        <li><?= $this->Html->link(__('New Sd User'), ['controller' => 'SdUsers', 'action' => 'add']) ?></li>
    </ul>
</nav>
<div class="sdUserAssignments index large-9 medium-8 columns content">
    <h3><?= __('Sd User Assignments') ?></h3>
    <table cellpadding="0" cellspacing="0">
        <thead>
            <tr>
                <th scope="col"><?= $this->Paginator->sort('id') ?></th>
                <th scope="col"><?= $this->Paginator->sort('sd_product_workflow_id') ?></th>
                <th scope="col"><?= $this->Paginator->sort('sd_user_id') ?></th>
                <th scope="col"><?= $this->Paginator->sort('sd_workflow_activity_id') ?></th>
                <th scope="col" class="actions"><?= __('Actions') ?></th>
            </tr>
        </thead>
        <tbody>
            <?php foreach ($sdUserAssignments as $sdUserAssignment): ?>
            <tr>
                <td><?= $this->Number->format($sdUserAssignment->id) ?></td>
                <td><?= $this->Number->format($sdUserAssignment->sd_product_workflow_id) ?></td>
                <td><?= $sdUserAssignment->has('sd_user') ? $this->Html->link($sdUserAssignment->sd_user->title, ['controller' => 'SdUsers', 'action' => 'view', $sdUserAssignment->sd_user->id]) : '' ?></td>
                <td><?= $this->Number->format($sdUserAssignment->sd_workflow_activity_id) ?></td>
                <td class="actions">
                    <?= $this->Html->link(__('View'), ['action' => 'view', $sdUserAssignment->id]) ?>
                    <?= $this->Html->link(__('Edit'), ['action' => 'edit', $sdUserAssignment->id]) ?>
                    <?= $this->Form->postLink(__('Delete'), ['action' => 'delete', $sdUserAssignment->id], ['confirm' => __('Are you sure you want to delete # {0}?', $sdUserAssignment->id)]) ?>
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
