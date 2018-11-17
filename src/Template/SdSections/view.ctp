<?php
/**
 * @var \App\View\AppView $this
 * @var \App\Model\Entity\SdSection $sdSection
 */
?>
<nav class="large-3 medium-4 columns" id="actions-sidebar">
    <ul class="side-nav">
        <li class="heading"><?= __('Actions') ?></li>
        <li><?= $this->Html->link(__('Edit Sd Section'), ['action' => 'edit', $sdSection->id]) ?> </li>
        <li><?= $this->Form->postLink(__('Delete Sd Section'), ['action' => 'delete', $sdSection->id], ['confirm' => __('Are you sure you want to delete # {0}?', $sdSection->id)]) ?> </li>
        <li><?= $this->Html->link(__('List Sd Sections'), ['action' => 'index']) ?> </li>
        <li><?= $this->Html->link(__('New Sd Section'), ['action' => 'add']) ?> </li>
        <li><?= $this->Html->link(__('List Sd Tabs'), ['controller' => 'SdTabs', 'action' => 'index']) ?> </li>
        <li><?= $this->Html->link(__('New Sd Tab'), ['controller' => 'SdTabs', 'action' => 'add']) ?> </li>
        <li><?= $this->Html->link(__('List Sd Section Structures'), ['controller' => 'SdSectionStructures', 'action' => 'index']) ?> </li>
        <li><?= $this->Html->link(__('New Sd Section Structure'), ['controller' => 'SdSectionStructures', 'action' => 'add']) ?> </li>
    </ul>
</nav>
<div class="sdSections view large-9 medium-8 columns content">
    <h3><?= h($sdSection->id) ?></h3>
    <table class="vertical-table">
        <tr>
            <th scope="row"><?= __('Section Name') ?></th>
            <td><?= h($sdSection->section_name) ?></td>
        </tr>
        <tr>
            <th scope="row"><?= __('Sd Tab') ?></th>
            <td><?= $sdSection->has('sd_tab') ? $this->Html->link($sdSection->sd_tab->id, ['controller' => 'SdTabs', 'action' => 'view', $sdSection->sd_tab->id]) : '' ?></td>
        </tr>
        <tr>
            <th scope="row"><?= __('Id') ?></th>
            <td><?= $this->Number->format($sdSection->id) ?></td>
        </tr>
        <tr>
            <th scope="row"><?= __('Section Level') ?></th>
            <td><?= $this->Number->format($sdSection->section_level) ?></td>
        </tr>
        <tr>
            <th scope="row"><?= __('Parent Section') ?></th>
            <td><?= $this->Number->format($sdSection->parent_section) ?></td>
        </tr>
        <tr>
            <th scope="row"><?= __('Display Order') ?></th>
            <td><?= $this->Number->format($sdSection->display_order) ?></td>
        </tr>
        <tr>
            <th scope="row"><?= __('Is Addable') ?></th>
            <td><?= $sdSection->is_addable ? __('Yes') : __('No'); ?></td>
        </tr>
        <tr>
            <th scope="row"><?= __('Status') ?></th>
            <td><?= $sdSection->status ? __('Yes') : __('No'); ?></td>
        </tr>
    </table>
    <div class="related">
        <h4><?= __('Related Sd Section Structures') ?></h4>
        <?php if (!empty($sdSection->sd_section_structures)): ?>
        <table cellpadding="0" cellspacing="0">
            <tr>
                <th scope="col"><?= __('Id') ?></th>
                <th scope="col"><?= __('Sd Section Id') ?></th>
                <th scope="col"><?= __('Sd Field Id') ?></th>
                <th scope="col"><?= __('Position') ?></th>
                <th scope="col"><?= __('Is Required') ?></th>
                <th scope="col" class="actions"><?= __('Actions') ?></th>
            </tr>
            <?php foreach ($sdSection->sd_section_structures as $sdSectionStructures): ?>
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
