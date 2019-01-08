<?php
/**
 * @var \App\View\AppView $this
 * @var \App\Model\Entity\SdPhaseRolePermission $sdPhaseRolePermission
 */
?>
<nav class="large-3 medium-4 columns" id="actions-sidebar">
    <ul class="side-nav">
        <li class="heading"><?= __('Actions') ?></li>
        <li><?= $this->Html->link(__('Edit Sd Phase Role Permission'), ['action' => 'edit', $sdPhaseRolePermission->id]) ?> </li>
        <li><?= $this->Form->postLink(__('Delete Sd Phase Role Permission'), ['action' => 'delete', $sdPhaseRolePermission->id], ['confirm' => __('Are you sure you want to delete # {0}?', $sdPhaseRolePermission->id)]) ?> </li>
        <li><?= $this->Html->link(__('List Sd Phase Role Permissions'), ['action' => 'index']) ?> </li>
        <li><?= $this->Html->link(__('New Sd Phase Role Permission'), ['action' => 'add']) ?> </li>
        <li><?= $this->Html->link(__('List Sd Phases'), ['controller' => 'SdPhases', 'action' => 'index']) ?> </li>
        <li><?= $this->Html->link(__('New Sd Phase'), ['controller' => 'SdPhases', 'action' => 'add']) ?> </li>
        <li><?= $this->Html->link(__('List Sd Roles'), ['controller' => 'SdRoles', 'action' => 'index']) ?> </li>
        <li><?= $this->Html->link(__('New Sd Role'), ['controller' => 'SdRoles', 'action' => 'add']) ?> </li>
        <li><?= $this->Html->link(__('List Sd Phase Role Section Permissions'), ['controller' => 'SdPhaseRoleSectionPermissions', 'action' => 'index']) ?> </li>
        <li><?= $this->Html->link(__('New Sd Phase Role Section Permission'), ['controller' => 'SdPhaseRoleSectionPermissions', 'action' => 'add']) ?> </li>
    </ul>
</nav>
<div class="sdPhaseRolePermissions view large-9 medium-8 columns content">
    <h3><?= h($sdPhaseRolePermission->id) ?></h3>
    <table class="vertical-table">
        <tr>
            <th scope="row"><?= __('Sd Phase') ?></th>
            <td><?= $sdPhaseRolePermission->has('sd_phase') ? $this->Html->link($sdPhaseRolePermission->sd_phase->id, ['controller' => 'SdPhases', 'action' => 'view', $sdPhaseRolePermission->sd_phase->id]) : '' ?></td>
        </tr>
        <tr>
            <th scope="row"><?= __('Sd Role') ?></th>
            <td><?= $sdPhaseRolePermission->has('sd_role') ? $this->Html->link($sdPhaseRolePermission->sd_role->id, ['controller' => 'SdRoles', 'action' => 'view', $sdPhaseRolePermission->sd_role->id]) : '' ?></td>
        </tr>
        <tr>
            <th scope="row"><?= __('Id') ?></th>
            <td><?= $this->Number->format($sdPhaseRolePermission->id) ?></td>
        </tr>
    </table>
    <div class="related">
        <h4><?= __('Related Sd Phase Role Section Permissions') ?></h4>
        <?php if (!empty($sdPhaseRolePermission->sd_phase_role_section_permissions)): ?>
        <table cellpadding="0" cellspacing="0">
            <tr>
                <th scope="col"><?= __('Id') ?></th>
                <th scope="col"><?= __('Sd Phase Role Permission Id') ?></th>
                <th scope="col"><?= __('Sd Section Id') ?></th>
                <th scope="col"><?= __('Action') ?></th>
                <th scope="col" class="actions"><?= __('Actions') ?></th>
            </tr>
            <?php foreach ($sdPhaseRolePermission->sd_phase_role_section_permissions as $sdPhaseRoleSectionPermissions): ?>
            <tr>
                <td><?= h($sdPhaseRoleSectionPermissions->id) ?></td>
                <td><?= h($sdPhaseRoleSectionPermissions->sd_phase_role_permission_id) ?></td>
                <td><?= h($sdPhaseRoleSectionPermissions->sd_section_id) ?></td>
                <td><?= h($sdPhaseRoleSectionPermissions->action) ?></td>
                <td class="actions">
                    <?= $this->Html->link(__('View'), ['controller' => 'SdPhaseRoleSectionPermissions', 'action' => 'view', $sdPhaseRoleSectionPermissions->id]) ?>
                    <?= $this->Html->link(__('Edit'), ['controller' => 'SdPhaseRoleSectionPermissions', 'action' => 'edit', $sdPhaseRoleSectionPermissions->id]) ?>
                    <?= $this->Form->postLink(__('Delete'), ['controller' => 'SdPhaseRoleSectionPermissions', 'action' => 'delete', $sdPhaseRoleSectionPermissions->id], ['confirm' => __('Are you sure you want to delete # {0}?', $sdPhaseRoleSectionPermissions->id)]) ?>
                </td>
            </tr>
            <?php endforeach; ?>
        </table>
        <?php endif; ?>
    </div>
</div>
