<?php
/**
 * @var \App\View\AppView $this
 * @var \App\Model\Entity\SdFieldValue $sdFieldValue
 */
?>
<nav class="large-3 medium-4 columns" id="actions-sidebar">
    <ul class="side-nav">
        <li class="heading"><?= __('Actions') ?></li>
        <li><?= $this->Form->postLink(
                __('Delete'),
                ['action' => 'delete', $sdFieldValue->id],
                ['confirm' => __('Are you sure you want to delete # {0}?', $sdFieldValue->id)]
            )
        ?></li>
        <li><?= $this->Html->link(__('List Sd Field Values'), ['action' => 'index']) ?></li>
        <li><?= $this->Html->link(__('List Sd Cases'), ['controller' => 'SdCases', 'action' => 'index']) ?></li>
        <li><?= $this->Html->link(__('New Sd Case'), ['controller' => 'SdCases', 'action' => 'add']) ?></li>
        <li><?= $this->Html->link(__('List Sd Fields'), ['controller' => 'SdFields', 'action' => 'index']) ?></li>
        <li><?= $this->Html->link(__('New Sd Field'), ['controller' => 'SdFields', 'action' => 'add']) ?></li>
    </ul>
</nav>
<div class="sdFieldValues form large-9 medium-8 columns content">
    <?= $this->Form->create($sdFieldValue) ?>
    <fieldset>
        <legend><?= __('Edit Sd Field Value') ?></legend>
        <?php
            echo $this->Form->control('sd_case_id', ['options' => $sdCases]);
            echo $this->Form->control('version_no');
            echo $this->Form->control('sd_field_id', ['options' => $sdFields]);
            echo $this->Form->control('set_number');
            echo $this->Form->control('field_value');
            echo $this->Form->control('created_time');
            echo $this->Form->control('status');
        ?>
    </fieldset>
    <?= $this->Form->button(__('Submit')) ?>
    <?= $this->Form->end() ?>
</div>
