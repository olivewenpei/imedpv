<?php
/**
 * @var \App\View\AppView $this
 * @var \App\Model\Entity\SdProductWorkflow $sdProductWorkflow
 */
?>
<nav class="large-3 medium-4 columns" id="actions-sidebar">
    <ul class="side-nav">
        <li class="heading"><?= __('Actions') ?></li>
        <li><?= $this->Html->link(__('Edit Sd Product Workflow'), ['action' => 'edit', $sdProductWorkflow->id]) ?> </li>
        <li><?= $this->Form->postLink(__('Delete Sd Product Workflow'), ['action' => 'delete', $sdProductWorkflow->id], ['confirm' => __('Are you sure you want to delete # {0}?', $sdProductWorkflow->id)]) ?> </li>
        <li><?= $this->Html->link(__('List Sd Product Workflows'), ['action' => 'index']) ?> </li>
        <li><?= $this->Html->link(__('New Sd Product Workflow'), ['action' => 'add']) ?> </li>
        <li><?= $this->Html->link(__('List Sd Workflows'), ['controller' => 'SdWorkflows', 'action' => 'index']) ?> </li>
        <li><?= $this->Html->link(__('New Sd Workflow'), ['controller' => 'SdWorkflows', 'action' => 'add']) ?> </li>
        <li><?= $this->Html->link(__('List Sd Users'), ['controller' => 'SdUsers', 'action' => 'index']) ?> </li>
        <li><?= $this->Html->link(__('New Sd User'), ['controller' => 'SdUsers', 'action' => 'add']) ?> </li>
        <li><?= $this->Html->link(__('List Sd Products'), ['controller' => 'SdProducts', 'action' => 'index']) ?> </li>
        <li><?= $this->Html->link(__('New Sd Product'), ['controller' => 'SdProducts', 'action' => 'add']) ?> </li>
        <li><?= $this->Html->link(__('List Sd Cases'), ['controller' => 'SdCases', 'action' => 'index']) ?> </li>
        <li><?= $this->Html->link(__('New Sd Case'), ['controller' => 'SdCases', 'action' => 'add']) ?> </li>
    </ul>
</nav>
<div class="sdProductWorkflows view large-9 medium-8 columns content">
    <h3><?= h($sdProductWorkflow->id) ?></h3>
    <table class="vertical-table">
        <tr>
            <th scope="row"><?= __('Sd Workflow') ?></th>
            <td><?= $sdProductWorkflow->has('sd_workflow') ? $this->Html->link($sdProductWorkflow->sd_workflow->name, ['controller' => 'SdWorkflows', 'action' => 'view', $sdProductWorkflow->sd_workflow->id]) : '' ?></td>
        </tr>
        <tr>
            <th scope="row"><?= __('Sd User') ?></th>
            <td><?= $sdProductWorkflow->has('sd_user') ? $this->Html->link($sdProductWorkflow->sd_user->title, ['controller' => 'SdUsers', 'action' => 'view', $sdProductWorkflow->sd_user->id]) : '' ?></td>
        </tr>
        <tr>
            <th scope="row"><?= __('Id') ?></th>
            <td><?= $this->Number->format($sdProductWorkflow->id) ?></td>
        </tr>
        <tr>
            <th scope="row"><?= __('Sd Product Id') ?></th>
            <td><?= $this->Number->format($sdProductWorkflow->sd_product_id) ?></td>
        </tr>
    </table>
    <div class="related">
        <h4><?= __('Related Sd Products') ?></h4>
        <?php if (!empty($sdProductWorkflow->sd_products)): ?>
        <table cellpadding="0" cellspacing="0">
            <tr>
                <th scope="col"><?= __('Id') ?></th>
                <th scope="col"><?= __('Product Type') ?></th>
                <th scope="col"><?= __('Study No') ?></th>
                <th scope="col"><?= __('Sponsor Company') ?></th>
                <th scope="col"><?= __('Status') ?></th>
                <th scope="col" class="actions"><?= __('Actions') ?></th>
            </tr>
            <?php foreach ($sdProductWorkflow->sd_products as $sdProducts): ?>
            <tr>
                <td><?= h($sdProducts->id) ?></td>
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
    <div class="related">
        <h4><?= __('Related Sd Cases') ?></h4>
        <?php if (!empty($sdProductWorkflow->sd_cases)): ?>
        <table cellpadding="0" cellspacing="0">
            <tr>
                <th scope="col"><?= __('Id') ?></th>
                <th scope="col"><?= __('Sd Product Workflow Id') ?></th>
                <th scope="col"><?= __('CaseNo') ?></th>
                <th scope="col"><?= __('Sd Activity Id') ?></th>
                <th scope="col"><?= __('Start Date') ?></th>
                <th scope="col"><?= __('End Date') ?></th>
                <th scope="col"><?= __('Status') ?></th>
                <th scope="col"><?= __('Sd User Id') ?></th>
                <th scope="col" class="actions"><?= __('Actions') ?></th>
            </tr>
            <?php foreach ($sdProductWorkflow->sd_cases as $sdCases): ?>
            <tr>
                <td><?= h($sdCases->id) ?></td>
                <td><?= h($sdCases->sd_product_workflow_id) ?></td>
                <td><?= h($sdCases->caseNo) ?></td>
                <td><?= h($sdCases->sd_activity_id) ?></td>
                <td><?= h($sdCases->start_date) ?></td>
                <td><?= h($sdCases->end_date) ?></td>
                <td><?= h($sdCases->status) ?></td>
                <td><?= h($sdCases->sd_user_id) ?></td>
                <td class="actions">
                    <?= $this->Html->link(__('View'), ['controller' => 'SdCases', 'action' => 'view', $sdCases->id]) ?>
                    <?= $this->Html->link(__('Edit'), ['controller' => 'SdCases', 'action' => 'edit', $sdCases->id]) ?>
                    <?= $this->Form->postLink(__('Delete'), ['controller' => 'SdCases', 'action' => 'delete', $sdCases->id], ['confirm' => __('Are you sure you want to delete # {0}?', $sdCases->id)]) ?>
                </td>
            </tr>
            <?php endforeach; ?>
        </table>
        <?php endif; ?>
    </div>
</div>
