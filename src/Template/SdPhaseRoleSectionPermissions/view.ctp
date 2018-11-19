<?php
/**
 * @var \App\View\AppView $this
 * @var \App\Model\Entity\SdPhaseRoleSectionPermission $sdPhaseRoleSectionPermission
 */
?>
<nav class="large-3 medium-4 columns" id="actions-sidebar">
    <ul class="side-nav">
        <li class="heading"><?= __('Actions') ?></li>
        <li><?= $this->Html->link(__('Edit Sd Phase Role Section Permission'), ['action' => 'edit', $sdPhaseRoleSectionPermission->id]) ?> </li>
        <li><?= $this->Form->postLink(__('Delete Sd Phase Role Section Permission'), ['action' => 'delete', $sdPhaseRoleSectionPermission->id], ['confirm' => __('Are you sure you want to delete # {0}?', $sdPhaseRoleSectionPermission->id)]) ?> </li>
        <li><?= $this->Html->link(__('List Sd Phase Role Section Permissions'), ['action' => 'index']) ?> </li>
        <li><?= $this->Html->link(__('New Sd Phase Role Section Permission'), ['action' => 'add']) ?> </li>
        <li><?= $this->Html->link(__('List Sd Phase Role Permissions'), ['controller' => 'SdPhaseRolePermissions', 'action' => 'index']) ?> </li>
        <li><?= $this->Html->link(__('New Sd Phase Role Permission'), ['controller' => 'SdPhaseRolePermissions', 'action' => 'add']) ?> </li>
        <li><?= $this->Html->link(__('List Sd Sections'), ['controller' => 'SdSections', 'action' => 'index']) ?> </li>
        <li><?= $this->Html->link(__('New Sd Section'), ['controller' => 'SdSections', 'action' => 'add']) ?> </li>
    </ul>
</nav>
<div class="sdPhaseRoleSectionPermissions view large-9 medium-8 columns content">
    <h3><?= h($sdPhaseRoleSectionPermission->id) ?></h3>
    <table class="vertical-table">
        <tr>
            <th scope="row"><?= __('Sd Phase Role Permission') ?></th>
            <td><?= $sdPhaseRoleSectionPermission->has('sd_phase_role_permission') ? $this->Html->link($sdPhaseRoleSectionPermission->sd_phase_role_permission->id, ['controller' => 'SdPhaseRolePermissions', 'action' => 'view', $sdPhaseRoleSectionPermission->sd_phase_role_permission->id]) : '' ?></td>
        </tr>
        <tr>
            <th scope="row"><?= __('Sd Section') ?></th>
            <td><?= $sdPhaseRoleSectionPermission->has('sd_section') ? $this->Html->link($sdPhaseRoleSectionPermission->sd_section->id, ['controller' => 'SdSections', 'action' => 'view', $sdPhaseRoleSectionPermission->sd_section->id]) : '' ?></td>
        </tr>
        <tr>
            <th scope="row"><?= __('Id') ?></th>
            <td><?= $this->Number->format($sdPhaseRoleSectionPermission->id) ?></td>
        </tr>
        <tr>
            <th scope="row"><?= __('Action') ?></th>
            <td><?= $this->Number->format($sdPhaseRoleSectionPermission->action) ?></td>
        </tr>
    </table>
</div>
