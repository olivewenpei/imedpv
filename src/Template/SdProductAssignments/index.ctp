<?php
/**
 * @var \App\View\AppView $this
 * @var \App\Model\Entity\SdProductAssignment[]|\Cake\Collection\CollectionInterface $sdProductAssignments
 */
?>
<nav class="large-3 medium-4 columns" id="actions-sidebar">
    <ul class="side-nav">
        <li class="heading"><?= __('Actions') ?></li>
        <li><?= $this->Html->link(__('New Sd Product Assignment'), ['action' => 'add']) ?></li>
        <li><?= $this->Html->link(__('List Sd Products'), ['controller' => 'SdProducts', 'action' => 'index']) ?></li>
        <li><?= $this->Html->link(__('New Sd Product'), ['controller' => 'SdProducts', 'action' => 'add']) ?></li>
        <li><?= $this->Html->link(__('List Sd Phases'), ['controller' => 'SdPhases', 'action' => 'index']) ?></li>
        <li><?= $this->Html->link(__('New Sd Phase'), ['controller' => 'SdPhases', 'action' => 'add']) ?></li>
        <li><?= $this->Html->link(__('List Sd Companies'), ['controller' => 'SdCompanies', 'action' => 'index']) ?></li>
        <li><?= $this->Html->link(__('New Sd Company'), ['controller' => 'SdCompanies', 'action' => 'add']) ?></li>
    </ul>
</nav>
<div class="sdProductAssignments index large-9 medium-8 columns content">
    <h3><?= __('Sd Product Assignments') ?></h3>
    <table cellpadding="0" cellspacing="0">
        <thead>
            <tr>
                <th scope="col"><?= $this->Paginator->sort('id') ?></th>
                <th scope="col"><?= $this->Paginator->sort('sd_product_id') ?></th>
                <th scope="col"><?= $this->Paginator->sort('sd_phase_id') ?></th>
                <th scope="col"><?= $this->Paginator->sort('sd_company_id') ?></th>
                <th scope="col" class="actions"><?= __('Actions') ?></th>
            </tr>
        </thead>
        <tbody>
            <?php foreach ($sdProductAssignments as $sdProductAssignment): ?>
            <tr>
                <td><?= $this->Number->format($sdProductAssignment->id) ?></td>
                <td><?= $sdProductAssignment->has('sd_product') ? $this->Html->link($sdProductAssignment->sd_product->id, ['controller' => 'SdProducts', 'action' => 'view', $sdProductAssignment->sd_product->id]) : '' ?></td>
                <td><?= $sdProductAssignment->has('sd_phase') ? $this->Html->link($sdProductAssignment->sd_phase->id, ['controller' => 'SdPhases', 'action' => 'view', $sdProductAssignment->sd_phase->id]) : '' ?></td>
                <td><?= $sdProductAssignment->has('sd_company') ? $this->Html->link($sdProductAssignment->sd_company->id, ['controller' => 'SdCompanies', 'action' => 'view', $sdProductAssignment->sd_company->id]) : '' ?></td>
                <td class="actions">
                    <?= $this->Html->link(__('View'), ['action' => 'view', $sdProductAssignment->id]) ?>
                    <?= $this->Html->link(__('Edit'), ['action' => 'edit', $sdProductAssignment->id]) ?>
                    <?= $this->Form->postLink(__('Delete'), ['action' => 'delete', $sdProductAssignment->id], ['confirm' => __('Are you sure you want to delete # {0}?', $sdProductAssignment->id)]) ?>
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
