<?php
/**
 * @var \App\View\AppView $this
 * @var \App\Model\Entity\SdSection[]|\Cake\Collection\CollectionInterface $sdSections
 */
?>
<nav class="large-3 medium-4 columns" id="actions-sidebar">
    <ul class="side-nav">
        <li class="heading"><?= __('Actions') ?></li>
        <li><?= $this->Html->link(__('New Sd Section'), ['action' => 'add']) ?></li>
        <li><?= $this->Html->link(__('List Sd Tabs'), ['controller' => 'SdTabs', 'action' => 'index']) ?></li>
        <li><?= $this->Html->link(__('New Sd Tab'), ['controller' => 'SdTabs', 'action' => 'add']) ?></li>
        <li><?= $this->Html->link(__('List Sd Section Structures'), ['controller' => 'SdSectionStructures', 'action' => 'index']) ?></li>
        <li><?= $this->Html->link(__('New Sd Section Structure'), ['controller' => 'SdSectionStructures', 'action' => 'add']) ?></li>
    </ul>
</nav>
<div class="sdSections index large-9 medium-8 columns content">
    <h3><?= __('Sd Sections') ?></h3>
    <table cellpadding="0" cellspacing="0">
        <thead>
            <tr>
                <th scope="col"><?= $this->Paginator->sort('id') ?></th>
                <th scope="col"><?= $this->Paginator->sort('section_name') ?></th>
                <th scope="col"><?= $this->Paginator->sort('section_level') ?></th>
                <th scope="col"><?= $this->Paginator->sort('parent_section') ?></th>
                <th scope="col"><?= $this->Paginator->sort('sd_tab_id') ?></th>
                <th scope="col"><?= $this->Paginator->sort('is_addable') ?></th>
                <th scope="col"><?= $this->Paginator->sort('display_order') ?></th>
                <th scope="col"><?= $this->Paginator->sort('status') ?></th>
                <th scope="col" class="actions"><?= __('Actions') ?></th>
            </tr>
        </thead>
        <tbody>
            <?php foreach ($sdSections as $sdSection): ?>
            <tr>
                <td><?= $this->Number->format($sdSection->id) ?></td>
                <td><?= h($sdSection->section_name) ?></td>
                <td><?= $this->Number->format($sdSection->section_level) ?></td>
                <td><?= $this->Number->format($sdSection->parent_section) ?></td>
                <td><?= $sdSection->has('sd_tab') ? $this->Html->link($sdSection->sd_tab->id, ['controller' => 'SdTabs', 'action' => 'view', $sdSection->sd_tab->id]) : '' ?></td>
                <td><?= h($sdSection->is_addable) ?></td>
                <td><?= $this->Number->format($sdSection->display_order) ?></td>
                <td><?= h($sdSection->status) ?></td>
                <td class="actions">
                    <?= $this->Html->link(__('View'), ['action' => 'view', $sdSection->id]) ?>
                    <?= $this->Html->link(__('Edit'), ['action' => 'edit', $sdSection->id]) ?>
                    <?= $this->Form->postLink(__('Delete'), ['action' => 'delete', $sdSection->id], ['confirm' => __('Are you sure you want to delete # {0}?', $sdSection->id)]) ?>
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
