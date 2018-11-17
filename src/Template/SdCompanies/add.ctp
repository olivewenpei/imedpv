<?php
/**
 * @var \App\View\AppView $this
 * @var \App\Model\Entity\SdCompany $sdCompany
 */
?>
<nav class="large-3 medium-4 columns" id="actions-sidebar">
    <ul class="side-nav">
        <li class="heading"><?= __('Actions') ?></li>
        <li><?= $this->Html->link(__('List Sd Companies'), ['action' => 'index']) ?></li>
        <li><?= $this->Html->link(__('List Sd User Types'), ['controller' => 'SdUserTypes', 'action' => 'index']) ?></li>
        <li><?= $this->Html->link(__('New Sd User Type'), ['controller' => 'SdUserTypes', 'action' => 'add']) ?></li>
        <li><?= $this->Html->link(__('List Sd Users'), ['controller' => 'SdUsers', 'action' => 'index']) ?></li>
        <li><?= $this->Html->link(__('New Sd User'), ['controller' => 'SdUsers', 'action' => 'add']) ?></li>
    </ul>
</nav>
<div class="sdCompanies form large-9 medium-8 columns content">
    <?= $this->Form->create($sdCompany) ?>
    <fieldset>
        <legend><?= __('Add Sd Company') ?></legend>
        <?php
            echo $this->Form->control('sd_user_type_id', ['options' => $sdUserTypes]);
            echo $this->Form->control('company_name');
            echo $this->Form->control('company_email');
            echo $this->Form->control('website');
            echo $this->Form->control('address_line1');
            echo $this->Form->control('address_line2');
            echo $this->Form->control('zipcode');
            echo $this->Form->control('city');
            echo $this->Form->control('state');
            echo $this->Form->control('country');
            echo $this->Form->control('cell_country_code');
            echo $this->Form->control('cell_phone_no');
            echo $this->Form->control('phone1_country_code');
            echo $this->Form->control('phone1');
            echo $this->Form->control('extention1');
            echo $this->Form->control('phone2_country_code');
            echo $this->Form->control('phone2');
            echo $this->Form->control('extention2');
            echo $this->Form->control('fax1_country_code');
            echo $this->Form->control('fax1');
            echo $this->Form->control('fax2_country_code');
            echo $this->Form->control('fax2');
            echo $this->Form->control('transaction_currency');
            echo $this->Form->control('no_of_billing_cycle');
            echo $this->Form->control('current_billing_cycle');
            echo $this->Form->control('no_of_whodra');
            echo $this->Form->control('status');
            echo $this->Form->control('un_paid');
            echo $this->Form->control('is_medra');
            echo $this->Form->control('is_whodra');
            echo $this->Form->control('create_by');
            echo $this->Form->control('created_dt');
            echo $this->Form->control('modify_by');
            echo $this->Form->control('modified_dt');
        ?>
    </fieldset>
    <?= $this->Form->button(__('Submit')) ?>
    <?= $this->Form->end() ?>
</div>
