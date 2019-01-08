<?php
/**
 * @var \App\View\AppView $this
 * @var \App\Model\Entity\SdWorkflow $sdWorkflow
 */
?>
<nav class="large-3 medium-4 columns" id="actions-sidebar">
    <ul class="side-nav">
        <li class="heading"><?= __('Actions') ?></li>
        <li><?= $this->Html->link(__('Edit Sd Workflow'), ['action' => 'edit', $sdWorkflow->id]) ?> </li>
        <li><?= $this->Form->postLink(__('Delete Sd Workflow'), ['action' => 'delete', $sdWorkflow->id], ['confirm' => __('Are you sure you want to delete # {0}?', $sdWorkflow->id)]) ?> </li>
        <li><?= $this->Html->link(__('List Sd Workflows'), ['action' => 'index']) ?> </li>
        <li><?= $this->Html->link(__('New Sd Workflow'), ['action' => 'add']) ?> </li>
        <li><?= $this->Html->link(__('List Sd Products'), ['controller' => 'SdProducts', 'action' => 'index']) ?> </li>
        <li><?= $this->Html->link(__('New Sd Product'), ['controller' => 'SdProducts', 'action' => 'add']) ?> </li>
    </ul>
</nav>
<div class="sdWorkflows view large-9 medium-8 columns content">
    <h3><?= h($sdWorkflow->name) ?></h3>
    <table class="vertical-table">
        <tr>
            <th scope="row"><?= __('Country') ?></th>
            <td><?= h($sdWorkflow->country) ?></td>
        </tr>
        <tr>
            <th scope="row"><?= __('Id') ?></th>
            <td><?= $this->Number->format($sdWorkflow->id) ?></td>
        </tr>
        <tr>
            <th scope="row"><?= __('Status') ?></th>
            <td><?= $this->Number->format($sdWorkflow->status) ?></td>
        </tr>
        <tr>
            <th scope="row"><?= __('Workflow Type') ?></th>
            <td><?= $this->Number->format($sdWorkflow->workflow_type) ?></td>
        </tr>
    </table>
    <div class="row">
        <h4><?= __('Name') ?></h4>
        <?= $this->Text->autoParagraph(h($sdWorkflow->name)); ?>
    </div>
    <div class="row">
        <h4><?= __('Description') ?></h4>
        <?= $this->Text->autoParagraph(h($sdWorkflow->description)); ?>
    </div>
    <div class="related">
        <h4><?= __('Related Sd Products') ?></h4>
        <?php if (!empty($sdWorkflow->sd_products)): ?>
        <table cellpadding="0" cellspacing="0">
            <tr>
                <th scope="col"><?= __('Id') ?></th>
                <th scope="col"><?= __('Sd Product Workflow Id') ?></th>
                <th scope="col"><?= __('Product Type') ?></th>
                <th scope="col"><?= __('Study No') ?></th>
                <th scope="col"><?= __('Sponsor Company') ?></th>
                <th scope="col"><?= __('Status') ?></th>
                <th scope="col" class="actions"><?= __('Actions') ?></th>
            </tr>
            <?php foreach ($sdWorkflow->sd_products as $sdProducts): ?>
            <tr>
                <td><?= h($sdProducts->id) ?></td>
                <td><?= h($sdProducts->sd_product_workflow_id) ?></td>
                <td><?= h($sdProducts->product_type) ?></td>
                <td><?= h($sdProducts->study_no) ?></td>
                <td><?= h($sdProducts->sponsor_company) ?></td>
                <td><?= h($sdProducts->status) ?></td>
                <td class="actions">
                    <?= $this->Html->link(__('View'), ['controller' => 'SdProducts', 'action' => 'view', $sdProducts->id]) ?>
                    <?= $this->Html->link(__('Edit'), ['controller' => 'SdProducts', 'action' => 'edit', $sdProducts->id]) ?>
                    <?= $this->Form->postLink(__('Delete'), ['controller' => 'SdProducts', 'action' => 'delete', $sdProducts->id], ['confirm' => __('Are you sure you want to delete # {0}?', $sdProducts->id)]) ?>
                </td>
            </tr>
            <?php endforeach; ?>
        </table>
        <?php endif; ?>
    </div>
</div>
