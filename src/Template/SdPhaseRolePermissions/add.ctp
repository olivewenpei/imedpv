<?php
/**
 * @var \App\View\AppView $this
 * @var \App\Model\Entity\SdPhaseRolePermission $sdPhaseRolePermission
 */
?>
<nav class="large-3 medium-4 columns" id="actions-sidebar">
    <ul class="side-nav">
        <li class="heading"><?= __('Actions') ?></li>
        <li><?= $this->Html->link(__('List Sd Phase Role Permissions'), ['action' => 'index']) ?></li>
        <li><?= $this->Html->link(__('List Sd Phases'), ['controller' => 'SdPhases', 'action' => 'index']) ?></li>
        <li><?= $this->Html->link(__('New Sd Phase'), ['controller' => 'SdPhases', 'action' => 'add']) ?></li>
        <li><?= $this->Html->link(__('List Sd Roles'), ['controller' => 'SdRoles', 'action' => 'index']) ?></li>
        <li><?= $this->Html->link(__('New Sd Role'), ['controller' => 'SdRoles', 'action' => 'add']) ?></li>
        <li><?= $this->Html->link(__('List Sd Phase Role Section Permissions'), ['controller' => 'SdPhaseRoleSectionPermissions', 'action' => 'index']) ?></li>
        <li><?= $this->Html->link(__('New Sd Phase Role Section Permission'), ['controller' => 'SdPhaseRoleSectionPermissions', 'action' => 'add']) ?></li>
    </ul>
</nav>
<div class="sdPhaseRolePermissions form large-9 medium-8 columns content">
    <?= $this->Form->create($sdPhaseRolePermission) ?>
    <fieldset>
        <legend><?= __('Add Sd Phase Role Permission') ?></legend>
        <?php
            echo $this->Form->control('sd_phase_id', ['options' => $sdPhases]);
            echo $this->Form->control('sd_role_id', ['options' => $sdRoles]);
        ?>
    </fieldset>
    <?= $this->Form->button(__('Submit')) ?>
    <?= $this->Form->end() ?>
</div>
