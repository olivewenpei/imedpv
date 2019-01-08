<?php
/**
 * @var \App\View\AppView $this
 * @var \App\Model\Entity\SdSponsorCro $sdSponsorCro
 */
?>
<nav class="large-3 medium-4 columns" id="actions-sidebar">
    <ul class="side-nav">
        <li class="heading"><?= __('Actions') ?></li>
        <li><?= $this->Html->link(__('Edit Sd Sponsor Cro'), ['action' => 'edit', $sdSponsorCro->id]) ?> </li>
        <li><?= $this->Form->postLink(__('Delete Sd Sponsor Cro'), ['action' => 'delete', $sdSponsorCro->id], ['confirm' => __('Are you sure you want to delete # {0}?', $sdSponsorCro->id)]) ?> </li>
        <li><?= $this->Html->link(__('List Sd Sponsor Cros'), ['action' => 'index']) ?> </li>
        <li><?= $this->Html->link(__('New Sd Sponsor Cro'), ['action' => 'add']) ?> </li>
    </ul>
</nav>
<div class="sdSponsorCros view large-9 medium-8 columns content">
    <h3><?= h($sdSponsorCro->id) ?></h3>
    <table class="vertical-table">
        <tr>
            <th scope="row"><?= __('Id') ?></th>
            <td><?= $this->Number->format($sdSponsorCro->id) ?></td>
        </tr>
        <tr>
            <th scope="row"><?= __('Sponsor') ?></th>
            <td><?= $this->Number->format($sdSponsorCro->sponsor) ?></td>
        </tr>
        <tr>
            <th scope="row"><?= __('Cro Company') ?></th>
            <td><?= $this->Number->format($sdSponsorCro->cro_company) ?></td>
        </tr>
        <tr>
            <th scope="row"><?= __('Status') ?></th>
            <td><?= $this->Number->format($sdSponsorCro->status) ?></td>
        </tr>
    </table>
</div>
