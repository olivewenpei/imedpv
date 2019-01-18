<?php
/**
 * @var \App\View\AppView $this
 * @var \App\Model\Entity\SdProductType $sdProductType
 */
?>
<nav class="large-3 medium-4 columns" id="actions-sidebar">
    <ul class="side-nav">
        <li class="heading"><?= __('Actions') ?></li>
        <li><?= $this->Form->postLink(
                __('Delete'),
                ['action' => 'delete', $sdProductType->id],
                ['confirm' => __('Are you sure you want to delete # {0}?', $sdProductType->id)]
            )
        ?></li>
        <li><?= $this->Html->link(__('List Sd Product Types'), ['action' => 'index']) ?></li>
        <li><?= $this->Html->link(__('List Sd Products'), ['controller' => 'SdProducts', 'action' => 'index']) ?></li>
        <li><?= $this->Html->link(__('New Sd Product'), ['controller' => 'SdProducts', 'action' => 'add']) ?></li>
    </ul>
</nav>
<div class="sdProductTypes form large-9 medium-8 columns content">
    <?= $this->Form->create($sdProductType) ?>
    <fieldset>
        <legend><?= __('Edit Sd Product Type') ?></legend>
        <?php
            echo $this->Form->control('type_name');
        ?>
    </fieldset>
    <?= $this->Form->button(__('Submit')) ?>
    <?= $this->Form->end() ?>
</div>
