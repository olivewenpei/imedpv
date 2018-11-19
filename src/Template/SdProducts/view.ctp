<?php
/**
 * @var \App\View\AppView $this
 * @var \App\Model\Entity\SdProduct $sdProduct
 */
?>
<nav class="large-3 medium-4 columns" id="actions-sidebar">
    <ul class="side-nav">
        <li class="heading"><?= __('Actions') ?></li>
        <li><?= $this->Html->link(__('Edit Sd Product'), ['action' => 'edit', $sdProduct->id]) ?> </li>
        <li><?= $this->Form->postLink(__('Delete Sd Product'), ['action' => 'delete', $sdProduct->id], ['confirm' => __('Are you sure you want to delete # {0}?', $sdProduct->id)]) ?> </li>
        <li><?= $this->Html->link(__('List Sd Products'), ['action' => 'index']) ?> </li>
        <li><?= $this->Html->link(__('New Sd Product'), ['action' => 'add']) ?> </li>
        <li><?= $this->Html->link(__('List Sd Workflows'), ['controller' => 'SdWorkflows', 'action' => 'index']) ?> </li>
        <li><?= $this->Html->link(__('New Sd Workflow'), ['controller' => 'SdWorkflows', 'action' => 'add']) ?> </li>
        <li><?= $this->Html->link(__('List Sd Product Assignments'), ['controller' => 'SdProductAssignments', 'action' => 'index']) ?> </li>
        <li><?= $this->Html->link(__('New Sd Product Assignment'), ['controller' => 'SdProductAssignments', 'action' => 'add']) ?> </li>
    </ul>
</nav>
<div class="sdProducts view large-9 medium-8 columns content">
    <h3><?= h($sdProduct->id) ?></h3>
    <table class="vertical-table">
        <tr>
            <th scope="row"><?= __('Sd Workflow') ?></th>
            <td><?= $sdProduct->has('sd_workflow') ? $this->Html->link($sdProduct->sd_workflow->name, ['controller' => 'SdWorkflows', 'action' => 'view', $sdProduct->sd_workflow->id]) : '' ?></td>
        </tr>
        <tr>
            <th scope="row"><?= __('Id') ?></th>
            <td><?= $this->Number->format($sdProduct->id) ?></td>
        </tr>
        <tr>
            <th scope="row"><?= __('Product Type') ?></th>
            <td><?= $this->Number->format($sdProduct->product_type) ?></td>
        </tr>
        <tr>
            <th scope="row"><?= __('Sponsor Company') ?></th>
            <td><?= $this->Number->format($sdProduct->sponsor_company) ?></td>
        </tr>
        <tr>
            <th scope="row"><?= __('Status') ?></th>
            <td><?= $this->Number->format($sdProduct->status) ?></td>
        </tr>
    </table>
    <div class="row">
        <h4><?= __('Study No') ?></h4>
        <?= $this->Text->autoParagraph(h($sdProduct->study_no)); ?>
    </div>
    <div class="related">
        <h4><?= __('Related Sd Product Assignments') ?></h4>
        <?php if (!empty($sdProduct->sd_product_assignments)): ?>
        <table cellpadding="0" cellspacing="0">
            <tr>
                <th scope="col"><?= __('Id') ?></th>
                <th scope="col"><?= __('Sd Product Id') ?></th>
                <th scope="col"><?= __('Sd Phase Id') ?></th>
                <th scope="col"><?= __('Sd Company Id') ?></th>
                <th scope="col" class="actions"><?= __('Actions') ?></th>
            </tr>
            <?php foreach ($sdProduct->sd_product_assignments as $sdProductAssignments): ?>
            <tr>
                <td><?= h($sdProductAssignments->id) ?></td>
                <td><?= h($sdProductAssignments->sd_product_id) ?></td>
                <td><?= h($sdProductAssignments->sd_phase_id) ?></td>
                <td><?= h($sdProductAssignments->sd_company_id) ?></td>
                <td class="actions">
                    <?= $this->Html->link(__('View'), ['controller' => 'SdProductAssignments', 'action' => 'view', $sdProductAssignments->id]) ?>
                    <?= $this->Html->link(__('Edit'), ['controller' => 'SdProductAssignments', 'action' => 'edit', $sdProductAssignments->id]) ?>
                    <?= $this->Form->postLink(__('Delete'), ['controller' => 'SdProductAssignments', 'action' => 'delete', $sdProductAssignments->id], ['confirm' => __('Are you sure you want to delete # {0}?', $sdProductAssignments->id)]) ?>
                </td>
            </tr>
            <?php endforeach; ?>
        </table>
        <?php endif; ?>
    </div>
</div>
