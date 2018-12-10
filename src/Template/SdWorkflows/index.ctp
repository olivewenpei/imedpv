<?php
/**
 * @var \App\View\AppView $this
 * @var \App\Model\Entity\SdWorkflow[]|\Cake\Collection\CollectionInterface $sdWorkflows
 */
?>
<nav class="large-3 medium-4 columns" id="actions-sidebar">
    <ul class="side-nav">
        <li class="heading"><?= __('Actions') ?></li>
        <li><?= $this->Html->link(__('New Sd Workflow'), ['action' => 'add']) ?></li>
        <li><?= $this->Html->link(__('List Sd Products'), ['controller' => 'SdProducts', 'action' => 'index']) ?></li>
        <li><?= $this->Html->link(__('New Sd Product'), ['controller' => 'SdProducts', 'action' => 'add']) ?></li>
    </ul>
</nav>
<div class="sdWorkflows index large-9 medium-8 columns content">
    <h3><?= __('Sd Workflows') ?></h3>
    <table cellpadding="0" cellspacing="0">
        <thead>
            <tr>
                <th scope="col"><?= $this->Paginator->sort('id') ?></th>
                <th scope="col"><?= $this->Paginator->sort('status') ?></th>
                <th scope="col"><?= $this->Paginator->sort('country') ?></th>
                <th scope="col"><?= $this->Paginator->sort('workflow_type') ?></th>
                <th scope="col" class="actions"><?= __('Actions') ?></th>
            </tr>
        </thead>
        <tbody>
            <?php foreach ($sdWorkflows as $sdWorkflow): ?>
            <tr>
                <td><?= $this->Number->format($sdWorkflow->id) ?></td>
                <td><?= $this->Number->format($sdWorkflow->status) ?></td>
                <td><?= h($sdWorkflow->country) ?></td>
                <td><?= $this->Number->format($sdWorkflow->workflow_type) ?></td>
                <td class="actions">
                    <?= $this->Html->link(__('View'), ['action' => 'view', $sdWorkflow->id]) ?>
                    <?= $this->Html->link(__('Edit'), ['action' => 'edit', $sdWorkflow->id]) ?>
                    <?= $this->Form->postLink(__('Delete'), ['action' => 'delete', $sdWorkflow->id], ['confirm' => __('Are you sure you want to delete # {0}?', $sdWorkflow->id)]) ?>
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
