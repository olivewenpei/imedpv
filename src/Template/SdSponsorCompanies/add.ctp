<?php
/**
 * @var \App\View\AppView $this
 * @var \App\Model\Entity\SdSponsorCompany $sdSponsorCompany
 */
?>
<nav class="large-3 medium-4 columns" id="actions-sidebar">
    <ul class="side-nav">
        <li class="heading"><?= __('Actions') ?></li>
        <li><?= $this->Html->link(__('List Sd Sponsor Companies'), ['action' => 'index']) ?></li>
        <li><?= $this->Html->link(__('List Sd Products'), ['controller' => 'SdProducts', 'action' => 'index']) ?></li>
        <li><?= $this->Html->link(__('New Sd Product'), ['controller' => 'SdProducts', 'action' => 'add']) ?></li>
    </ul>
</nav>
<div class="sdSponsorCompanies form large-9 medium-8 columns content">
    <?= $this->Form->create($sdSponsorCompany) ?>
    <fieldset>
        <legend><?= __('Add Sd Sponsor Company') ?></legend>
        <?php
            echo $this->Form->control('company_name');
            echo $this->Form->control('country');
        ?>
    </fieldset>
    <?= $this->Form->button(__('Submit')) ?>
    <?= $this->Form->end() ?>
</div>
