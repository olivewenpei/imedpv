<?php
/**
 * @var \App\View\AppView $this
 * @var \App\Model\Entity\SdUser $sdUser
 */
?>
<nav class="large-3 medium-4 columns" id="actions-sidebar">
    <ul class="side-nav">
        <li class="heading"><?= __('Actions') ?></li>
        <li><?= $this->Html->link(__('List Sd Users'), ['action' => 'index']) ?></li>
        <li><?= $this->Html->link(__('List Sd Roles'), ['controller' => 'SdRoles', 'action' => 'index']) ?></li>
        <li><?= $this->Html->link(__('New Sd Role'), ['controller' => 'SdRoles', 'action' => 'add']) ?></li>
        <li><?= $this->Html->link(__('List Sd Companies'), ['controller' => 'SdCompanies', 'action' => 'index']) ?></li>
        <li><?= $this->Html->link(__('New Sd Company'), ['controller' => 'SdCompanies', 'action' => 'add']) ?></li>
        <li><?= $this->Html->link(__('List Sd Activity Log'), ['controller' => 'SdActivityLog', 'action' => 'index']) ?></li>
        <li><?= $this->Html->link(__('New Sd Activity Log'), ['controller' => 'SdActivityLog', 'action' => 'add']) ?></li>
    </ul>
</nav>
<div class="sdUsers form large-9 medium-8 columns content">
    <?= $this->Form->create($sdUser) ?>
    <fieldset>
        <legend><?= __('Add Sd User') ?></legend>
        <?php
            echo $this->Form->control('sd_role_id', ['options' => $sdRoles]);
            echo $this->Form->control('sd_company_id', ['options' => $sdCompanies, 'empty' => true]);
            echo $this->Form->control('firstname');
            echo $this->Form->control('lastname');
            echo $this->Form->control('username');
            echo $this->Form->control('email');
            echo $this->Form->control('password');
            echo $this->Form->control('thumbnail');
            echo $this->Form->control('site_number');
            echo $this->Form->control('site_name');
            echo $this->Form->control('title');
            echo $this->Form->control('phone_country_code');
            echo $this->Form->control('phone');
            echo $this->Form->control('extention');
            echo $this->Form->control('cell_country_code');
            echo $this->Form->control('cell_phone_no');
            echo $this->Form->control('verification');
            echo $this->Form->control('phone_alert');
            echo $this->Form->control('email_alert');
            echo $this->Form->control('is_never');
            echo $this->Form->control('account_expire_date', ['empty' => true]);
            echo $this->Form->control('is_email_verified');
            echo $this->Form->control('reset_password_expire_time', ['empty' => true]);
            echo $this->Form->control('is_import_user');
            echo $this->Form->control('is_medra');
            echo $this->Form->control('is_whodra');
            echo $this->Form->control('job_title');
            echo $this->Form->control('assign_protocol');
            echo $this->Form->control('status');
            echo $this->Form->control('default_language');
            echo $this->Form->control('is_imedsae_tracking');
            echo $this->Form->control('is_imed_safety_database');
            echo $this->Form->control('created_by');
            echo $this->Form->control('created_dt', ['empty' => true]);
            echo $this->Form->control('modified_by');
            echo $this->Form->control('modified_dt', ['empty' => true]);
        ?>
    </fieldset>
    <?= $this->Form->button(__('Submit')) ?>
    <?= $this->Form->end() ?>
</div>
