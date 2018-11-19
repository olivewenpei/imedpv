<?php
/**
 * @var \App\View\AppView $this
 * @var \App\Model\Entity\SdStudyCro $sdStudyCro
 */
?>
<nav class="large-3 medium-4 columns" id="actions-sidebar">
    <ul class="side-nav">
        <li class="heading"><?= __('Actions') ?></li>
        <li><?= $this->Html->link(__('Edit Sd Study Cro'), ['action' => 'edit', $sdStudyCro->id]) ?> </li>
        <li><?= $this->Form->postLink(__('Delete Sd Study Cro'), ['action' => 'delete', $sdStudyCro->id], ['confirm' => __('Are you sure you want to delete # {0}?', $sdStudyCro->id)]) ?> </li>
        <li><?= $this->Html->link(__('List Sd Study Cros'), ['action' => 'index']) ?> </li>
        <li><?= $this->Html->link(__('New Sd Study Cro'), ['action' => 'add']) ?> </li>
    </ul>
</nav>
<div class="sdStudyCros view large-9 medium-8 columns content">
    <h3><?= h($sdStudyCro->id) ?></h3>
    <table class="vertical-table">
        <tr>
            <th scope="row"><?= __('Id') ?></th>
            <td><?= $this->Number->format($sdStudyCro->id) ?></td>
        </tr>
        <tr>
            <th scope="row"><?= __('Sd Product Id') ?></th>
            <td><?= $this->Number->format($sdStudyCro->sd_product_id) ?></td>
        </tr>
        <tr>
            <th scope="row"><?= __('Cro Company') ?></th>
            <td><?= $this->Number->format($sdStudyCro->cro_company) ?></td>
        </tr>
    </table>
</div>
