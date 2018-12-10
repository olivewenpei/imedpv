<?php
/**
 * @var \App\View\AppView $this
 * @var \App\Model\Entity\SdCaseGeneralInfo[]|\Cake\Collection\CollectionInterface $sdCaseGeneralInfos
 */
?>
<nav class="large-3 medium-4 columns" id="actions-sidebar">
    <ul class="side-nav">
        <li class="heading"><?= __('Actions') ?></li>
        <li><?= $this->Html->link(__('New Sd Case General Info'), ['action' => 'add']) ?></li>
        <li><?= $this->Html->link(__('List Sd Cases'), ['controller' => 'SdCases', 'action' => 'index']) ?></li>
        <li><?= $this->Html->link(__('New Sd Case'), ['controller' => 'SdCases', 'action' => 'add']) ?></li>
    </ul>
</nav>
<div class="sdCaseGeneralInfos index large-9 medium-8 columns content">
    <h3><?= __('Sd Case General Infos') ?></h3>
    <table cellpadding="0" cellspacing="0">
        <thead>
            <tr>
                <th scope="col"><?= $this->Paginator->sort('id') ?></th>
                <th scope="col"><?= $this->Paginator->sort('sd_case_id') ?></th>
                <th scope="col"><?= $this->Paginator->sort('case_detail_info') ?></th>
                <th scope="col" class="actions"><?= __('Actions') ?></th>
            </tr>
        </thead>
        <tbody>
            <?php foreach ($sdCaseGeneralInfos as $sdCaseGeneralInfo): ?>
            <tr>
                <td><?= $this->Number->format($sdCaseGeneralInfo->id) ?></td>
                <td><?= $sdCaseGeneralInfo->has('sd_case') ? $this->Html->link($sdCaseGeneralInfo->sd_case->id, ['controller' => 'SdCases', 'action' => 'view', $sdCaseGeneralInfo->sd_case->id]) : '' ?></td>
                <td><?= h($sdCaseGeneralInfo->case_detail_info) ?></td>
                <td class="actions">
                    <?= $this->Html->link(__('View'), ['action' => 'view', $sdCaseGeneralInfo->id]) ?>
                    <?= $this->Html->link(__('Edit'), ['action' => 'edit', $sdCaseGeneralInfo->id]) ?>
                    <?= $this->Form->postLink(__('Delete'), ['action' => 'delete', $sdCaseGeneralInfo->id], ['confirm' => __('Are you sure you want to delete # {0}?', $sdCaseGeneralInfo->id)]) ?>
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
