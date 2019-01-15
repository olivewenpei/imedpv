<?php
/**
 * @var \App\View\AppView $this
 * @var \App\Model\Entity\SdSponsorCompany[]|\Cake\Collection\CollectionInterface $sdSponsorCompanies
 */
?>
<nav class="large-3 medium-4 columns" id="actions-sidebar">
    <ul class="side-nav">
        <li class="heading"><?= __('Actions') ?></li>
        <li><?= $this->Html->link(__('New Sd Sponsor Company'), ['action' => 'add']) ?></li>
        <li><?= $this->Html->link(__('List Sd Products'), ['controller' => 'SdProducts', 'action' => 'index']) ?></li>
        <li><?= $this->Html->link(__('New Sd Product'), ['controller' => 'SdProducts', 'action' => 'add']) ?></li>
    </ul>
</nav>
<div class="sdSponsorCompanies index large-9 medium-8 columns content">
    <h3><?= __('Sd Sponsor Companies') ?></h3>
    <table cellpadding="0" cellspacing="0">
        <thead>
            <tr>
                <th scope="col"><?= $this->Paginator->sort('id') ?></th>
                <th scope="col"><?= $this->Paginator->sort('company_name') ?></th>
                <th scope="col"><?= $this->Paginator->sort('country') ?></th>
                <th scope="col" class="actions"><?= __('Actions') ?></th>
            </tr>
        </thead>
        <tbody>
            <?php foreach ($sdSponsorCompanies as $sdSponsorCompany): ?>
            <tr>
                <td><?= $this->Number->format($sdSponsorCompany->id) ?></td>
                <td><?= h($sdSponsorCompany->company_name) ?></td>
                <td><?= h($sdSponsorCompany->country) ?></td>
                <td class="actions">
                    <?= $this->Html->link(__('View'), ['action' => 'view', $sdSponsorCompany->id]) ?>
                    <?= $this->Html->link(__('Edit'), ['action' => 'edit', $sdSponsorCompany->id]) ?>
                    <?= $this->Form->postLink(__('Delete'), ['action' => 'delete', $sdSponsorCompany->id], ['confirm' => __('Are you sure you want to delete # {0}?', $sdSponsorCompany->id)]) ?>
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
