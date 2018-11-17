<?php
/**
 * @var \App\View\AppView $this
 * @var \App\Model\Entity\SdSectionStructure $sdSectionStructure
 */
?>
<nav class="large-3 medium-4 columns" id="actions-sidebar">
    <ul class="side-nav">
        <li class="heading"><?= __('Actions') ?></li>
        <li><?= $this->Html->link(__('Edit Sd Section Structure'), ['action' => 'edit', $sdSectionStructure->id]) ?> </li>
        <li><?= $this->Form->postLink(__('Delete Sd Section Structure'), ['action' => 'delete', $sdSectionStructure->id], ['confirm' => __('Are you sure you want to delete # {0}?', $sdSectionStructure->id)]) ?> </li>
        <li><?= $this->Html->link(__('List Sd Section Structures'), ['action' => 'index']) ?> </li>
        <li><?= $this->Html->link(__('New Sd Section Structure'), ['action' => 'add']) ?> </li>
        <li><?= $this->Html->link(__('List Sd Sections'), ['controller' => 'SdSections', 'action' => 'index']) ?> </li>
        <li><?= $this->Html->link(__('New Sd Section'), ['controller' => 'SdSections', 'action' => 'add']) ?> </li>
        <li><?= $this->Html->link(__('List Sd Fields'), ['controller' => 'SdFields', 'action' => 'index']) ?> </li>
        <li><?= $this->Html->link(__('New Sd Field'), ['controller' => 'SdFields', 'action' => 'add']) ?> </li>
        <li><?= $this->Html->link(__('List Sd Section Values'), ['controller' => 'SdSectionValues', 'action' => 'index']) ?> </li>
        <li><?= $this->Html->link(__('New Sd Section Value'), ['controller' => 'SdSectionValues', 'action' => 'add']) ?> </li>
    </ul>
</nav>
<div class="sdSectionStructures view large-9 medium-8 columns content">
    <h3><?= h($sdSectionStructure->id) ?></h3>
    <table class="vertical-table">
        <tr>
            <th scope="row"><?= __('Sd Section') ?></th>
            <td><?= $sdSectionStructure->has('sd_section') ? $this->Html->link($sdSectionStructure->sd_section->id, ['controller' => 'SdSections', 'action' => 'view', $sdSectionStructure->sd_section->id]) : '' ?></td>
        </tr>
        <tr>
            <th scope="row"><?= __('Sd Field') ?></th>
            <td><?= $sdSectionStructure->has('sd_field') ? $this->Html->link($sdSectionStructure->sd_field->id, ['controller' => 'SdFields', 'action' => 'view', $sdSectionStructure->sd_field->id]) : '' ?></td>
        </tr>
        <tr>
            <th scope="row"><?= __('Id') ?></th>
            <td><?= $this->Number->format($sdSectionStructure->id) ?></td>
        </tr>
        <tr>
            <th scope="row"><?= __('Is Required') ?></th>
            <td><?= $sdSectionStructure->is_required ? __('Yes') : __('No'); ?></td>
        </tr>
    </table>
    <div class="row">
        <h4><?= __('Position') ?></h4>
        <?= $this->Text->autoParagraph(h($sdSectionStructure->position)); ?>
    </div>
    <div class="related">
        <h4><?= __('Related Sd Section Values') ?></h4>
        <?php if (!empty($sdSectionStructure->sd_section_values)): ?>
        <table cellpadding="0" cellspacing="0">
            <tr>
                <th scope="col"><?= __('Id') ?></th>
                <th scope="col"><?= __('Case No') ?></th>
                <th scope="col"><?= __('Version No') ?></th>
                <th scope="col"><?= __('Sd Section Structure Id') ?></th>
                <th scope="col"><?= __('Set Number') ?></th>
                <th scope="col"><?= __('Field Value') ?></th>
                <th scope="col"><?= __('Created Time') ?></th>
                <th scope="col"><?= __('Status') ?></th>
                <th scope="col" class="actions"><?= __('Actions') ?></th>
            </tr>
            <?php foreach ($sdSectionStructure->sd_section_values as $sdSectionValues): ?>
            <tr>
                <td><?= h($sdSectionValues->id) ?></td>
                <td><?= h($sdSectionValues->case_no) ?></td>
                <td><?= h($sdSectionValues->version_no) ?></td>
                <td><?= h($sdSectionValues->sd_section_structure_id) ?></td>
                <td><?= h($sdSectionValues->set_number) ?></td>
                <td><?= h($sdSectionValues->field_value) ?></td>
                <td><?= h($sdSectionValues->created_time) ?></td>
                <td><?= h($sdSectionValues->status) ?></td>
                <td class="actions">
                    <?= $this->Html->link(__('View'), ['controller' => 'SdSectionValues', 'action' => 'view', $sdSectionValues->id]) ?>
                    <?= $this->Html->link(__('Edit'), ['controller' => 'SdSectionValues', 'action' => 'edit', $sdSectionValues->id]) ?>
                    <?= $this->Form->postLink(__('Delete'), ['controller' => 'SdSectionValues', 'action' => 'delete', $sdSectionValues->id], ['confirm' => __('Are you sure you want to delete # {0}?', $sdSectionValues->id)]) ?>
                </td>
            </tr>
            <?php endforeach; ?>
        </table>
        <?php endif; ?>
    </div>
</div>
