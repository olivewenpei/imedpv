<?php
/**
 * @var \App\View\AppView $this
 * @var \App\Model\Entity\SdSectionStructure[]|\Cake\Collection\CollectionInterface $sdSectionStructures
 */
?>
<nav class="large-3 medium-4 columns" id="actions-sidebar">
    <ul class="side-nav">
        <li class="heading"><?= __('Actions') ?></li>
        <li><?= $this->Html->link(__('New Sd Section Structure'), ['action' => 'add']) ?></li>
        <li><?= $this->Html->link(__('List Sd Sections'), ['controller' => 'SdSections', 'action' => 'index']) ?></li>
        <li><?= $this->Html->link(__('New Sd Section'), ['controller' => 'SdSections', 'action' => 'add']) ?></li>
        <li><?= $this->Html->link(__('List Sd Fields'), ['controller' => 'SdFields', 'action' => 'index']) ?></li>
        <li><?= $this->Html->link(__('New Sd Field'), ['controller' => 'SdFields', 'action' => 'add']) ?></li>
        <li><?= $this->Html->link(__('List Sd Section Values'), ['controller' => 'SdSectionValues', 'action' => 'index']) ?></li>
        <li><?= $this->Html->link(__('New Sd Section Value'), ['controller' => 'SdSectionValues', 'action' => 'add']) ?></li>
    </ul>
</nav>
<div class="sdSectionStructures index large-9 medium-8 columns content">
    <h3><?= __('Sd Section Structures') ?></h3>
    <table cellpadding="0" cellspacing="0">
        <thead>
            <tr>
                <th scope="col"><?= $this->Paginator->sort('id') ?></th>
                <th scope="col"><?= $this->Paginator->sort('sd_section_id') ?></th>
                <th scope="col"><?= $this->Paginator->sort('sd_field_id') ?></th>
                <th scope="col"><?= $this->Paginator->sort('is_required') ?></th>
                <th scope="col" class="actions"><?= __('Actions') ?></th>
            </tr>
        </thead>
        <tbody>
            <?php foreach ($sdSectionStructures as $sdSectionStructure): ?>
            <tr>
                <td><?= $this->Number->format($sdSectionStructure->id) ?></td>
                <td><?= $sdSectionStructure->has('sd_section') ? $this->Html->link($sdSectionStructure->sd_section->id, ['controller' => 'SdSections', 'action' => 'view', $sdSectionStructure->sd_section->id]) : '' ?></td>
                <td><?= $sdSectionStructure->has('sd_field') ? $this->Html->link($sdSectionStructure->sd_field->id, ['controller' => 'SdFields', 'action' => 'view', $sdSectionStructure->sd_field->id]) : '' ?></td>
                <td><?= h($sdSectionStructure->is_required) ?></td>
                <td class="actions">
                    <?= $this->Html->link(__('View'), ['action' => 'view', $sdSectionStructure->id]) ?>
                    <?= $this->Html->link(__('Edit'), ['action' => 'edit', $sdSectionStructure->id]) ?>
                    <?= $this->Form->postLink(__('Delete'), ['action' => 'delete', $sdSectionStructure->id], ['confirm' => __('Are you sure you want to delete # {0}?', $sdSectionStructure->id)]) ?>
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
