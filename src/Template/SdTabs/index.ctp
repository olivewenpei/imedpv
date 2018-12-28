<?php
/**
 * @var \App\View\AppView $this
 * @var \App\Model\Entity\SdTab[]|\Cake\Collection\CollectionInterface $sdTabs
 */
?>
<nav class="large-3 medium-4 columns" id="actions-sidebar">
    <ul class="side-nav">
        <li class="heading"><?= __('Actions') ?></li>
        <li><?= $this->Html->link(__('New Sd Tab'), ['action' => 'add']) ?></li>
        <li><?= $this->Html->link(__('List Sd Sections'), ['controller' => 'SdSections', 'action' => 'index']) ?></li>
        <li><?= $this->Html->link(__('New Sd Section'), ['controller' => 'SdSections', 'action' => 'add']) ?></li>
    </ul>
</nav>
<div class="sdTabs index large-9 medium-8 columns content">
    <h3><?= __('Sd Tabs') ?></h3>
    <table cellpadding="0" cellspacing="0">
        <thead>
            <tr>
                <th scope="col"><?= $this->Paginator->sort('id') ?></th>
                <th scope="col"><?= $this->Paginator->sort('tab_name') ?></th>
                <th scope="col"><?= $this->Paginator->sort('display_order') ?></th>
                <th scope="col"><?= $this->Paginator->sort('status') ?></th>
                <th scope="col" class="actions"><?= __('Actions') ?></th>
            </tr>
        </thead>
        <tbody>
            <?php foreach ($sdTabs as $sdTab): ?>
            <tr>
                <td><?= $this->Number->format($sdTab->id) ?></td>
                <td><?= h($sdTab->tab_name) ?></td>
                <td><?= $this->Number->format($sdTab->display_order) ?></td>
                <td><?= $this->Number->format($sdTab->status) ?></td>
                <td class="actions">
                    <?= $this->Html->link(__('View'), ['action' => 'view', $sdTab->id]) ?>
                    <?= $this->Html->link(__('Edit'), ['action' => 'edit', $sdTab->id]) ?>
                    <?= $this->Form->postLink(__('Delete'), ['action' => 'delete', $sdTab->id], ['confirm' => __('Are you sure you want to delete # {0}?', $sdTab->id)]) ?>
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
