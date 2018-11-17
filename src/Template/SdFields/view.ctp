<?php
/**
 * @var \App\View\AppView $this
 * @var \App\Model\Entity\SdField $sdField
 */
?>
<nav class="large-3 medium-4 columns" id="actions-sidebar">
    <ul class="side-nav">
        <li class="heading"><?= __('Actions') ?></li>
        <li><?= $this->Html->link(__('Edit Sd Field'), ['action' => 'edit', $sdField->id]) ?> </li>
        <li><?= $this->Form->postLink(__('Delete Sd Field'), ['action' => 'delete', $sdField->id], ['confirm' => __('Are you sure you want to delete # {0}?', $sdField->id)]) ?> </li>
        <li><?= $this->Html->link(__('List Sd Fields'), ['action' => 'index']) ?> </li>
        <li><?= $this->Html->link(__('New Sd Field'), ['action' => 'add']) ?> </li>
        <li><?= $this->Html->link(__('List Sd Element Types'), ['controller' => 'SdElementTypes', 'action' => 'index']) ?> </li>
        <li><?= $this->Html->link(__('New Sd Element Type'), ['controller' => 'SdElementTypes', 'action' => 'add']) ?> </li>
        <li><?= $this->Html->link(__('List Sd Section Structures'), ['controller' => 'SdSectionStructures', 'action' => 'index']) ?> </li>
        <li><?= $this->Html->link(__('New Sd Section Structure'), ['controller' => 'SdSectionStructures', 'action' => 'add']) ?> </li>
    </ul>
</nav>
<div class="sdFields view large-9 medium-8 columns content">
    <h3><?= h($sdField->id) ?></h3>
    <table class="vertical-table">
        <tr>
            <th scope="row"><?= __('Organization') ?></th>
            <td><?= h($sdField->organization) ?></td>
        </tr>
        <tr>
            <th scope="row"><?= __('Descriptor') ?></th>
            <td><?= h($sdField->descriptor) ?></td>
        </tr>
        <tr>
            <th scope="row"><?= __('E2b Code') ?></th>
            <td><?= h($sdField->e2b_code) ?></td>
        </tr>
        <tr>
            <th scope="row"><?= __('Field Type') ?></th>
            <td><?= h($sdField->field_type) ?></td>
        </tr>
        <tr>
            <th scope="row"><?= __('Field Label') ?></th>
            <td><?= h($sdField->field_label) ?></td>
        </tr>
        <tr>
            <th scope="row"><?= __('Sd Element Type') ?></th>
            <td><?= $sdField->has('sd_element_type') ? $this->Html->link($sdField->sd_element_type->id, ['controller' => 'SdElementTypes', 'action' => 'view', $sdField->sd_element_type->id]) : '' ?></td>
        </tr>
        <tr>
            <th scope="row"><?= __('Comment') ?></th>
            <td><?= h($sdField->comment) ?></td>
        </tr>
        <tr>
            <th scope="row"><?= __('Id') ?></th>
            <td><?= $this->Number->format($sdField->id) ?></td>
        </tr>
        <tr>
            <th scope="row"><?= __('Version') ?></th>
            <td><?= $this->Number->format($sdField->version) ?></td>
        </tr>
        <tr>
            <th scope="row"><?= __('Field Length') ?></th>
            <td><?= $this->Number->format($sdField->field_length) ?></td>
        </tr>
        <tr>
            <th scope="row"><?= __('Is E2b') ?></th>
            <td><?= $sdField->is_e2b ? __('Yes') : __('No'); ?></td>
        </tr>
    </table>
    <div class="related">
        <h4><?= __('Related Sd Section Structures') ?></h4>
        <?php if (!empty($sdField->sd_section_structures)): ?>
        <table cellpadding="0" cellspacing="0">
            <tr>
                <th scope="col"><?= __('Id') ?></th>
                <th scope="col"><?= __('Sd Section Id') ?></th>
                <th scope="col"><?= __('Sd Field Id') ?></th>
                <th scope="col"><?= __('Position') ?></th>
                <th scope="col"><?= __('Is Required') ?></th>
                <th scope="col" class="actions"><?= __('Actions') ?></th>
            </tr>
            <?php foreach ($sdField->sd_section_structures as $sdSectionStructures): ?>
            <tr>
                <td><?= h($sdSectionStructures->id) ?></td>
                <td><?= h($sdSectionStructures->sd_section_id) ?></td>
                <td><?= h($sdSectionStructures->sd_field_id) ?></td>
                <td><?= h($sdSectionStructures->position) ?></td>
                <td><?= h($sdSectionStructures->is_required) ?></td>
                <td class="actions">
                    <?= $this->Html->link(__('View'), ['controller' => 'SdSectionStructures', 'action' => 'view', $sdSectionStructures->id]) ?>
                    <?= $this->Html->link(__('Edit'), ['controller' => 'SdSectionStructures', 'action' => 'edit', $sdSectionStructures->id]) ?>
                    <?= $this->Form->postLink(__('Delete'), ['controller' => 'SdSectionStructures', 'action' => 'delete', $sdSectionStructures->id], ['confirm' => __('Are you sure you want to delete # {0}?', $sdSectionStructures->id)]) ?>
                </td>
            </tr>
            <?php endforeach; ?>
        </table>
        <?php endif; ?>
    </div>
</div>
