<?php
/**
 * @var \App\View\AppView $this
 * @var \App\Model\Entity\SdCase[]|\Cake\Collection\CollectionInterface $sdCases
 */
?>
<nav class="large-3 medium-4 columns" id="actions-sidebar">
    <ul class="side-nav">
        <li class="heading"><?= __('Actions') ?></li>
        <li><?= $this->Html->link(__('New Sd Case'), ['action' => 'add']) ?></li>
        <li><?= $this->Html->link(__('List Sd Products'), ['controller' => 'SdProducts', 'action' => 'index']) ?></li>
        <li><?= $this->Html->link(__('New Sd Product'), ['controller' => 'SdProducts', 'action' => 'add']) ?></li>
        <li><?= $this->Html->link(__('List Sd Phases'), ['controller' => 'SdPhases', 'action' => 'index']) ?></li>
        <li><?= $this->Html->link(__('New Sd Phase'), ['controller' => 'SdPhases', 'action' => 'add']) ?></li>
    </ul>
</nav>
<div class="sdCases index large-9 medium-8 columns content">
    <h3><?= __('Sd Cases') ?></h3>
    <table cellpadding="0" cellspacing="0">
        <thead>
            <tr>
                <th scope="col"><?= $this->Paginator->sort('id') ?></th>
                <th scope="col"><?= $this->Paginator->sort('caseNo') ?></th>
                <th scope="col"><?= $this->Paginator->sort('sd_product_id') ?></th>
                <th scope="col"><?= $this->Paginator->sort('sd_phase_id') ?></th>
                <th scope="col"><?= $this->Paginator->sort('status') ?></th>
                <th scope="col" class="actions"><?= __('Actions') ?></th>
            </tr>
        </thead>
        <tbody>
            <?php foreach ($sdCases as $sdCase): ?>
            <tr>
                <td><?= $this->Number->format($sdCase->id) ?></td>
                <td><?= h($sdCase->caseNo) ?></td>
                <td><?= $sdCase->has('sd_product') ? $this->Html->link($sdCase->sd_product->id, ['controller' => 'SdProducts', 'action' => 'view', $sdCase->sd_product->id]) : '' ?></td>
                <td><?= $sdCase->has('sd_phase') ? $this->Html->link($sdCase->sd_phase->id, ['controller' => 'SdPhases', 'action' => 'view', $sdCase->sd_phase->id]) : '' ?></td>
                <td><?= $this->Number->format($sdCase->status) ?></td>
                <td class="actions">
                    <?= $this->Html->link(__('View'), ['action' => 'view', $sdCase->id]) ?>
                    <?= $this->Html->link(__('Edit'), ['action' => 'edit', $sdCase->id]) ?>
                    <?= $this->Form->postLink(__('Delete'), ['action' => 'delete', $sdCase->id], ['confirm' => __('Are you sure you want to delete # {0}?', $sdCase->id)]) ?>
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
