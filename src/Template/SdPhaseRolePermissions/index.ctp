<?php
/**
 * @var \App\View\AppView $this
 * @var \App\Model\Entity\SdPhaseRolePermission[]|\Cake\Collection\CollectionInterface $sdPhaseRolePermissions
 */
?>
<nav class="large-3 medium-4 columns" id="actions-sidebar">
    <ul class="side-nav">
        <li class="heading"><?= __('Actions') ?></li>
        <li><?= $this->Html->link(__('New Sd Phase Role Permission'), ['action' => 'add']) ?></li>
        <li><?= $this->Html->link(__('List Sd Phases'), ['controller' => 'SdPhases', 'action' => 'index']) ?></li>
        <li><?= $this->Html->link(__('New Sd Phase'), ['controller' => 'SdPhases', 'action' => 'add']) ?></li>
        <li><?= $this->Html->link(__('List Sd Roles'), ['controller' => 'SdRoles', 'action' => 'index']) ?></li>
        <li><?= $this->Html->link(__('New Sd Role'), ['controller' => 'SdRoles', 'action' => 'add']) ?></li>
        <li><?= $this->Html->link(__('List Sd Phase Role Section Permissions'), ['controller' => 'SdPhaseRoleSectionPermissions', 'action' => 'index']) ?></li>
        <li><?= $this->Html->link(__('New Sd Phase Role Section Permission'), ['controller' => 'SdPhaseRoleSectionPermissions', 'action' => 'add']) ?></li>
    </ul>
</nav>
<div class="sdPhaseRolePermissions index large-9 medium-8 columns content">
    <h3><?= __('Sd Phase Role Permissions') ?></h3>
    <table cellpadding="0" cellspacing="0">
        <thead>
            <tr>
                <th scope="col"><?= $this->Paginator->sort('id') ?></th>
                <th scope="col"><?= $this->Paginator->sort('sd_phase_id') ?></th>
                <th scope="col"><?= $this->Paginator->sort('sd_role_id') ?></th>
                <th scope="col" class="actions"><?= __('Actions') ?></th>
            </tr>
        </thead>
        <tbody>
            <?php foreach ($sdPhaseRolePermissions as $sdPhaseRolePermission): ?>
            <tr>
                <td><?= $this->Number->format($sdPhaseRolePermission->id) ?></td>
                <td><?= $sdPhaseRolePermission->has('sd_phase') ? $this->Html->link($sdPhaseRolePermission->sd_phase->id, ['controller' => 'SdPhases', 'action' => 'view', $sdPhaseRolePermission->sd_phase->id]) : '' ?></td>
                <td><?= $sdPhaseRolePermission->has('sd_role') ? $this->Html->link($sdPhaseRolePermission->sd_role->id, ['controller' => 'SdRoles', 'action' => 'view', $sdPhaseRolePermission->sd_role->id]) : '' ?></td>
                <td class="actions">
                    <?= $this->Html->link(__('View'), ['action' => 'view', $sdPhaseRolePermission->id]) ?>
                    <?= $this->Html->link(__('Edit'), ['action' => 'edit', $sdPhaseRolePermission->id]) ?>
                    <?= $this->Form->postLink(__('Delete'), ['action' => 'delete', $sdPhaseRolePermission->id], ['confirm' => __('Are you sure you want to delete # {0}?', $sdPhaseRolePermission->id)]) ?>
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
