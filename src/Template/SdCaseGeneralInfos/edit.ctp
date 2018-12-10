<?php
/**
 * @var \App\View\AppView $this
 * @var \App\Model\Entity\SdCaseGeneralInfo $sdCaseGeneralInfo
 */
?>
<nav class="large-3 medium-4 columns" id="actions-sidebar">
    <ul class="side-nav">
        <li class="heading"><?= __('Actions') ?></li>
        <li><?= $this->Form->postLink(
                __('Delete'),
                ['action' => 'delete', $sdCaseGeneralInfo->id],
                ['confirm' => __('Are you sure you want to delete # {0}?', $sdCaseGeneralInfo->id)]
            )
        ?></li>
        <li><?= $this->Html->link(__('List Sd Case General Infos'), ['action' => 'index']) ?></li>
        <li><?= $this->Html->link(__('List Sd Cases'), ['controller' => 'SdCases', 'action' => 'index']) ?></li>
        <li><?= $this->Html->link(__('New Sd Case'), ['controller' => 'SdCases', 'action' => 'add']) ?></li>
    </ul>
</nav>
<div class="sdCaseGeneralInfos form large-9 medium-8 columns content">
    <?= $this->Form->create($sdCaseGeneralInfo) ?>
    <fieldset>
        <legend><?= __('Edit Sd Case General Info') ?></legend>
        <?php
            echo $this->Form->control('sd_case_id', ['options' => $sdCases]);
            echo $this->Form->control('case_detail_info');
        ?>
    </fieldset>
    <?= $this->Form->button(__('Submit')) ?>
    <?= $this->Form->end() ?>
</div>
