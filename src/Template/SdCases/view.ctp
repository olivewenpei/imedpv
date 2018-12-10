<?php
/**
 * @var \App\View\AppView $this
 * @var \App\Model\Entity\SdCase $sdCase
 */
?>
<nav class="large-3 medium-4 columns" id="actions-sidebar">
    <ul class="side-nav">
        <li class="heading"><?= __('Actions') ?></li>
        <li><?= $this->Html->link(__('Edit Sd Case'), ['action' => 'edit', $sdCase->id]) ?> </li>
        <li><?= $this->Form->postLink(__('Delete Sd Case'), ['action' => 'delete', $sdCase->id], ['confirm' => __('Are you sure you want to delete # {0}?', $sdCase->id)]) ?> </li>
        <li><?= $this->Html->link(__('List Sd Cases'), ['action' => 'index']) ?> </li>
        <li><?= $this->Html->link(__('New Sd Case'), ['action' => 'add']) ?> </li>
        <li><?= $this->Html->link(__('List Sd Products'), ['controller' => 'SdProducts', 'action' => 'index']) ?> </li>
        <li><?= $this->Html->link(__('New Sd Product'), ['controller' => 'SdProducts', 'action' => 'add']) ?> </li>
    </ul>
</nav>
<div class="sdCases view large-9 medium-8 columns content">
    <h3><?= h($sdCase->id) ?></h3>
    <table class="vertical-table">
        <tr>
            <th scope="row"><?= __('CaseNo') ?></th>
            <td><?= h($sdCase->caseNo) ?></td>
        </tr>
        <tr>
            <th scope="row"><?= __('Id') ?></th>
            <td><?= $this->Number->format($sdCase->id) ?></td>
        </tr>
        <tr>
            <th scope="row"><?= __('Sd Product Workflow Id') ?></th>
            <td><?= $this->Number->format($sdCase->sd_product_workflow_id) ?></td>
        </tr>
        <tr>
            <th scope="row"><?= __('Sd Activity Id') ?></th>
            <td><?= $this->Number->format($sdCase->sd_activity_id) ?></td>
        </tr>
        <tr>
            <th scope="row"><?= __('Status') ?></th>
            <td><?= $this->Number->format($sdCase->status) ?></td>
        </tr>
        <tr>
            <th scope="row"><?= __('Sd User Id') ?></th>
            <td><?= $this->Number->format($sdCase->sd_user_id) ?></td>
        </tr>
    </table>
    <div class="row">
        <h4><?= __('Start Date') ?></h4>
        <?= $this->Text->autoParagraph(h($sdCase->start_date)); ?>
    </div>
    <div class="row">
        <h4><?= __('End Date') ?></h4>
        <?= $this->Text->autoParagraph(h($sdCase->end_date)); ?>
    </div>
</div>
