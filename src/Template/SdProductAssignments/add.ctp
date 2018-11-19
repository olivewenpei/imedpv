<?php
/**
 * @var \App\View\AppView $this
 * @var \App\Model\Entity\SdProductAssignment $sdProductAssignment
 */
?>
<nav class="large-3 medium-4 columns" id="actions-sidebar">
    <ul class="side-nav">
        <li class="heading"><?= __('Actions') ?></li>
        <li><?= $this->Html->link(__('List Sd Product Assignments'), ['action' => 'index']) ?></li>
        <li><?= $this->Html->link(__('List Sd Products'), ['controller' => 'SdProducts', 'action' => 'index']) ?></li>
        <li><?= $this->Html->link(__('New Sd Product'), ['controller' => 'SdProducts', 'action' => 'add']) ?></li>
        <li><?= $this->Html->link(__('List Sd Phases'), ['controller' => 'SdPhases', 'action' => 'index']) ?></li>
        <li><?= $this->Html->link(__('New Sd Phase'), ['controller' => 'SdPhases', 'action' => 'add']) ?></li>
        <li><?= $this->Html->link(__('List Sd Companies'), ['controller' => 'SdCompanies', 'action' => 'index']) ?></li>
        <li><?= $this->Html->link(__('New Sd Company'), ['controller' => 'SdCompanies', 'action' => 'add']) ?></li>
    </ul>
</nav>
<div class="sdProductAssignments form large-9 medium-8 columns content">
    <?= $this->Form->create($sdProductAssignment) ?>
    <fieldset>
        <legend><?= __('Add Sd Product Assignment') ?></legend>
        <?php
            echo $this->Form->control('sd_product_id', ['options' => $sdProducts]);
            echo $this->Form->control('sd_phase_id', ['options' => $sdPhases]);
            echo $this->Form->control('sd_company_id', ['options' => $sdCompanies]);
        ?>
    </fieldset>
    <?= $this->Form->button(__('Submit')) ?>
    <?= $this->Form->end() ?>
</div>
