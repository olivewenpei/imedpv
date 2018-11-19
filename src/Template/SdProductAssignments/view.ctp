<?php
/**
 * @var \App\View\AppView $this
 * @var \App\Model\Entity\SdProductAssignment $sdProductAssignment
 */
?>
<nav class="large-3 medium-4 columns" id="actions-sidebar">
    <ul class="side-nav">
        <li class="heading"><?= __('Actions') ?></li>
        <li><?= $this->Html->link(__('Edit Sd Product Assignment'), ['action' => 'edit', $sdProductAssignment->id]) ?> </li>
        <li><?= $this->Form->postLink(__('Delete Sd Product Assignment'), ['action' => 'delete', $sdProductAssignment->id], ['confirm' => __('Are you sure you want to delete # {0}?', $sdProductAssignment->id)]) ?> </li>
        <li><?= $this->Html->link(__('List Sd Product Assignments'), ['action' => 'index']) ?> </li>
        <li><?= $this->Html->link(__('New Sd Product Assignment'), ['action' => 'add']) ?> </li>
        <li><?= $this->Html->link(__('List Sd Products'), ['controller' => 'SdProducts', 'action' => 'index']) ?> </li>
        <li><?= $this->Html->link(__('New Sd Product'), ['controller' => 'SdProducts', 'action' => 'add']) ?> </li>
        <li><?= $this->Html->link(__('List Sd Phases'), ['controller' => 'SdPhases', 'action' => 'index']) ?> </li>
        <li><?= $this->Html->link(__('New Sd Phase'), ['controller' => 'SdPhases', 'action' => 'add']) ?> </li>
        <li><?= $this->Html->link(__('List Sd Companies'), ['controller' => 'SdCompanies', 'action' => 'index']) ?> </li>
        <li><?= $this->Html->link(__('New Sd Company'), ['controller' => 'SdCompanies', 'action' => 'add']) ?> </li>
    </ul>
</nav>
<div class="sdProductAssignments view large-9 medium-8 columns content">
    <h3><?= h($sdProductAssignment->id) ?></h3>
    <table class="vertical-table">
        <tr>
            <th scope="row"><?= __('Sd Product') ?></th>
            <td><?= $sdProductAssignment->has('sd_product') ? $this->Html->link($sdProductAssignment->sd_product->id, ['controller' => 'SdProducts', 'action' => 'view', $sdProductAssignment->sd_product->id]) : '' ?></td>
        </tr>
        <tr>
            <th scope="row"><?= __('Sd Phase') ?></th>
            <td><?= $sdProductAssignment->has('sd_phase') ? $this->Html->link($sdProductAssignment->sd_phase->id, ['controller' => 'SdPhases', 'action' => 'view', $sdProductAssignment->sd_phase->id]) : '' ?></td>
        </tr>
        <tr>
            <th scope="row"><?= __('Sd Company') ?></th>
            <td><?= $sdProductAssignment->has('sd_company') ? $this->Html->link($sdProductAssignment->sd_company->id, ['controller' => 'SdCompanies', 'action' => 'view', $sdProductAssignment->sd_company->id]) : '' ?></td>
        </tr>
        <tr>
            <th scope="row"><?= __('Id') ?></th>
            <td><?= $this->Number->format($sdProductAssignment->id) ?></td>
        </tr>
    </table>
</div>
