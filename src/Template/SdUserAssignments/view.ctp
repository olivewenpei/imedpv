<?php
/**
 * @var \App\View\AppView $this
 * @var \App\Model\Entity\SdUserAssignment $sdUserAssignment
 */
?>
<nav class="large-3 medium-4 columns" id="actions-sidebar">
    <ul class="side-nav">
        <li class="heading"><?= __('Actions') ?></li>
        <li><?= $this->Html->link(__('Edit Sd User Assignment'), ['action' => 'edit', $sdUserAssignment->id]) ?> </li>
        <li><?= $this->Form->postLink(__('Delete Sd User Assignment'), ['action' => 'delete', $sdUserAssignment->id], ['confirm' => __('Are you sure you want to delete # {0}?', $sdUserAssignment->id)]) ?> </li>
        <li><?= $this->Html->link(__('List Sd User Assignments'), ['action' => 'index']) ?> </li>
        <li><?= $this->Html->link(__('New Sd User Assignment'), ['action' => 'add']) ?> </li>
        <li><?= $this->Html->link(__('List Sd Users'), ['controller' => 'SdUsers', 'action' => 'index']) ?> </li>
        <li><?= $this->Html->link(__('New Sd User'), ['controller' => 'SdUsers', 'action' => 'add']) ?> </li>
    </ul>
</nav>
<div class="sdUserAssignments view large-9 medium-8 columns content">
    <h3><?= h($sdUserAssignment->id) ?></h3>
    <table class="vertical-table">
        <tr>
            <th scope="row"><?= __('Sd User') ?></th>
            <td><?= $sdUserAssignment->has('sd_user') ? $this->Html->link($sdUserAssignment->sd_user->title, ['controller' => 'SdUsers', 'action' => 'view', $sdUserAssignment->sd_user->id]) : '' ?></td>
        </tr>
        <tr>
            <th scope="row"><?= __('Id') ?></th>
            <td><?= $this->Number->format($sdUserAssignment->id) ?></td>
        </tr>
        <tr>
            <th scope="row"><?= __('Sd Product Assignment Id') ?></th>
            <td><?= $this->Number->format($sdUserAssignment->sd_product_assignment_id) ?></td>
        </tr>
        <tr>
            <th scope="row"><?= __('Sd Activity Id') ?></th>
            <td><?= $this->Number->format($sdUserAssignment->sd_activity_id) ?></td>
        </tr>
    </table>
</div>
