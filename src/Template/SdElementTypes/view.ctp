<?php
/**
 * @var \App\View\AppView $this
 * @var \App\Model\Entity\SdElementType $sdElementType
 */
?>
<nav class="large-3 medium-4 columns" id="actions-sidebar">
    <ul class="side-nav">
        <li class="heading"><?= __('Actions') ?></li>
        <li><?= $this->Html->link(__('Edit Sd Element Type'), ['action' => 'edit', $sdElementType->id]) ?> </li>
        <li><?= $this->Form->postLink(__('Delete Sd Element Type'), ['action' => 'delete', $sdElementType->id], ['confirm' => __('Are you sure you want to delete # {0}?', $sdElementType->id)]) ?> </li>
        <li><?= $this->Html->link(__('List Sd Element Types'), ['action' => 'index']) ?> </li>
        <li><?= $this->Html->link(__('New Sd Element Type'), ['action' => 'add']) ?> </li>
        <li><?= $this->Html->link(__('List Sd Fields'), ['controller' => 'SdFields', 'action' => 'index']) ?> </li>
        <li><?= $this->Html->link(__('New Sd Field'), ['controller' => 'SdFields', 'action' => 'add']) ?> </li>
    </ul>
</nav>
<div class="sdElementTypes view large-9 medium-8 columns content">
    <h3><?= h($sdElementType->id) ?></h3>
    <table class="vertical-table">
        <tr>
            <th scope="row"><?= __('Type Name') ?></th>
            <td><?= h($sdElementType->type_name) ?></td>
        </tr>
        <tr>
            <th scope="row"><?= __('Id') ?></th>
            <td><?= $this->Number->format($sdElementType->id) ?></td>
        </tr>
        <tr>
            <th scope="row"><?= __('Status') ?></th>
            <td><?= $sdElementType->status ? __('Yes') : __('No'); ?></td>
        </tr>
    </table>
    <div class="related">
        <h4><?= __('Related Sd Fields') ?></h4>
        <?php if (!empty($sdElementType->sd_fields)): ?>
        <table cellpadding="0" cellspacing="0">
            <tr>
                <th scope="col"><?= __('Id') ?></th>
                <th scope="col"><?= __('Organization') ?></th>
                <th scope="col"><?= __('Descriptor') ?></th>
                <th scope="col"><?= __('E2b Code') ?></th>
                <th scope="col"><?= __('Version') ?></th>
                <th scope="col"><?= __('Is E2b') ?></th>
                <th scope="col"><?= __('Field Length') ?></th>
                <th scope="col"><?= __('Field Type') ?></th>
                <th scope="col"><?= __('Field Label') ?></th>
                <th scope="col"><?= __('Sd Element Type Id') ?></th>
                <th scope="col"><?= __('Comment') ?></th>
                <th scope="col" class="actions"><?= __('Actions') ?></th>
            </tr>
            <?php foreach ($sdElementType->sd_fields as $sdFields): ?>
            <tr>
                <td><?= h($sdFields->id) ?></td>
                <td><?= h($sdFields->organization) ?></td>
                <td><?= h($sdFields->descriptor) ?></td>
                <td><?= h($sdFields->e2b_code) ?></td>
                <td><?= h($sdFields->version) ?></td>
                <td><?= h($sdFields->is_e2b) ?></td>
                <td><?= h($sdFields->field_length) ?></td>
                <td><?= h($sdFields->field_type) ?></td>
                <td><?= h($sdFields->field_label) ?></td>
                <td><?= h($sdFields->sd_element_type_id) ?></td>
                <td><?= h($sdFields->comment) ?></td>
                <td class="actions">
                    <?= $this->Html->link(__('View'), ['controller' => 'SdFields', 'action' => 'view', $sdFields->id]) ?>
                    <?= $this->Html->link(__('Edit'), ['controller' => 'SdFields', 'action' => 'edit', $sdFields->id]) ?>
                    <?= $this->Form->postLink(__('Delete'), ['controller' => 'SdFields', 'action' => 'delete', $sdFields->id], ['confirm' => __('Are you sure you want to delete # {0}?', $sdFields->id)]) ?>
                </td>
            </tr>
            <?php endforeach; ?>
        </table>
        <?php endif; ?>
    </div>
</div>
