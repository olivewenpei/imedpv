<?php
/**
 * @var \App\View\AppView $this
 * @var \App\Model\Entity\SdQuery $sdQuery
 */
?>
<nav class="large-3 medium-4 columns" id="actions-sidebar">
    <ul class="side-nav">
        <li class="heading"><?= __('Actions') ?></li>
        <li><?= $this->Html->link(__('Edit Sd Query'), ['action' => 'edit', $sdQuery->id]) ?> </li>
        <li><?= $this->Form->postLink(__('Delete Sd Query'), ['action' => 'delete', $sdQuery->id], ['confirm' => __('Are you sure you want to delete # {0}?', $sdQuery->id)]) ?> </li>
        <li><?= $this->Html->link(__('List Sd Queries'), ['action' => 'index']) ?> </li>
        <li><?= $this->Html->link(__('New Sd Query'), ['action' => 'add']) ?> </li>
    </ul>
</nav>
<div class="sdQueries view large-9 medium-8 columns content">
    <h3><?= h($sdQuery->title) ?></h3>
    <table class="vertical-table">
        <tr>
            <th scope="row"><?= __('Id') ?></th>
            <td><?= $this->Number->format($sdQuery->id) ?></td>
        </tr>
        <tr>
            <th scope="row"><?= __('Query Type') ?></th>
            <td><?= $this->Number->format($sdQuery->query_type) ?></td>
        </tr>
        <tr>
            <th scope="row"><?= __('Sender') ?></th>
            <td><?= $this->Number->format($sdQuery->sender) ?></td>
        </tr>
        <tr>
            <th scope="row"><?= __('Receiver') ?></th>
            <td><?= $this->Number->format($sdQuery->receiver) ?></td>
        </tr>
        <tr>
            <th scope="row"><?= __('Sender Deleted') ?></th>
            <td><?= $this->Number->format($sdQuery->sender_deleted) ?></td>
        </tr>
        <tr>
            <th scope="row"><?= __('Receiver Status') ?></th>
            <td><?= $this->Number->format($sdQuery->receiver_status) ?></td>
        </tr>
        <tr>
            <th scope="row"><?= __('Query Status') ?></th>
            <td><?= $this->Number->format($sdQuery->query_status) ?></td>
        </tr>
        <tr>
            <th scope="row"><?= __('Send Date') ?></th>
            <td><?= h($sdQuery->send_date) ?></td>
        </tr>
        <tr>
            <th scope="row"><?= __('Read Date') ?></th>
            <td><?= h($sdQuery->read_date) ?></td>
        </tr>
    </table>
    <div class="row">
        <h4><?= __('Title') ?></h4>
        <?= $this->Text->autoParagraph(h($sdQuery->title)); ?>
    </div>
    <div class="row">
        <h4><?= __('Content') ?></h4>
        <?= $this->Text->autoParagraph(h($sdQuery->content)); ?>
    </div>
</div>
