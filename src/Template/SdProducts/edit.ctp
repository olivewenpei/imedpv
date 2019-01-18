<?php
/**
 * @var \App\View\AppView $this
 * @var \App\Model\Entity\SdProduct $sdProduct
 */
?>
<nav class="large-3 medium-4 columns" id="actions-sidebar">
    <ul class="side-nav">
        <li class="heading"><?= __('Actions') ?></li>
        <li><?= $this->Form->postLink(
                __('Delete'),
                ['action' => 'delete', $sdProduct->id],
                ['confirm' => __('Are you sure you want to delete # {0}?', $sdProduct->id)]
            )
        ?></li>
        <li><?= $this->Html->link(__('List Sd Products'), ['action' => 'index']) ?></li>
        <li><?= $this->Html->link(__('List Sd Product Types'), ['controller' => 'SdProductTypes', 'action' => 'index']) ?></li>
        <li><?= $this->Html->link(__('New Sd Product Type'), ['controller' => 'SdProductTypes', 'action' => 'add']) ?></li>
        <li><?= $this->Html->link(__('List Sd Study Types'), ['controller' => 'SdStudyTypes', 'action' => 'index']) ?></li>
        <li><?= $this->Html->link(__('New Sd Study Type'), ['controller' => 'SdStudyTypes', 'action' => 'add']) ?></li>
        <li><?= $this->Html->link(__('List Sd Sponsor Companies'), ['controller' => 'SdSponsorCompanies', 'action' => 'index']) ?></li>
        <li><?= $this->Html->link(__('New Sd Sponsor Company'), ['controller' => 'SdSponsorCompanies', 'action' => 'add']) ?></li>
        <li><?= $this->Html->link(__('List Sd Product Workflows'), ['controller' => 'SdProductWorkflows', 'action' => 'index']) ?></li>
        <li><?= $this->Html->link(__('New Sd Product Workflow'), ['controller' => 'SdProductWorkflows', 'action' => 'add']) ?></li>
    </ul>
</nav>
<div class="sdProducts form large-9 medium-8 columns content">
    <?= $this->Form->create($sdProduct) ?>
    <fieldset>
        <legend><?= __('Edit Sd Product') ?></legend>
        <?php
            echo $this->Form->control('product_name');
            echo $this->Form->control('sd_product_type_id', ['options' => $sdProductTypes]);
            echo $this->Form->control('study_no');
            echo $this->Form->control('study_name');
            echo $this->Form->control('sd_study_type_id', ['options' => $sdStudyTypes]);
            echo $this->Form->control('sd_sponsor_company_id', ['options' => $sdSponsorCompanies]);
            echo $this->Form->control('short_desc');
            echo $this->Form->control('product_desc');
            echo $this->Form->control('blinding_tech');
            echo $this->Form->control('sd_product_flag_id');
            echo $this->Form->control('WHODD_code');
            echo $this->Form->control('WHODD_name');
            echo $this->Form->control('mfr_name');
            echo $this->Form->control('start_date');
            echo $this->Form->control('end_date');
            echo $this->Form->control('call_center');
            echo $this->Form->control('status');
        ?>
    </fieldset>
    <?= $this->Form->button(__('Submit')) ?>
    <?= $this->Form->end() ?>
</div>
