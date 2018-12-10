<?php
/**
 * @var \App\View\AppView $this
 * @var \App\Model\Entity\SdSponsorCro[]|\Cake\Collection\CollectionInterface $sdSponsorCros
 */
?>
<nav class="large-3 medium-4 columns" id="actions-sidebar">
    <ul class="side-nav">
        <li class="heading"><?= __('Actions') ?></li>
        <li><?= $this->Html->link(__('New Sd Sponsor Cro'), ['action' => 'add']) ?></li>
    </ul>
</nav>
<div class="sdSponsorCros index large-9 medium-8 columns content">
    <h3><?= __('Sd Sponsor Cros') ?></h3>
    <table cellpadding="0" cellspacing="0">
        <thead>
            <tr>
                <th scope="col"><?= $this->Paginator->sort('id') ?></th>
                <th scope="col"><?= $this->Paginator->sort('sponsor') ?></th>
                <th scope="col"><?= $this->Paginator->sort('cro_company') ?></th>
                <th scope="col"><?= $this->Paginator->sort('status') ?></th>
                <th scope="col" class="actions"><?= __('Actions') ?></th>
            </tr>
        </thead>
        <tbody>
            <?php foreach ($sdSponsorCros as $sdSponsorCro): ?>
            <tr>
                <td><?= $this->Number->format($sdSponsorCro->id) ?></td>
                <td><?= $this->Number->format($sdSponsorCro->sponsor) ?></td>
                <td><?= $this->Number->format($sdSponsorCro->cro_company) ?></td>
                <td><?= $this->Number->format($sdSponsorCro->status) ?></td>
                <td class="actions">
                    <?= $this->Html->link(__('View'), ['action' => 'view', $sdSponsorCro->id]) ?>
                    <?= $this->Html->link(__('Edit'), ['action' => 'edit', $sdSponsorCro->id]) ?>
                    <?= $this->Form->postLink(__('Delete'), ['action' => 'delete', $sdSponsorCro->id], ['confirm' => __('Are you sure you want to delete # {0}?', $sdSponsorCro->id)]) ?>
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
