<?php
/**
 * @var \App\View\AppView $this
 * @var \App\Model\Entity\SdUserType[]|\Cake\Collection\CollectionInterface $sdUserTypes
 */
?>
<nav class="large-3 medium-4 columns" id="actions-sidebar">
    <ul class="side-nav">
        <li class="heading"><?= __('Actions') ?></li>
        <li><?= $this->Html->link(__('New Sd User Type'), ['action' => 'add']) ?></li>
        <li><?= $this->Html->link(__('List Sd Companies'), ['controller' => 'SdCompanies', 'action' => 'index']) ?></li>
        <li><?= $this->Html->link(__('New Sd Company'), ['controller' => 'SdCompanies', 'action' => 'add']) ?></li>
        <li><?= $this->Html->link(__('List Sd Roles'), ['controller' => 'SdRoles', 'action' => 'index']) ?></li>
        <li><?= $this->Html->link(__('New Sd Role'), ['controller' => 'SdRoles', 'action' => 'add']) ?></li>
    </ul>
</nav>
<div class="sdUserTypes index large-9 medium-8 columns content">
    <h3><?= __('Sd User Types') ?></h3>
    <table cellpadding="0" cellspacing="0">
        <thead>
            <tr>
                <th scope="col"><?= $this->Paginator->sort('id') ?></th>
                <th scope="col"><?= $this->Paginator->sort('name') ?></th>
                <th scope="col"><?= $this->Paginator->sort('description') ?></th>
                <th scope="col"><?= $this->Paginator->sort('status') ?></th>
                <th scope="col" class="actions"><?= __('Actions') ?></th>
            </tr>
        </thead>
        <tbody>
            <?php foreach ($sdUserTypes as $sdUserType): ?>
            <tr>
                <td><?= $this->Number->format($sdUserType->id) ?></td>
                <td><?= h($sdUserType->name) ?></td>
                <td><?= h($sdUserType->description) ?></td>
                <td><?= $this->Number->format($sdUserType->status) ?></td>
                <td class="actions">
                    <?= $this->Html->link(__('View'), ['action' => 'view', $sdUserType->id]) ?>
                    <?= $this->Html->link(__('Edit'), ['action' => 'edit', $sdUserType->id]) ?>
                    <?= $this->Form->postLink(__('Delete'), ['action' => 'delete', $sdUserType->id], ['confirm' => __('Are you sure you want to delete # {0}?', $sdUserType->id)]) ?>
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
