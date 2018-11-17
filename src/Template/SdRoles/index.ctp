<?php
/**
 * @var \App\View\AppView $this
 * @var \App\Model\Entity\SdRole[]|\Cake\Collection\CollectionInterface $sdRoles
 */
?>
<nav class="large-3 medium-4 columns" id="actions-sidebar">
    <ul class="side-nav">
        <li class="heading"><?= __('Actions') ?></li>
        <li><?= $this->Html->link(__('New Sd Role'), ['action' => 'add']) ?></li>
        <li><?= $this->Html->link(__('List Sd User Types'), ['controller' => 'SdUserTypes', 'action' => 'index']) ?></li>
        <li><?= $this->Html->link(__('New Sd User Type'), ['controller' => 'SdUserTypes', 'action' => 'add']) ?></li>
        <li><?= $this->Html->link(__('List Sd Users'), ['controller' => 'SdUsers', 'action' => 'index']) ?></li>
        <li><?= $this->Html->link(__('New Sd User'), ['controller' => 'SdUsers', 'action' => 'add']) ?></li>
    </ul>
</nav>
<div class="sdRoles index large-9 medium-8 columns content">
    <h3><?= __('Sd Roles') ?></h3>
    <table cellpadding="0" cellspacing="0">
        <thead>
            <tr>
                <th scope="col"><?= $this->Paginator->sort('id') ?></th>
                <th scope="col"><?= $this->Paginator->sort('role_name') ?></th>
                <th scope="col"><?= $this->Paginator->sort('status') ?></th>
                <th scope="col"><?= $this->Paginator->sort('description') ?></th>
                <th scope="col"><?= $this->Paginator->sort('parent_group') ?></th>
                <th scope="col"><?= $this->Paginator->sort('sd_user_type_id') ?></th>
                <th scope="col" class="actions"><?= __('Actions') ?></th>
            </tr>
        </thead>
        <tbody>
            <?php foreach ($sdRoles as $sdRole): ?>
            <tr>
                <td><?= $this->Number->format($sdRole->id) ?></td>
                <td><?= h($sdRole->role_name) ?></td>
                <td><?= $this->Number->format($sdRole->status) ?></td>
                <td><?= h($sdRole->description) ?></td>
                <td><?= $this->Number->format($sdRole->parent_group) ?></td>
                <td><?= $sdRole->has('sd_user_type') ? $this->Html->link($sdRole->sd_user_type->name, ['controller' => 'SdUserTypes', 'action' => 'view', $sdRole->sd_user_type->id]) : '' ?></td>
                <td class="actions">
                    <?= $this->Html->link(__('View'), ['action' => 'view', $sdRole->id]) ?>
                    <?= $this->Html->link(__('Edit'), ['action' => 'edit', $sdRole->id]) ?>
                    <?= $this->Form->postLink(__('Delete'), ['action' => 'delete', $sdRole->id], ['confirm' => __('Are you sure you want to delete # {0}?', $sdRole->id)]) ?>
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
