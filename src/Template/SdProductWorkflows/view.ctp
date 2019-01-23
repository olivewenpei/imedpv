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
        <li><?= $this->Html->link(__('List Sd Products'), ['controller' => 'SdProducts', 'action' => 'index']) ?> </li>
        <li><?= $this->Html->link(__('New Sd Product'), ['controller' => 'SdProducts', 'action' => 'add']) ?> </li>
        <li><?= $this->Html->link(__('List Sd Workflows'), ['controller' => 'SdWorkflows', 'action' => 'index']) ?> </li>
        <li><?= $this->Html->link(__('New Sd Workflow'), ['controller' => 'SdWorkflows', 'action' => 'add']) ?> </li>
        <li><?= $this->Html->link(__('List Sd Users'), ['controller' => 'SdUsers', 'action' => 'index']) ?> </li>
        <li><?= $this->Html->link(__('New Sd User'), ['controller' => 'SdUsers', 'action' => 'add']) ?> </li>
        <li><?= $this->Html->link(__('List Sd Cases'), ['controller' => 'SdCases', 'action' => 'index']) ?> </li>
        <li><?= $this->Html->link(__('New Sd Case'), ['controller' => 'SdCases', 'action' => 'add']) ?> </li>
        <li><?= $this->Html->link(__('List Sd User Assignments'), ['controller' => 'SdUserAssignments', 'action' => 'index']) ?> </li>
        <li><?= $this->Html->link(__('New Sd User Assignment'), ['controller' => 'SdUserAssignments', 'action' => 'add']) ?> </li>
    </ul>
</nav>
<div class="sdProductWorkflows view large-9 medium-8 columns content">
    <h3><?= h($sdProductWorkflow->id) ?></h3>
    <table class="vertical-table">
        <tr>
            <th scope="row"><?= __('Sd Product') ?></th>
            <td><?= $sdProductWorkflow->has('sd_product') ? $this->Html->link($sdProductWorkflow->sd_product->id, ['controller' => 'SdProducts', 'action' => 'view', $sdProductWorkflow->sd_product->id]) : '' ?></td>
        </tr>
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
            <th scope="row"><?= __('Sd Company Id') ?></th>
            <td><?= $this->Number->format($sdProductWorkflow->sd_company_id) ?></td>
        </tr>
    </table>
    <div class="related">
        <h4><?= __('Related Sd Cases') ?></h4>
        <?php if (!empty($sdProductWorkflow->sd_cases)): ?>
        <table cellpadding="0" cellspacing="0">
            <tr>
                <th scope="col"><?= __('Id') ?></th>
                <th scope="col"><?= __('Sd Product Workflow Id') ?></th>
                <th scope="col"><?= __('CaseNo') ?></th>
                <th scope="col"><?= __('Sd Activity Id') ?></th>
                <th scope="col"><?= __('Status') ?></th>
                <th scope="col"><?= __('Sd User Id') ?></th>
                <th scope="col"><?= __('Priority') ?></th>
                <th scope="col"><?= __('Activity Due Date') ?></th>
                <th scope="col"><?= __('Submission Due Date') ?></th>
                <th scope="col"><?= __('Product Type') ?></th>
                <th scope="col"><?= __('Classification') ?></th>
                <th scope="col" class="actions"><?= __('Actions') ?></th>
            </tr>
            <?php foreach ($sdProductWorkflow->sd_cases as $sdCases): ?>
            <tr>
                <td><?= h($sdCases->id) ?></td>
                <td><?= h($sdCases->sd_product_workflow_id) ?></td>
                <td><?= h($sdCases->caseNo) ?></td>
                <td><?= h($sdCases->sd_activity_id) ?></td>
                <td><?= h($sdCases->status) ?></td>
                <td><?= h($sdCases->sd_user_id) ?></td>
                <td><?= h($sdCases->priority) ?></td>
                <td><?= h($sdCases->activity_due_date) ?></td>
                <td><?= h($sdCases->submission_due_date) ?></td>
                <td><?= h($sdCases->product_type) ?></td>
                <td><?= h($sdCases->classification) ?></td>
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
    <div class="related">
        <h4><?= __('Related Sd User Assignments') ?></h4>
        <?php if (!empty($sdProductWorkflow->sd_user_assignments)): ?>
        <table cellpadding="0" cellspacing="0">
            <tr>
                <th scope="col"><?= __('Id') ?></th>
                <th scope="col"><?= __('Sd Product Workflow Id') ?></th>
                <th scope="col"><?= __('Sd User Id') ?></th>
                <th scope="col"><?= __('Sd Activity Id') ?></th>
                <th scope="col" class="actions"><?= __('Actions') ?></th>
            </tr>
            <?php foreach ($sdProductWorkflow->sd_user_assignments as $sdUserAssignments): ?>
            <tr>
                <td><?= h($sdUserAssignments->id) ?></td>
                <td><?= h($sdUserAssignments->sd_product_workflow_id) ?></td>
                <td><?= h($sdUserAssignments->sd_user_id) ?></td>
                <td><?= h($sdUserAssignments->sd_activity_id) ?></td>
                <td class="actions">
                    <?= $this->Html->link(__('View'), ['controller' => 'SdUserAssignments', 'action' => 'view', $sdUserAssignments->id]) ?>
                    <?= $this->Html->link(__('Edit'), ['controller' => 'SdUserAssignments', 'action' => 'edit', $sdUserAssignments->id]) ?>
                    <?= $this->Form->postLink(__('Delete'), ['controller' => 'SdUserAssignments', 'action' => 'delete', $sdUserAssignments->id], ['confirm' => __('Are you sure you want to delete # {0}?', $sdUserAssignments->id)]) ?>
                </td>
            </tr>
            <?php endforeach; ?>
        </table>
        <?php endif; ?>
    </div>
</div>
