<?php
/**
 * @var \App\View\AppView $this
 * @var \App\Model\Entity\SdField[]|\Cake\Collection\CollectionInterface $sdFields
 */
?>
<nav class="large-3 medium-4 columns" id="actions-sidebar">
    <ul class="side-nav">
        <li class="heading"><?= __('Actions') ?></li>
        <li><?= $this->Html->link(__('New Sd Field'), ['action' => 'add']) ?></li>
        <li><?= $this->Html->link(__('List Sd Element Types'), ['controller' => 'SdElementTypes', 'action' => 'index']) ?></li>
        <li><?= $this->Html->link(__('New Sd Element Type'), ['controller' => 'SdElementTypes', 'action' => 'add']) ?></li>
        <li><?= $this->Html->link(__('List Sd Field Value Look Ups'), ['controller' => 'SdFieldValueLookUps', 'action' => 'index']) ?></li>
        <li><?= $this->Html->link(__('New Sd Field Value Look Up'), ['controller' => 'SdFieldValueLookUps', 'action' => 'add']) ?></li>
        <li><?= $this->Html->link(__('List Sd Section Structures'), ['controller' => 'SdSectionStructures', 'action' => 'index']) ?></li>
        <li><?= $this->Html->link(__('New Sd Section Structure'), ['controller' => 'SdSectionStructures', 'action' => 'add']) ?></li>
    </ul>
</nav>
<div class="sdFields index large-9 medium-8 columns content">
    <h3><?= __('Sd Fields') ?></h3>
    <table cellpadding="0" cellspacing="0">
        <thead>
            <tr>
                <th scope="col"><?= $this->Paginator->sort('id') ?></th>
                <th scope="col"><?= $this->Paginator->sort('organization') ?></th>
                <th scope="col"><?= $this->Paginator->sort('descriptor') ?></th>
                <th scope="col"><?= $this->Paginator->sort('e2b_code') ?></th>
                <th scope="col"><?= $this->Paginator->sort('version') ?></th>
                <th scope="col"><?= $this->Paginator->sort('is_e2b') ?></th>
                <th scope="col"><?= $this->Paginator->sort('field_length') ?></th>
                <th scope="col"><?= $this->Paginator->sort('field_type') ?></th>
                <th scope="col"><?= $this->Paginator->sort('field_label') ?></th>
                <th scope="col"><?= $this->Paginator->sort('sd_element_type_id') ?></th>
                <th scope="col"><?= $this->Paginator->sort('comment') ?></th>
                <th scope="col" class="actions"><?= __('Actions') ?></th>
            </tr>
        </thead>
        <tbody>
            <?php foreach ($sdFields as $sdField): ?>
            <tr>
                <td><?= $this->Number->format($sdField->id) ?></td>
                <td><?= h($sdField->organization) ?></td>
                <td><?= h($sdField->descriptor) ?></td>
                <td><?= h($sdField->e2b_code) ?></td>
                <td><?= $this->Number->format($sdField->version) ?></td>
                <td><?= h($sdField->is_e2b) ?></td>
                <td><?= $this->Number->format($sdField->field_length) ?></td>
                <td><?= h($sdField->field_type) ?></td>
                <td><?= h($sdField->field_label) ?></td>
                <td><?= $sdField->has('sd_element_type') ? $this->Html->link($sdField->sd_element_type->id, ['controller' => 'SdElementTypes', 'action' => 'view', $sdField->sd_element_type->id]) : '' ?></td>
                <td><?= h($sdField->comment) ?></td>
                <td class="actions">
                    <?= $this->Html->link(__('View'), ['action' => 'view', $sdField->id]) ?>
                    <?= $this->Html->link(__('Edit'), ['action' => 'edit', $sdField->id]) ?>
                    <?= $this->Form->postLink(__('Delete'), ['action' => 'delete', $sdField->id], ['confirm' => __('Are you sure you want to delete # {0}?', $sdField->id)]) ?>
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
