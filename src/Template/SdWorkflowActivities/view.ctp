<?php
/**
 * @var \App\View\AppView $this
 * @var \App\Model\Entity\SdWorkflowActivity $sdWorkflowActivity
 */
?>
<nav class="large-3 medium-4 columns" id="actions-sidebar">
    <ul class="side-nav">
        <li class="heading"><?= __('Actions') ?></li>
        <li><?= $this->Html->link(__('Edit Sd Workflow Activity'), ['action' => 'edit', $sdWorkflowActivity->id]) ?> </li>
        <li><?= $this->Form->postLink(__('Delete Sd Workflow Activity'), ['action' => 'delete', $sdWorkflowActivity->id], ['confirm' => __('Are you sure you want to delete # {0}?', $sdWorkflowActivity->id)]) ?> </li>
        <li><?= $this->Html->link(__('List Sd Workflow Activities'), ['action' => 'index']) ?> </li>
        <li><?= $this->Html->link(__('New Sd Workflow Activity'), ['action' => 'add']) ?> </li>
        <li><?= $this->Html->link(__('List Sd Workflows'), ['controller' => 'SdWorkflows', 'action' => 'index']) ?> </li>
        <li><?= $this->Html->link(__('New Sd Workflow'), ['controller' => 'SdWorkflows', 'action' => 'add']) ?> </li>
        <li><?= $this->Html->link(__('List Sd Cases'), ['controller' => 'SdCases', 'action' => 'index']) ?> </li>
        <li><?= $this->Html->link(__('New Sd Case'), ['controller' => 'SdCases', 'action' => 'add']) ?> </li>
    </ul>
</nav>
<div class="sdWorkflowActivities view large-9 medium-8 columns content">
    <h3><?= h($sdWorkflowActivity->id) ?></h3>
    <table class="vertical-table">
        <tr>
            <th scope="row"><?= __('Sd Workflow') ?></th>
            <td><?= $sdWorkflowActivity->has('sd_workflow') ? $this->Html->link($sdWorkflowActivity->sd_workflow->name, ['controller' => 'SdWorkflows', 'action' => 'view', $sdWorkflowActivity->sd_workflow->id]) : '' ?></td>
        </tr>
        <tr>
            <th scope="row"><?= __('Id') ?></th>
            <td><?= $this->Number->format($sdWorkflowActivity->id) ?></td>
        </tr>
        <tr>
            <th scope="row"><?= __('Order No') ?></th>
            <td><?= $this->Number->format($sdWorkflowActivity->order_no) ?></td>
        </tr>
        <tr>
            <th scope="row"><?= __('Step Forward') ?></th>
            <td><?= $this->Number->format($sdWorkflowActivity->step_forward) ?></td>
        </tr>
        <tr>
            <th scope="row"><?= __('Step Backward') ?></th>
            <td><?= $this->Number->format($sdWorkflowActivity->step_backward) ?></td>
        </tr>
    </table>
    <div class="row">
        <h4><?= __('Activity Name') ?></h4>
        <?= $this->Text->autoParagraph(h($sdWorkflowActivity->activity_name)); ?>
    </div>
    <div class="related">
        <h4><?= __('Related Sd Cases') ?></h4>
        <?php if (!empty($sdWorkflowActivity->sd_cases)): ?>
        <table cellpadding="0" cellspacing="0">
            <tr>
                <th scope="col"><?= __('Id') ?></th>
                <th scope="col"><?= __('Sd Product Workflow Id') ?></th>
                <th scope="col"><?= __('CaseNo') ?></th>
                <th scope="col"><?= __('Sd Workflow Activity Id') ?></th>
                <th scope="col"><?= __('Status') ?></th>
                <th scope="col"><?= __('Sd User Id') ?></th>
                <th scope="col"><?= __('Priority') ?></th>
                <th scope="col"><?= __('Activity Due Date') ?></th>
                <th scope="col"><?= __('Submission Due Date') ?></th>
                <th scope="col"><?= __('Product Type') ?></th>
                <th scope="col"><?= __('Classification') ?></th>
                <th scope="col" class="actions"><?= __('Actions') ?></th>
            </tr>
            <?php foreach ($sdWorkflowActivity->sd_cases as $sdCases): ?>
            <tr>
                <td><?= h($sdCases->id) ?></td>
                <td><?= h($sdCases->sd_product_workflow_id) ?></td>
                <td><?= h($sdCases->caseNo) ?></td>
                <td><?= h($sdCases->sd_workflow_activity_id) ?></td>
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
</div>
