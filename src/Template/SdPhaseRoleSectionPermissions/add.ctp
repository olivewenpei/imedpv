<?php
/**
 * @var \App\View\AppView $this
 * @var \App\Model\Entity\SdPhaseRoleSectionPermission $sdPhaseRoleSectionPermission
 */
?>
<nav class="large-3 medium-4 columns" id="actions-sidebar">
    <ul class="side-nav">
        <li class="heading"><?= __('Actions') ?></li>
        <li><?= $this->Html->link(__('List Sd Phase Role Section Permissions'), ['action' => 'index']) ?></li>
        <li><?= $this->Html->link(__('List Sd Phase Role Permissions'), ['controller' => 'SdPhaseRolePermissions', 'action' => 'index']) ?></li>
        <li><?= $this->Html->link(__('New Sd Phase Role Permission'), ['controller' => 'SdPhaseRolePermissions', 'action' => 'add']) ?></li>
        <li><?= $this->Html->link(__('List Sd Sections'), ['controller' => 'SdSections', 'action' => 'index']) ?></li>
        <li><?= $this->Html->link(__('New Sd Section'), ['controller' => 'SdSections', 'action' => 'add']) ?></li>
    </ul>
</nav>
<div class="sdPhaseRoleSectionPermissions form large-9 medium-8 columns content">
    <?= $this->Form->create($sdPhaseRoleSectionPermission) ?>
    <fieldset>
        <legend><?= __('Add Sd Phase Role Section Permission') ?></legend>
        <?php
            echo $this->Form->control('sd_phase_role_permission_id', ['options' => $sdPhaseRolePermissions]);
            echo $this->Form->control('sd_section_id', ['options' => $sdSections]);
            echo $this->Form->control('action');
        ?>
    </fieldset>
    <?= $this->Form->button(__('Submit')) ?>
    <?= $this->Form->end() ?>
</div>
