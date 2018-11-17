<?php
/**
 * @var \App\View\AppView $this
 * @var \App\Model\Entity\SdRole $sdRole
 */
?>
<nav class="large-3 medium-4 columns" id="actions-sidebar">
    <ul class="side-nav">
        <li class="heading"><?= __('Actions') ?></li>
        <li><?= $this->Html->link(__('List Sd Roles'), ['action' => 'index']) ?></li>
        <li><?= $this->Html->link(__('List Sd User Types'), ['controller' => 'SdUserTypes', 'action' => 'index']) ?></li>
        <li><?= $this->Html->link(__('New Sd User Type'), ['controller' => 'SdUserTypes', 'action' => 'add']) ?></li>
        <li><?= $this->Html->link(__('List Sd Users'), ['controller' => 'SdUsers', 'action' => 'index']) ?></li>
        <li><?= $this->Html->link(__('New Sd User'), ['controller' => 'SdUsers', 'action' => 'add']) ?></li>
    </ul>
</nav>
<div class="sdRoles form large-9 medium-8 columns content">
    <?= $this->Form->create($sdRole) ?>
    <fieldset>
        <legend><?= __('Add Sd Role') ?></legend>
        <?php
            echo $this->Form->control('role_name');
            echo $this->Form->control('status');
            echo $this->Form->control('description');
            echo $this->Form->control('parent_group');
            echo $this->Form->control('sd_user_type_id', ['options' => $sdUserTypes, 'empty' => true]);
        ?>
    </fieldset>
    <?= $this->Form->button(__('Submit')) ?>
    <?= $this->Form->end() ?>
</div>
