<?php
/**
 * @var \App\View\AppView $this
 * @var \App\Model\Entity\SdFieldValue[]|\Cake\Collection\CollectionInterface $sdFieldValues
 */
?>
<nav class="large-3 medium-4 columns" id="actions-sidebar">
    <ul class="side-nav">
        <li class="heading"><?= __('Actions') ?></li>
        <li><?= $this->Html->link(__('New Sd Field Value'), ['action' => 'add']) ?></li>
        <li><?= $this->Html->link(__('List Sd Cases'), ['controller' => 'SdCases', 'action' => 'index']) ?></li>
        <li><?= $this->Html->link(__('New Sd Case'), ['controller' => 'SdCases', 'action' => 'add']) ?></li>
        <li><?= $this->Html->link(__('List Sd Fields'), ['controller' => 'SdFields', 'action' => 'index']) ?></li>
        <li><?= $this->Html->link(__('New Sd Field'), ['controller' => 'SdFields', 'action' => 'add']) ?></li>
    </ul>
</nav>
<div class="sdFieldValues index large-9 medium-8 columns content">
    <h3><?= __('Sd Field Values') ?></h3>
    <table cellpadding="0" cellspacing="0">
        <thead>
            <tr>
                <th scope="col"><?= $this->Paginator->sort('id') ?></th>
                <th scope="col"><?= $this->Paginator->sort('sd_case_id') ?></th>
                <th scope="col"><?= $this->Paginator->sort('version_no') ?></th>
                <th scope="col"><?= $this->Paginator->sort('sd_field_id') ?></th>
                <th scope="col"><?= $this->Paginator->sort('set_number') ?></th>
                <th scope="col"><?= $this->Paginator->sort('created_time') ?></th>
                <th scope="col"><?= $this->Paginator->sort('status') ?></th>
                <th scope="col" class="actions"><?= __('Actions') ?></th>
            </tr>
        </thead>
        <tbody>
            <?php foreach ($sdFieldValues as $sdFieldValue): ?>
            <tr>
                <td><?= $this->Number->format($sdFieldValue->id) ?></td>
                <td><?= $sdFieldValue->has('sd_case') ? $this->Html->link($sdFieldValue->sd_case->id, ['controller' => 'SdCases', 'action' => 'view', $sdFieldValue->sd_case->id]) : '' ?></td>
                <td><?= h($sdFieldValue->version_no) ?></td>
                <td><?= $sdFieldValue->has('sd_field') ? $this->Html->link($sdFieldValue->sd_field->id, ['controller' => 'SdFields', 'action' => 'view', $sdFieldValue->sd_field->id]) : '' ?></td>
                <td><?= $this->Number->format($sdFieldValue->set_number) ?></td>
                <td><?= h($sdFieldValue->created_time) ?></td>
                <td><?= h($sdFieldValue->status) ?></td>
                <td class="actions">
                    <?= $this->Html->link(__('View'), ['action' => 'view', $sdFieldValue->id]) ?>
                    <?= $this->Html->link(__('Edit'), ['action' => 'edit', $sdFieldValue->id]) ?>
                    <?= $this->Form->postLink(__('Delete'), ['action' => 'delete', $sdFieldValue->id], ['confirm' => __('Are you sure you want to delete # {0}?', $sdFieldValue->id)]) ?>
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
