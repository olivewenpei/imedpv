<?php
/**
 * @var \App\View\AppView $this
 * @var \App\Model\Entity\SdTab $sdTab
 */
?>
<nav class="large-3 medium-4 columns" id="actions-sidebar">
    <ul class="side-nav">
        <li class="heading"><?= __('Actions') ?></li>
        <li><?= $this->Html->link(__('Edit Sd Tab'), ['action' => 'edit', $sdTab->id]) ?> </li>
        <li><?= $this->Form->postLink(__('Delete Sd Tab'), ['action' => 'delete', $sdTab->id], ['confirm' => __('Are you sure you want to delete # {0}?', $sdTab->id)]) ?> </li>
        <li><?= $this->Html->link(__('List Sd Tabs'), ['action' => 'index']) ?> </li>
        <li><?= $this->Html->link(__('New Sd Tab'), ['action' => 'add']) ?> </li>
        <li><?= $this->Html->link(__('List Sd Sections'), ['controller' => 'SdSections', 'action' => 'index']) ?> </li>
        <li><?= $this->Html->link(__('New Sd Section'), ['controller' => 'SdSections', 'action' => 'add']) ?> </li>
    </ul>
</nav>
<div class="sdTabs view large-9 medium-8 columns content">
    <h3><?= h($sdTab->id) ?></h3>
    <table class="vertical-table">
        <tr>
            <th scope="row"><?= __('Tab Name') ?></th>
            <td><?= h($sdTab->tab_name) ?></td>
        </tr>
        <tr>
            <th scope="row"><?= __('Id') ?></th>
            <td><?= $this->Number->format($sdTab->id) ?></td>
        </tr>
        <tr>
            <th scope="row"><?= __('Display Order') ?></th>
            <td><?= $this->Number->format($sdTab->display_order) ?></td>
        </tr>
        <tr>
            <th scope="row"><?= __('Status') ?></th>
            <td><?= $this->Number->format($sdTab->status) ?></td>
        </tr>
    </table>
    <div class="related">
        <h4><?= __('Related Sd Sections') ?></h4>
        <?php if (!empty($sdTab->sd_sections)): ?>
        <table cellpadding="0" cellspacing="0">
            <tr>
                <th scope="col"><?= __('Id') ?></th>
                <th scope="col"><?= __('Section Name') ?></th>
                <th scope="col"><?= __('Section Level') ?></th>
                <th scope="col"><?= __('Parent Section') ?></th>
                <th scope="col"><?= __('Sd Tab Id') ?></th>
                <th scope="col"><?= __('Is Addable') ?></th>
                <th scope="col"><?= __('Display Order') ?></th>
                <th scope="col"><?= __('Status') ?></th>
                <th scope="col" class="actions"><?= __('Actions') ?></th>
            </tr>
            <?php foreach ($sdTab->sd_sections as $sdSections): ?>
            <tr>
                <td><?= h($sdSections->id) ?></td>
                <td><?= h($sdSections->section_name) ?></td>
                <td><?= h($sdSections->section_level) ?></td>
                <td><?= h($sdSections->parent_section) ?></td>
                <td><?= h($sdSections->sd_tab_id) ?></td>
                <td><?= h($sdSections->is_addable) ?></td>
                <td><?= h($sdSections->display_order) ?></td>
                <td><?= h($sdSections->status) ?></td>
                <td class="actions">
                    <?= $this->Html->link(__('View'), ['controller' => 'SdSections', 'action' => 'view', $sdSections->id]) ?>
                    <?= $this->Html->link(__('Edit'), ['controller' => 'SdSections', 'action' => 'edit', $sdSections->id]) ?>
                    <?= $this->Form->postLink(__('Delete'), ['controller' => 'SdSections', 'action' => 'delete', $sdSections->id], ['confirm' => __('Are you sure you want to delete # {0}?', $sdSections->id)]) ?>
                </td>
            </tr>
            <?php endforeach; ?>
        </table>
        <?php endif; ?>
    </div>
</div>
