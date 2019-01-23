<?php
/**
 * @var \App\View\AppView $this
 * @var \App\Model\Entity\SdProductWorkflow[]|\Cake\Collection\CollectionInterface $sdProductWorkflows
 */
?>
<nav class="large-3 medium-4 columns" id="actions-sidebar">
    <ul class="side-nav">
        <li class="heading"><?= __('Actions') ?></li>
        <li><?= $this->Html->link(__('New Sd Product Workflow'), ['action' => 'add']) ?></li>
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
<div class="sdProductWorkflows index large-9 medium-8 columns content">
    <h3><?= __('Sd Product Workflows') ?></h3>
    <table cellpadding="0" cellspacing="0">
        <thead>
            <tr>
                <th scope="col"><?= $this->Paginator->sort('id') ?></th>
                <th scope="col"><?= $this->Paginator->sort('sd_product_id') ?></th>
                <th scope="col"><?= $this->Paginator->sort('sd_workflow_id') ?></th>
                <th scope="col"><?= $this->Paginator->sort('sd_user_id') ?></th>
                <th scope="col"><?= $this->Paginator->sort('sd_company_id') ?></th>
                <th scope="col" class="actions"><?= __('Actions') ?></th>
            </tr>
        </thead>
        <tbody>
            <?php foreach ($sdProductWorkflows as $sdProductWorkflow): ?>
            <tr>
                <td><?= $this->Number->format($sdProductWorkflow->id) ?></td>
                <td><?= $sdProductWorkflow->has('sd_product') ? $this->Html->link($sdProductWorkflow->sd_product->id, ['controller' => 'SdProducts', 'action' => 'view', $sdProductWorkflow->sd_product->id]) : '' ?></td>
                <td><?= $sdProductWorkflow->has('sd_workflow') ? $this->Html->link($sdProductWorkflow->sd_workflow->name, ['controller' => 'SdWorkflows', 'action' => 'view', $sdProductWorkflow->sd_workflow->id]) : '' ?></td>
                <td><?= $sdProductWorkflow->has('sd_user') ? $this->Html->link($sdProductWorkflow->sd_user->title, ['controller' => 'SdUsers', 'action' => 'view', $sdProductWorkflow->sd_user->id]) : '' ?></td>
                <td><?= $this->Number->format($sdProductWorkflow->sd_company_id) ?></td>
                <td class="actions">
                    <?= $this->Html->link(__('View'), ['action' => 'view', $sdProductWorkflow->id]) ?>
                    <?= $this->Html->link(__('Edit'), ['action' => 'edit', $sdProductWorkflow->id]) ?>
                    <?= $this->Form->postLink(__('Delete'), ['action' => 'delete', $sdProductWorkflow->id], ['confirm' => __('Are you sure you want to delete # {0}?', $sdProductWorkflow->id)]) ?>
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
