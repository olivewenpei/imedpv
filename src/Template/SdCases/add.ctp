<?php
/**
 * @var \App\View\AppView $this
 * @var \App\Model\Entity\SdCase $sdCase
 */
?>
<nav class="large-3 medium-4 columns" id="actions-sidebar">
    <ul class="side-nav">
        <li class="heading"><?= __('Actions') ?></li>
        <li><?= $this->Html->link(__('List Sd Cases'), ['action' => 'index']) ?></li>
        <li><?= $this->Html->link(__('List Sd Products'), ['controller' => 'SdProducts', 'action' => 'index']) ?></li>
        <li><?= $this->Html->link(__('New Sd Product'), ['controller' => 'SdProducts', 'action' => 'add']) ?></li>
    </ul>
</nav>
<div class="sdCases form large-9 medium-8 columns content">
    <?= $this->Form->create($sdCase) ?>
    <fieldset>
        <legend><?= __('Add Sd Case') ?></legend>
        <?php
            echo $this->Form->control('sd_product_workflow_id');
            echo $this->Form->control('caseNo');
            echo $this->Form->control('sd_activity_id');
            echo $this->Form->control('start_date');
            echo $this->Form->control('end_date');
            echo $this->Form->control('status');
            echo $this->Form->control('sd_user_id');
        ?>
    </fieldset>
    <?= $this->Form->button(__('Submit')) ?>
    <?= $this->Form->end() ?>
</div>
