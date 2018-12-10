<?php
/**
 * @var \App\View\AppView $this
 * @var \App\Model\Entity\SdCaseGeneralInfo $sdCaseGeneralInfo
 */
?>
<nav class="large-3 medium-4 columns" id="actions-sidebar">
    <ul class="side-nav">
        <li class="heading"><?= __('Actions') ?></li>
        <li><?= $this->Html->link(__('Edit Sd Case General Info'), ['action' => 'edit', $sdCaseGeneralInfo->id]) ?> </li>
        <li><?= $this->Form->postLink(__('Delete Sd Case General Info'), ['action' => 'delete', $sdCaseGeneralInfo->id], ['confirm' => __('Are you sure you want to delete # {0}?', $sdCaseGeneralInfo->id)]) ?> </li>
        <li><?= $this->Html->link(__('List Sd Case General Infos'), ['action' => 'index']) ?> </li>
        <li><?= $this->Html->link(__('New Sd Case General Info'), ['action' => 'add']) ?> </li>
        <li><?= $this->Html->link(__('List Sd Cases'), ['controller' => 'SdCases', 'action' => 'index']) ?> </li>
        <li><?= $this->Html->link(__('New Sd Case'), ['controller' => 'SdCases', 'action' => 'add']) ?> </li>
    </ul>
</nav>
<div class="sdCaseGeneralInfos view large-9 medium-8 columns content">
    <h3><?= h($sdCaseGeneralInfo->id) ?></h3>
    <table class="vertical-table">
        <tr>
            <th scope="row"><?= __('Sd Case') ?></th>
            <td><?= $sdCaseGeneralInfo->has('sd_case') ? $this->Html->link($sdCaseGeneralInfo->sd_case->id, ['controller' => 'SdCases', 'action' => 'view', $sdCaseGeneralInfo->sd_case->id]) : '' ?></td>
        </tr>
        <tr>
            <th scope="row"><?= __('Case Detail Info') ?></th>
            <td><?= h($sdCaseGeneralInfo->case_detail_info) ?></td>
        </tr>
        <tr>
            <th scope="row"><?= __('Id') ?></th>
            <td><?= $this->Number->format($sdCaseGeneralInfo->id) ?></td>
        </tr>
    </table>
</div>
