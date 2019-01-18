<?php
/**
 * @var \App\View\AppView $this
 * @var \App\Model\Entity\SdCase[]|\Cake\Collection\CollectionInterface $sdCases
 */
?>
<nav class="large-3 medium-4 columns" id="actions-sidebar">
    <ul class="side-nav">
        <li class="heading"><?= __('Actions') ?></li>
        <li><?= $this->Html->link(__('New Sd Case'), ['action' => 'add']) ?></li>
        <li><?= $this->Html->link(__('List Sd Product Workflows'), ['controller' => 'SdProductWorkflows', 'action' => 'index']) ?></li>
        <li><?= $this->Html->link(__('New Sd Product Workflow'), ['controller' => 'SdProductWorkflows', 'action' => 'add']) ?></li>
        <li><?= $this->Html->link(__('List Sd Activities'), ['controller' => 'SdActivities', 'action' => 'index']) ?></li>
        <li><?= $this->Html->link(__('New Sd Activity'), ['controller' => 'SdActivities', 'action' => 'add']) ?></li>
        <li><?= $this->Html->link(__('List Sd Users'), ['controller' => 'SdUsers', 'action' => 'index']) ?></li>
        <li><?= $this->Html->link(__('New Sd User'), ['controller' => 'SdUsers', 'action' => 'add']) ?></li>
        <li><?= $this->Html->link(__('List Sd Case General Infos'), ['controller' => 'SdCaseGeneralInfos', 'action' => 'index']) ?></li>
        <li><?= $this->Html->link(__('New Sd Case General Info'), ['controller' => 'SdCaseGeneralInfos', 'action' => 'add']) ?></li>
        <li><?= $this->Html->link(__('List Sd Field Values'), ['controller' => 'SdFieldValues', 'action' => 'index']) ?></li>
        <li><?= $this->Html->link(__('New Sd Field Value'), ['controller' => 'SdFieldValues', 'action' => 'add']) ?></li>
    </ul>
</nav>
<div class="sdCases index large-9 medium-8 columns content">
    <h3><?= __('Sd Cases') ?></h3>
    <table cellpadding="0" cellspacing="0">
        <thead>
            <tr>
                <th scope="col"><?= $this->Paginator->sort('id') ?></th>
                <th scope="col"><?= $this->Paginator->sort('sd_product_workflow_id') ?></th>
                <th scope="col"><?= $this->Paginator->sort('caseNo') ?></th>
                <th scope="col"><?= $this->Paginator->sort('sd_activity_id') ?></th>
                <th scope="col"><?= $this->Paginator->sort('status') ?></th>
                <th scope="col"><?= $this->Paginator->sort('sd_user_id') ?></th>
                <th scope="col"><?= $this->Paginator->sort('priority') ?></th>
                <th scope="col"><?= $this->Paginator->sort('activity_due_date') ?></th>
                <th scope="col"><?= $this->Paginator->sort('submission_due_date') ?></th>
                <th scope="col"><?= $this->Paginator->sort('product_type') ?></th>
                <th scope="col"><?= $this->Paginator->sort('classification') ?></th>
                <th scope="col" class="actions"><?= __('Actions') ?></th>
            </tr>
        </thead>
        <tbody>
            <?php foreach ($sdCases as $sdCase): ?>
            <tr>
                <td><?= $this->Number->format($sdCase->id) ?></td>
                <td><?= $sdCase->has('sd_product_workflow') ? $this->Html->link($sdCase->sd_product_workflow->id, ['controller' => 'SdProductWorkflows', 'action' => 'view', $sdCase->sd_product_workflow->id]) : '' ?></td>
                <td><?= h($sdCase->caseNo) ?></td>
                <td><?= $sdCase->has('sd_activity') ? $this->Html->link($sdCase->sd_activity->id, ['controller' => 'SdActivities', 'action' => 'view', $sdCase->sd_activity->id]) : '' ?></td>
                <td><?= $this->Number->format($sdCase->status) ?></td>
                <td><?= $sdCase->has('sd_user') ? $this->Html->link($sdCase->sd_user->title, ['controller' => 'SdUsers', 'action' => 'view', $sdCase->sd_user->id]) : '' ?></td>
                <td><?= $this->Number->format($sdCase->priority) ?></td>
                <td><?= h($sdCase->activity_due_date) ?></td>
                <td><?= h($sdCase->submission_due_date) ?></td>
                <td><?= $this->Number->format($sdCase->product_type) ?></td>
                <td><?= h($sdCase->classification) ?></td>
                <td class="actions">
                    <?= $this->Html->link(__('View'), ['action' => 'view', $sdCase->id]) ?>
                    <?= $this->Html->link(__('Edit'), ['action' => 'edit', $sdCase->id]) ?>
                    <?= $this->Form->postLink(__('Delete'), ['action' => 'delete', $sdCase->id], ['confirm' => __('Are you sure you want to delete # {0}?', $sdCase->id)]) ?>
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
