<?php
/**
 * @var \App\View\AppView $this
 * @var \App\Model\Entity\SdSponsorCro $sdSponsorCro
 */
?>
<nav class="large-3 medium-4 columns" id="actions-sidebar">
    <ul class="side-nav">
        <li class="heading"><?= __('Actions') ?></li>
        <li><?= $this->Form->postLink(
                __('Delete'),
                ['action' => 'delete', $sdSponsorCro->id],
                ['confirm' => __('Are you sure you want to delete # {0}?', $sdSponsorCro->id)]
            )
        ?></li>
        <li><?= $this->Html->link(__('List Sd Sponsor Cros'), ['action' => 'index']) ?></li>
    </ul>
</nav>
<div class="sdSponsorCros form large-9 medium-8 columns content">
    <?= $this->Form->create($sdSponsorCro) ?>
    <fieldset>
        <legend><?= __('Edit Sd Sponsor Cro') ?></legend>
        <?php
            echo $this->Form->control('sponsor');
            echo $this->Form->control('cro_company');
            echo $this->Form->control('status');
        ?>
    </fieldset>
    <?= $this->Form->button(__('Submit')) ?>
    <?= $this->Form->end() ?>
</div>
