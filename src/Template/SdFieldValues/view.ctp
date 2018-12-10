<?php
/**
 * @var \App\View\AppView $this
 * @var \App\Model\Entity\SdFieldValue $sdFieldValue
 */
?>
<nav class="large-3 medium-4 columns" id="actions-sidebar">
    <ul class="side-nav">
        <li class="heading"><?= __('Actions') ?></li>
        <li><?= $this->Html->link(__('Edit Sd Field Value'), ['action' => 'edit', $sdFieldValue->id]) ?> </li>
        <li><?= $this->Form->postLink(__('Delete Sd Field Value'), ['action' => 'delete', $sdFieldValue->id], ['confirm' => __('Are you sure you want to delete # {0}?', $sdFieldValue->id)]) ?> </li>
        <li><?= $this->Html->link(__('List Sd Field Values'), ['action' => 'index']) ?> </li>
        <li><?= $this->Html->link(__('New Sd Field Value'), ['action' => 'add']) ?> </li>
        <li><?= $this->Html->link(__('List Sd Cases'), ['controller' => 'SdCases', 'action' => 'index']) ?> </li>
        <li><?= $this->Html->link(__('New Sd Case'), ['controller' => 'SdCases', 'action' => 'add']) ?> </li>
        <li><?= $this->Html->link(__('List Sd Fields'), ['controller' => 'SdFields', 'action' => 'index']) ?> </li>
        <li><?= $this->Html->link(__('New Sd Field'), ['controller' => 'SdFields', 'action' => 'add']) ?> </li>
    </ul>
</nav>
<div class="sdFieldValues view large-9 medium-8 columns content">
    <h3><?= h($sdFieldValue->id) ?></h3>
    <table class="vertical-table">
        <tr>
            <th scope="row"><?= __('Sd Case') ?></th>
            <td><?= $sdFieldValue->has('sd_case') ? $this->Html->link($sdFieldValue->sd_case->id, ['controller' => 'SdCases', 'action' => 'view', $sdFieldValue->sd_case->id]) : '' ?></td>
        </tr>
        <tr>
            <th scope="row"><?= __('Version No') ?></th>
            <td><?= h($sdFieldValue->version_no) ?></td>
        </tr>
        <tr>
            <th scope="row"><?= __('Sd Field') ?></th>
            <td><?= $sdFieldValue->has('sd_field') ? $this->Html->link($sdFieldValue->sd_field->id, ['controller' => 'SdFields', 'action' => 'view', $sdFieldValue->sd_field->id]) : '' ?></td>
        </tr>
        <tr>
            <th scope="row"><?= __('Id') ?></th>
            <td><?= $this->Number->format($sdFieldValue->id) ?></td>
        </tr>
        <tr>
            <th scope="row"><?= __('Set Number') ?></th>
            <td><?= $this->Number->format($sdFieldValue->set_number) ?></td>
        </tr>
        <tr>
            <th scope="row"><?= __('Created Time') ?></th>
            <td><?= h($sdFieldValue->created_time) ?></td>
        </tr>
        <tr>
            <th scope="row"><?= __('Status') ?></th>
            <td><?= $sdFieldValue->status ? __('Yes') : __('No'); ?></td>
        </tr>
    </table>
    <div class="row">
        <h4><?= __('Field Value') ?></h4>
        <?= $this->Text->autoParagraph(h($sdFieldValue->field_value)); ?>
    </div>
</div>
