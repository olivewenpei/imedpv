<?php
/**
 * @var \App\View\AppView $this
 * @var \App\Model\Entity\SdProduct $sdProduct
 */
?>
<nav class="large-3 medium-4 columns" id="actions-sidebar">
    <ul class="side-nav">
        <li class="heading"><?= __('Actions') ?></li>
        <li><?= $this->Form->postLink(
                __('Delete'),
                ['action' => 'delete', $sdProduct->id],
                ['confirm' => __('Are you sure you want to delete # {0}?', $sdProduct->id)]
            )
        ?></li>
        <li><?= $this->Html->link(__('List Sd Products'), ['action' => 'index']) ?></li>
        <li><?= $this->Html->link(__('List Sd Workflows'), ['controller' => 'SdWorkflows', 'action' => 'index']) ?></li>
        <li><?= $this->Html->link(__('New Sd Workflow'), ['controller' => 'SdWorkflows', 'action' => 'add']) ?></li>
        <li><?= $this->Html->link(__('List Sd Product Assignments'), ['controller' => 'SdProductAssignments', 'action' => 'index']) ?></li>
        <li><?= $this->Html->link(__('New Sd Product Assignment'), ['controller' => 'SdProductAssignments', 'action' => 'add']) ?></li>
    </ul>
</nav>
<div class="sdProducts form large-9 medium-8 columns content">
    <?= $this->Form->create($sdProduct) ?>
    <fieldset>
        <legend><?= __('Edit Sd Product') ?></legend>
        <?php
            echo $this->Form->control('sd_workflow_id', ['options' => $sdWorkflows]);
            echo $this->Form->control('product_type');
            echo $this->Form->control('study_no');
            echo $this->Form->control('sponsor_company');
            echo $this->Form->control('status');
        ?>
    </fieldset>
    <?= $this->Form->button(__('Submit')) ?>
    <?= $this->Form->end() ?>
</div>
