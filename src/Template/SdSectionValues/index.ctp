<?php
/**
 * @var \App\View\AppView $this
 * @var \App\Model\Entity\SdSectionValue[]|\Cake\Collection\CollectionInterface $sdSectionValues
 */
?>
<nav class="large-3 medium-4 columns" id="actions-sidebar">
    <ul class="side-nav">
        <li class="heading"><?= __('Actions') ?></li>
        <li><?= $this->Html->link(__('New Sd Section Value'), ['action' => 'add']) ?></li>
        <li><?= $this->Html->link(__('List Sd Section Structures'), ['controller' => 'SdSectionStructures', 'action' => 'index']) ?></li>
        <li><?= $this->Html->link(__('New Sd Section Structure'), ['controller' => 'SdSectionStructures', 'action' => 'add']) ?></li>
        <li><?= $this->Html->link(__('List Sd Activity Log'), ['controller' => 'SdActivityLog', 'action' => 'index']) ?></li>
        <li><?= $this->Html->link(__('New Sd Activity Log'), ['controller' => 'SdActivityLog', 'action' => 'add']) ?></li>
    </ul>
</nav>
<div class="sdSectionValues index large-9 medium-8 columns content">
    <h3><?= __('Sd Section Values') ?></h3>
    <table cellpadding="0" cellspacing="0">
        <thead>
            <tr>
                <th scope="col"><?= $this->Paginator->sort('id') ?></th>
                <th scope="col"><?= $this->Paginator->sort('case_no') ?></th>
                <th scope="col"><?= $this->Paginator->sort('version_no') ?></th>
                <th scope="col"><?= $this->Paginator->sort('sd_section_structure_id') ?></th>
                <th scope="col"><?= $this->Paginator->sort('set_number') ?></th>
                <th scope="col"><?= $this->Paginator->sort('created_time') ?></th>
                <th scope="col"><?= $this->Paginator->sort('status') ?></th>
                <th scope="col" class="actions"><?= __('Actions') ?></th>
            </tr>
        </thead>
        <tbody>
            <?php foreach ($sdSectionValues as $sdSectionValue): ?>
            <tr>
                <td><?= $this->Number->format($sdSectionValue->id) ?></td>
                <td><?= h($sdSectionValue->case_no) ?></td>
                <td><?= h($sdSectionValue->version_no) ?></td>
                <td><?= $sdSectionValue->has('sd_section_structure') ? $this->Html->link($sdSectionValue->sd_section_structure->id, ['controller' => 'SdSectionStructures', 'action' => 'view', $sdSectionValue->sd_section_structure->id]) : '' ?></td>
                <td><?= $this->Number->format($sdSectionValue->set_number) ?></td>
                <td><?= h($sdSectionValue->created_time) ?></td>
                <td><?= h($sdSectionValue->status) ?></td>
                <td class="actions">
                    <?= $this->Html->link(__('View'), ['action' => 'view', $sdSectionValue->id]) ?>
                    <?= $this->Html->link(__('Edit'), ['action' => 'edit', $sdSectionValue->id]) ?>
                    <?= $this->Form->postLink(__('Delete'), ['action' => 'delete', $sdSectionValue->id], ['confirm' => __('Are you sure you want to delete # {0}?', $sdSectionValue->id)]) ?>
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
