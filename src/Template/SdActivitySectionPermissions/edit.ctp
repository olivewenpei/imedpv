<?php
/**
 * @var \App\View\AppView $this
 * @var \App\Model\Entity\SdActivitySectionPermission $sdActivitySectionPermission
 */
?>
<nav class="large-3 medium-4 columns" id="actions-sidebar">
    <ul class="side-nav">
        <li class="heading"><?= __('Actions') ?></li>
        <li><?= $this->Form->postLink(
                __('Delete'),
                ['action' => 'delete', $sdActivitySectionPermission->id],
                ['confirm' => __('Are you sure you want to delete # {0}?', $sdActivitySectionPermission->id)]
            )
        ?></li>
        <li><?= $this->Html->link(__('List Sd Activity Section Permissions'), ['action' => 'index']) ?></li>
        <li><?= $this->Html->link(__('List Sd Activities'), ['controller' => 'SdActivities', 'action' => 'index']) ?></li>
        <li><?= $this->Html->link(__('New Sd Activity'), ['controller' => 'SdActivities', 'action' => 'add']) ?></li>
        <li><?= $this->Html->link(__('List Sd Sections'), ['controller' => 'SdSections', 'action' => 'index']) ?></li>
        <li><?= $this->Html->link(__('New Sd Section'), ['controller' => 'SdSections', 'action' => 'add']) ?></li>
    </ul>
</nav>
<div class="sdActivitySectionPermissions form large-9 medium-8 columns content">
    <?= $this->Form->create($sdActivitySectionPermission) ?>
    <fieldset>
        <legend><?= __('Edit Sd Activity Section Permission') ?></legend>
        <?php
            echo $this->Form->control('sd_activity_id', ['options' => $sdActivities]);
            echo $this->Form->control('sd_section_id', ['options' => $sdSections]);
            echo $this->Form->control('action');
        ?>
    </fieldset>
    <?= $this->Form->button(__('Submit')) ?>
    <?= $this->Form->end() ?>
</div>
