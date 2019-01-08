<?php
/**
 * @var \App\View\AppView $this
 * @var \App\Model\Entity\SdProduct[]|\Cake\Collection\CollectionInterface $sdProducts
 */
?>
<nav class="large-3 medium-4 columns" id="actions-sidebar">
    <ul class="side-nav">
        <li class="heading"><?= __('Actions') ?></li>
        <li><?= $this->Html->link(__('New Sd Product'), ['action' => 'add']) ?></li>
        <li><?= $this->Html->link(__('List Sd Product Workflows'), ['controller' => 'SdProductWorkflows', 'action' => 'index']) ?></li>
        <li><?= $this->Html->link(__('New Sd Product Workflow'), ['controller' => 'SdProductWorkflows', 'action' => 'add']) ?></li>
    </ul>
</nav>
<div class="sdProducts index large-9 medium-8 columns content">
    <h3><?= __('Sd Products') ?></h3>
    <table cellpadding="0" cellspacing="0">
        <thead>
            <tr>
                <th scope="col"><?= $this->Paginator->sort('id') ?></th>
                <th scope="col"><?= $this->Paginator->sort('product_type') ?></th>
                <th scope="col"><?= $this->Paginator->sort('sponsor_company') ?></th>
                <th scope="col"><?= $this->Paginator->sort('status') ?></th>
                <th scope="col" class="actions"><?= __('Actions') ?></th>
            </tr>
        </thead>
        <tbody>
            <?php foreach ($sdProducts as $sdProduct): ?>
            <tr>
                <td><?= $this->Number->format($sdProduct->id) ?></td>
                <td><?= $this->Number->format($sdProduct->product_type) ?></td>
                <td><?= $this->Number->format($sdProduct->sponsor_company) ?></td>
                <td><?= $this->Number->format($sdProduct->status) ?></td>
                <td class="actions">
                    <?= $this->Html->link(__('View'), ['action' => 'view', $sdProduct->id]) ?>
                    <?= $this->Html->link(__('Edit'), ['action' => 'edit', $sdProduct->id]) ?>
                    <?= $this->Form->postLink(__('Delete'), ['action' => 'delete', $sdProduct->id], ['confirm' => __('Are you sure you want to delete # {0}?', $sdProduct->id)]) ?>
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
