<?php
/**
 * @var \App\View\AppView $this
 * @var \App\Model\Entity\SdUserAssignment $sdUserAssignment
 */
?>
<nav class="large-3 medium-4 columns" id="actions-sidebar">
    <ul class="side-nav">
        <li class="heading"><?= __('Actions') ?></li>
        <li><?= $this->Html->link(__('List Sd User Assignments'), ['action' => 'index']) ?></li>
        <li><?= $this->Html->link(__('List Sd Users'), ['controller' => 'SdUsers', 'action' => 'index']) ?></li>
        <li><?= $this->Html->link(__('New Sd User'), ['controller' => 'SdUsers', 'action' => 'add']) ?></li>
    </ul>
</nav>
<div class="sdUserAssignments form large-9 medium-8 columns content">
    <?= $this->Form->create($sdUserAssignment) ?>
    <fieldset>
        <legend><?= __('Add Sd User Assignment') ?></legend>
        <?php
            echo $this->Form->control('sd_study_assignment_id');
            echo $this->Form->control('sd_user_id', ['options' => $sdUsers]);
        ?>
    </fieldset>
    <?= $this->Form->button(__('Submit')) ?>
    <?= $this->Form->end() ?>
</div>