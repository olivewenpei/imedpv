<?php
/**
 * @var \App\View\AppView $this
 * @var \App\Model\Entity\SdSponsorCallcenter $sdSponsorCallcenter
 */
?>
<nav class="large-3 medium-4 columns" id="actions-sidebar">
    <ul class="side-nav">
        <li class="heading"><?= __('Actions') ?></li>
        <li><?= $this->Form->postLink(
                __('Delete'),
                ['action' => 'delete', $sdSponsorCallcenter->id],
                ['confirm' => __('Are you sure you want to delete # {0}?', $sdSponsorCallcenter->id)]
            )
        ?></li>
        <li><?= $this->Html->link(__('List Sd Sponsor Callcenters'), ['action' => 'index']) ?></li>
    </ul>
</nav>
<div class="sdSponsorCallcenters form large-9 medium-8 columns content">
    <?= $this->Form->create($sdSponsorCallcenter) ?>
    <fieldset>
        <legend><?= __('Edit Sd Sponsor Callcenter') ?></legend>
        <?php
            echo $this->Form->control('sponsor');
            echo $this->Form->control('call_center');
            echo $this->Form->control('status');
        ?>
    </fieldset>
    <?= $this->Form->button(__('Submit')) ?>
    <?= $this->Form->end() ?>
</div>
