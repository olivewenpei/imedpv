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
        <li><?= $this->Html->link(__('List Sd Activities'), ['controller' => 'SdActivities', 'action' => 'index']) ?> </li>
        <li><?= $this->Html->link(__('New Sd Activity'), ['controller' => 'SdActivities', 'action' => 'add']) ?> </li>
        <li><?= $this->Html->link(__('List Sd Product Workflows'), ['controller' => 'SdProductWorkflows', 'action' => 'index']) ?> </li>
        <li><?= $this->Html->link(__('New Sd Product Workflow'), ['controller' => 'SdProductWorkflows', 'action' => 'add']) ?> </li>
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
        <h4><?= __('Related Sd Activities') ?></h4>
        <?php if (!empty($sdWorkflow->sd_activities)): ?>
        <table cellpadding="0" cellspacing="0">
            <tr>
                <th scope="col"><?= __('Id') ?></th>
                <th scope="col"><?= __('Sd Workflow Id') ?></th>
                <th scope="col"><?= __('Order No') ?></th>
                <th scope="col"><?= __('Step Forward') ?></th>
                <th scope="col"><?= __('Step Backward') ?></th>
                <th scope="col"><?= __('Activity Name') ?></th>
                <th scope="col" class="actions"><?= __('Actions') ?></th>
            </tr>
            <?php foreach ($sdWorkflow->sd_activities as $sdActivities): ?>
            <tr>
                <td><?= h($sdActivities->id) ?></td>
                <td><?= h($sdActivities->sd_workflow_id) ?></td>
                <td><?= h($sdActivities->order_no) ?></td>
                <td><?= h($sdActivities->step_forward) ?></td>
                <td><?= h($sdActivities->step_backward) ?></td>
                <td><?= h($sdActivities->activity_name) ?></td>
                <td class="actions">
                    <?= $this->Html->link(__('View'), ['controller' => 'SdActivities', 'action' => 'view', $sdActivities->id]) ?>
                    <?= $this->Html->link(__('Edit'), ['controller' => 'SdActivities', 'action' => 'edit', $sdActivities->id]) ?>
                    <?= $this->Form->postLink(__('Delete'), ['controller' => 'SdActivities', 'action' => 'delete', $sdActivities->id], ['confirm' => __('Are you sure you want to delete # {0}?', $sdActivities->id)]) ?>
                </td>
            </tr>
            <?php endforeach; ?>
        </table>
        <?php endif; ?>
    </div>
    <div class="related">
        <h4><?= __('Related Sd Product Workflows') ?></h4>
        <?php if (!empty($sdWorkflow->sd_product_workflows)): ?>
        <table cellpadding="0" cellspacing="0">
            <tr>
                <th scope="col"><?= __('Id') ?></th>
                <th scope="col"><?= __('Sd Product Id') ?></th>
                <th scope="col"><?= __('Sd Workflow Id') ?></th>
                <th scope="col"><?= __('Sd User Id') ?></th>
                <th scope="col" class="actions"><?= __('Actions') ?></th>
            </tr>
            <?php foreach ($sdWorkflow->sd_product_workflows as $sdProductWorkflows): ?>
            <tr>
                <td><?= h($sdProductWorkflows->id) ?></td>
                <td><?= h($sdProductWorkflows->sd_product_id) ?></td>
                <td><?= h($sdProductWorkflows->sd_workflow_id) ?></td>
                <td><?= h($sdProductWorkflows->sd_user_id) ?></td>
                <td class="actions">
                    <?= $this->Html->link(__('View'), ['controller' => 'SdProductWorkflows', 'action' => 'view', $sdProductWorkflows->id]) ?>
                    <?= $this->Html->link(__('Edit'), ['controller' => 'SdProductWorkflows', 'action' => 'edit', $sdProductWorkflows->id]) ?>
                    <?= $this->Form->postLink(__('Delete'), ['controller' => 'SdProductWorkflows', 'action' => 'delete', $sdProductWorkflows->id], ['confirm' => __('Are you sure you want to delete # {0}?', $sdProductWorkflows->id)]) ?>
                </td>
            </tr>
            <?php endforeach; ?>
        </table>
        <?php endif; ?>
    </div>
</div>
