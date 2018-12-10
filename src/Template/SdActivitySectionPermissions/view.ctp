<?php
/**
 * @var \App\View\AppView $this
 * @var \App\Model\Entity\SdActivitySectionPermission $sdActivitySectionPermission
 */
?>
<nav class="large-3 medium-4 columns" id="actions-sidebar">
    <ul class="side-nav">
        <li class="heading"><?= __('Actions') ?></li>
        <li><?= $this->Html->link(__('Edit Sd Activity Section Permission'), ['action' => 'edit', $sdActivitySectionPermission->id]) ?> </li>
        <li><?= $this->Form->postLink(__('Delete Sd Activity Section Permission'), ['action' => 'delete', $sdActivitySectionPermission->id], ['confirm' => __('Are you sure you want to delete # {0}?', $sdActivitySectionPermission->id)]) ?> </li>
        <li><?= $this->Html->link(__('List Sd Activity Section Permissions'), ['action' => 'index']) ?> </li>
        <li><?= $this->Html->link(__('New Sd Activity Section Permission'), ['action' => 'add']) ?> </li>
        <li><?= $this->Html->link(__('List Sd Activities'), ['controller' => 'SdActivities', 'action' => 'index']) ?> </li>
        <li><?= $this->Html->link(__('New Sd Activity'), ['controller' => 'SdActivities', 'action' => 'add']) ?> </li>
        <li><?= $this->Html->link(__('List Sd Sections'), ['controller' => 'SdSections', 'action' => 'index']) ?> </li>
        <li><?= $this->Html->link(__('New Sd Section'), ['controller' => 'SdSections', 'action' => 'add']) ?> </li>
    </ul>
</nav>
<div class="sdActivitySectionPermissions view large-9 medium-8 columns content">
    <h3><?= h($sdActivitySectionPermission->id) ?></h3>
    <table class="vertical-table">
        <tr>
            <th scope="row"><?= __('Sd Activity') ?></th>
            <td><?= $sdActivitySectionPermission->has('sd_activity') ? $this->Html->link($sdActivitySectionPermission->sd_activity->id, ['controller' => 'SdActivities', 'action' => 'view', $sdActivitySectionPermission->sd_activity->id]) : '' ?></td>
        </tr>
        <tr>
            <th scope="row"><?= __('Sd Section') ?></th>
            <td><?= $sdActivitySectionPermission->has('sd_section') ? $this->Html->link($sdActivitySectionPermission->sd_section->id, ['controller' => 'SdSections', 'action' => 'view', $sdActivitySectionPermission->sd_section->id]) : '' ?></td>
        </tr>
        <tr>
            <th scope="row"><?= __('Id') ?></th>
            <td><?= $this->Number->format($sdActivitySectionPermission->id) ?></td>
        </tr>
        <tr>
            <th scope="row"><?= __('Action') ?></th>
            <td><?= $this->Number->format($sdActivitySectionPermission->action) ?></td>
        </tr>
    </table>
</div>
