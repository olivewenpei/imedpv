<?php
/**
 * @var \App\View\AppView $this
 * @var \App\Model\Entity\SdQuery $sdQuery
 */
?>
<nav class="large-3 medium-4 columns" id="actions-sidebar">
    <ul class="side-nav">
        <li class="heading"><?= __('Actions') ?></li>
        <li><?= $this->Html->link(__('List Sd Queries'), ['action' => 'index']) ?></li>
    </ul>
</nav>
<div class="sdQueries form large-9 medium-8 columns content">
    <?= $this->Form->create($sdQuery) ?>
    <fieldset>
        <legend><?= __('Add Sd Query') ?></legend>
        <?php
            echo $this->Form->control('title');
            echo $this->Form->control('content');
            echo $this->Form->control('query_type');
            echo $this->Form->control('sender');
            echo $this->Form->control('receiver');
            echo $this->Form->control('sender_deleted');
            echo $this->Form->control('receiver_status');
            echo $this->Form->control('send_date');
            echo $this->Form->control('read_date', ['empty' => true]);
            echo $this->Form->control('query_status');
        ?>
    </fieldset>
    <?= $this->Form->button(__('Submit')) ?>
    <?= $this->Form->end() ?>
</div>
