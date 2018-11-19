<?php
/**
 * @var \App\View\AppView $this
 * @var \App\Model\Entity\SdWorkflow $sdWorkflow
 */
?>
<nav class="large-3 medium-4 columns" id="actions-sidebar">
    <ul class="side-nav">
        <li class="heading"><?= __('Actions') ?></li>
        <li><?= $this->Form->postLink(
                __('Delete'),
                ['action' => 'delete', $sdWorkflow->id],
                ['confirm' => __('Are you sure you want to delete # {0}?', $sdWorkflow->id)]
            )
        ?></li>
        <li><?= $this->Html->link(__('List Sd Workflows'), ['action' => 'index']) ?></li>
        <li><?= $this->Html->link(__('List Sd Phases'), ['controller' => 'SdPhases', 'action' => 'index']) ?></li>
        <li><?= $this->Html->link(__('New Sd Phase'), ['controller' => 'SdPhases', 'action' => 'add']) ?></li>
        <li><?= $this->Html->link(__('List Sd Products'), ['controller' => 'SdProducts', 'action' => 'index']) ?></li>
        <li><?= $this->Html->link(__('New Sd Product'), ['controller' => 'SdProducts', 'action' => 'add']) ?></li>
    </ul>
</nav>
<div class="sdWorkflows form large-9 medium-8 columns content">
    <?= $this->Form->create($sdWorkflow) ?>
    <fieldset>
        <legend><?= __('Edit Sd Workflow') ?></legend>
        <?php
            echo $this->Form->control('name');
            echo $this->Form->control('description');
            echo $this->Form->control('status');
        ?>
    </fieldset>
    <?= $this->Form->button(__('Submit')) ?>
    <?= $this->Form->end() ?>
</div>
