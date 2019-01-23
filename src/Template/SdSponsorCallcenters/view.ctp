<?php
/**
 * @var \App\View\AppView $this
 * @var \App\Model\Entity\SdSponsorCallcenter $sdSponsorCallcenter
 */
?>
<nav class="large-3 medium-4 columns" id="actions-sidebar">
    <ul class="side-nav">
        <li class="heading"><?= __('Actions') ?></li>
        <li><?= $this->Html->link(__('Edit Sd Sponsor Callcenter'), ['action' => 'edit', $sdSponsorCallcenter->id]) ?> </li>
        <li><?= $this->Form->postLink(__('Delete Sd Sponsor Callcenter'), ['action' => 'delete', $sdSponsorCallcenter->id], ['confirm' => __('Are you sure you want to delete # {0}?', $sdSponsorCallcenter->id)]) ?> </li>
        <li><?= $this->Html->link(__('List Sd Sponsor Callcenters'), ['action' => 'index']) ?> </li>
        <li><?= $this->Html->link(__('New Sd Sponsor Callcenter'), ['action' => 'add']) ?> </li>
    </ul>
</nav>
<div class="sdSponsorCallcenters view large-9 medium-8 columns content">
    <h3><?= h($sdSponsorCallcenter->id) ?></h3>
    <table class="vertical-table">
        <tr>
            <th scope="row"><?= __('Id') ?></th>
            <td><?= $this->Number->format($sdSponsorCallcenter->id) ?></td>
        </tr>
        <tr>
            <th scope="row"><?= __('Sponsor') ?></th>
            <td><?= $this->Number->format($sdSponsorCallcenter->sponsor) ?></td>
        </tr>
        <tr>
            <th scope="row"><?= __('Call Center') ?></th>
            <td><?= $this->Number->format($sdSponsorCallcenter->call_center) ?></td>
        </tr>
        <tr>
            <th scope="row"><?= __('Status') ?></th>
            <td><?= $this->Number->format($sdSponsorCallcenter->status) ?></td>
        </tr>
    </table>
</div>
