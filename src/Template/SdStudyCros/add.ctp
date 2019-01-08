<?php
/**
 * @var \App\View\AppView $this
 * @var \App\Model\Entity\SdStudyCro $sdStudyCro
 */
?>
<nav class="large-3 medium-4 columns" id="actions-sidebar">
    <ul class="side-nav">
        <li class="heading"><?= __('Actions') ?></li>
        <li><?= $this->Html->link(__('List Sd Study Cros'), ['action' => 'index']) ?></li>
    </ul>
</nav>
<div class="sdStudyCros form large-9 medium-8 columns content">
    <?= $this->Form->create($sdStudyCro) ?>
    <fieldset>
        <legend><?= __('Add Sd Study Cro') ?></legend>
        <?php
            echo $this->Form->control('sd_product_id');
            echo $this->Form->control('cro_company');
        ?>
    </fieldset>
    <?= $this->Form->button(__('Submit')) ?>
    <?= $this->Form->end() ?>
</div>
