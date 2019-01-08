<?php
/**
 * @var \App\View\AppView $this
 * @var \App\Model\Entity\SdActivitySectionPermission[]|\Cake\Collection\CollectionInterface $sdActivitySectionPermissions
 */
?>
<nav class="large-3 medium-4 columns" id="actions-sidebar">
    <ul class="side-nav">
        <li class="heading"><?= __('Actions') ?></li>
        <li><?= $this->Html->link(__('New Sd Activity Section Permission'), ['action' => 'add']) ?></li>
        <li><?= $this->Html->link(__('List Sd Activities'), ['controller' => 'SdActivities', 'action' => 'index']) ?></li>
        <li><?= $this->Html->link(__('New Sd Activity'), ['controller' => 'SdActivities', 'action' => 'add']) ?></li>
        <li><?= $this->Html->link(__('List Sd Sections'), ['controller' => 'SdSections', 'action' => 'index']) ?></li>
        <li><?= $this->Html->link(__('New Sd Section'), ['controller' => 'SdSections', 'action' => 'add']) ?></li>
    </ul>
</nav>
<div class="sdActivitySectionPermissions index large-9 medium-8 columns content">
    <h3><?= __('Sd Activity Section Permissions') ?></h3>
    <table cellpadding="0" cellspacing="0">
        <thead>
            <tr>
                <th scope="col"><?= $this->Paginator->sort('id') ?></th>
                <th scope="col"><?= $this->Paginator->sort('sd_activity_id') ?></th>
                <th scope="col"><?= $this->Paginator->sort('sd_section_id') ?></th>
                <th scope="col"><?= $this->Paginator->sort('action') ?></th>
                <th scope="col" class="actions"><?= __('Actions') ?></th>
            </tr>
        </thead>
        <tbody>
            <?php foreach ($sdActivitySectionPermissions as $sdActivitySectionPermission): ?>
            <tr>
                <td><?= $this->Number->format($sdActivitySectionPermission->id) ?></td>
                <td><?= $sdActivitySectionPermission->has('sd_activity') ? $this->Html->link($sdActivitySectionPermission->sd_activity->id, ['controller' => 'SdActivities', 'action' => 'view', $sdActivitySectionPermission->sd_activity->id]) : '' ?></td>
                <td><?= $sdActivitySectionPermission->has('sd_section') ? $this->Html->link($sdActivitySectionPermission->sd_section->id, ['controller' => 'SdSections', 'action' => 'view', $sdActivitySectionPermission->sd_section->id]) : '' ?></td>
                <td><?= $this->Number->format($sdActivitySectionPermission->action) ?></td>
                <td class="actions">
                    <?= $this->Html->link(__('View'), ['action' => 'view', $sdActivitySectionPermission->id]) ?>
                    <?= $this->Html->link(__('Edit'), ['action' => 'edit', $sdActivitySectionPermission->id]) ?>
                    <?= $this->Form->postLink(__('Delete'), ['action' => 'delete', $sdActivitySectionPermission->id], ['confirm' => __('Are you sure you want to delete # {0}?', $sdActivitySectionPermission->id)]) ?>
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
