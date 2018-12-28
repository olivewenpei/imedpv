<?php
/**
 * @var \App\View\AppView $this
 * @var \App\Model\Entity\SdSectionValue $sdSectionValue
 */
?>
<nav class="large-3 medium-4 columns" id="actions-sidebar">
    <ul class="side-nav">
        <li class="heading"><?= __('Actions') ?></li>
        <li><?= $this->Html->link(__('Edit Sd Section Value'), ['action' => 'edit', $sdSectionValue->id]) ?> </li>
        <li><?= $this->Form->postLink(__('Delete Sd Section Value'), ['action' => 'delete', $sdSectionValue->id], ['confirm' => __('Are you sure you want to delete # {0}?', $sdSectionValue->id)]) ?> </li>
        <li><?= $this->Html->link(__('List Sd Section Values'), ['action' => 'index']) ?> </li>
        <li><?= $this->Html->link(__('New Sd Section Value'), ['action' => 'add']) ?> </li>
        <li><?= $this->Html->link(__('List Sd Section Structures'), ['controller' => 'SdSectionStructures', 'action' => 'index']) ?> </li>
        <li><?= $this->Html->link(__('New Sd Section Structure'), ['controller' => 'SdSectionStructures', 'action' => 'add']) ?> </li>
        <li><?= $this->Html->link(__('List Sd Activity Log'), ['controller' => 'SdActivityLog', 'action' => 'index']) ?> </li>
        <li><?= $this->Html->link(__('New Sd Activity Log'), ['controller' => 'SdActivityLog', 'action' => 'add']) ?> </li>
    </ul>
</nav>
<div class="sdSectionValues view large-9 medium-8 columns content">
    <h3><?= h($sdSectionValue->id) ?></h3>
    <table class="vertical-table">
        <tr>
            <th scope="row"><?= __('Case No') ?></th>
            <td><?= h($sdSectionValue->case_no) ?></td>
        </tr>
        <tr>
            <th scope="row"><?= __('Version No') ?></th>
            <td><?= h($sdSectionValue->version_no) ?></td>
        </tr>
        <tr>
            <th scope="row"><?= __('Sd Section Structure') ?></th>
            <td><?= $sdSectionValue->has('sd_section_structure') ? $this->Html->link($sdSectionValue->sd_section_structure->id, ['controller' => 'SdSectionStructures', 'action' => 'view', $sdSectionValue->sd_section_structure->id]) : '' ?></td>
        </tr>
        <tr>
            <th scope="row"><?= __('Id') ?></th>
            <td><?= $this->Number->format($sdSectionValue->id) ?></td>
        </tr>
        <tr>
            <th scope="row"><?= __('Set Number') ?></th>
            <td><?= $this->Number->format($sdSectionValue->set_number) ?></td>
        </tr>
        <tr>
            <th scope="row"><?= __('Created Time') ?></th>
            <td><?= h($sdSectionValue->created_time) ?></td>
        </tr>
        <tr>
            <th scope="row"><?= __('Status') ?></th>
            <td><?= $sdSectionValue->status ? __('Yes') : __('No'); ?></td>
        </tr>
    </table>
    <div class="row">
        <h4><?= __('Field Value') ?></h4>
        <?= $this->Text->autoParagraph(h($sdSectionValue->field_value)); ?>
    </div>
    <div class="related">
        <h4><?= __('Related Sd Activity Log') ?></h4>
        <?php if (!empty($sdSectionValue->sd_activity_log)): ?>
        <table cellpadding="0" cellspacing="0">
            <tr>
                <th scope="col"><?= __('Id') ?></th>
                <th scope="col"><?= __('Sd User Id') ?></th>
                <th scope="col"><?= __('Controller') ?></th>
                <th scope="col"><?= __('Action') ?></th>
                <th scope="col"><?= __('Sd Section Value Id') ?></th>
                <th scope="col"><?= __('Data Changed') ?></th>
                <th scope="col"><?= __('Updated Time') ?></th>
                <th scope="col" class="actions"><?= __('Actions') ?></th>
            </tr>
            <?php foreach ($sdSectionValue->sd_activity_log as $sdActivityLog): ?>
            <tr>
                <td><?= h($sdActivityLog->id) ?></td>
                <td><?= h($sdActivityLog->sd_user_id) ?></td>
                <td><?= h($sdActivityLog->controller) ?></td>
                <td><?= h($sdActivityLog->action) ?></td>
                <td><?= h($sdActivityLog->sd_section_value_id) ?></td>
                <td><?= h($sdActivityLog->data_changed) ?></td>
                <td><?= h($sdActivityLog->updated_time) ?></td>
                <td class="actions">
                    <?= $this->Html->link(__('View'), ['controller' => 'SdActivityLog', 'action' => 'view', $sdActivityLog->id]) ?>
                    <?= $this->Html->link(__('Edit'), ['controller' => 'SdActivityLog', 'action' => 'edit', $sdActivityLog->id]) ?>
                    <?= $this->Form->postLink(__('Delete'), ['controller' => 'SdActivityLog', 'action' => 'delete', $sdActivityLog->id], ['confirm' => __('Are you sure you want to delete # {0}?', $sdActivityLog->id)]) ?>
                </td>
            </tr>
            <?php endforeach; ?>
        </table>
        <?php endif; ?>
    </div>
</div>
