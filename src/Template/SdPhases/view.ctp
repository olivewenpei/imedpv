<?php
/**
 * @var \App\View\AppView $this
 * @var \App\Model\Entity\SdPhase $sdPhase
 */
?>
<nav class="large-3 medium-4 columns" id="actions-sidebar">
    <ul class="side-nav">
        <li class="heading"><?= __('Actions') ?></li>
        <li><?= $this->Html->link(__('Edit Sd Phase'), ['action' => 'edit', $sdPhase->id]) ?> </li>
        <li><?= $this->Form->postLink(__('Delete Sd Phase'), ['action' => 'delete', $sdPhase->id], ['confirm' => __('Are you sure you want to delete # {0}?', $sdPhase->id)]) ?> </li>
        <li><?= $this->Html->link(__('List Sd Phases'), ['action' => 'index']) ?> </li>
        <li><?= $this->Html->link(__('New Sd Phase'), ['action' => 'add']) ?> </li>
        <li><?= $this->Html->link(__('List Sd Workflows'), ['controller' => 'SdWorkflows', 'action' => 'index']) ?> </li>
        <li><?= $this->Html->link(__('New Sd Workflow'), ['controller' => 'SdWorkflows', 'action' => 'add']) ?> </li>
        <li><?= $this->Html->link(__('List Sd Cases'), ['controller' => 'SdCases', 'action' => 'index']) ?> </li>
        <li><?= $this->Html->link(__('New Sd Case'), ['controller' => 'SdCases', 'action' => 'add']) ?> </li>
        <li><?= $this->Html->link(__('List Sd Phase Role Permissions'), ['controller' => 'SdPhaseRolePermissions', 'action' => 'index']) ?> </li>
        <li><?= $this->Html->link(__('New Sd Phase Role Permission'), ['controller' => 'SdPhaseRolePermissions', 'action' => 'add']) ?> </li>
        <li><?= $this->Html->link(__('List Sd Product Assignments'), ['controller' => 'SdProductAssignments', 'action' => 'index']) ?> </li>
        <li><?= $this->Html->link(__('New Sd Product Assignment'), ['controller' => 'SdProductAssignments', 'action' => 'add']) ?> </li>
    </ul>
</nav>
<div class="sdPhases view large-9 medium-8 columns content">
    <h3><?= h($sdPhase->id) ?></h3>
    <table class="vertical-table">
        <tr>
            <th scope="row"><?= __('Sd Workflow') ?></th>
            <td><?= $sdPhase->has('sd_workflow') ? $this->Html->link($sdPhase->sd_workflow->name, ['controller' => 'SdWorkflows', 'action' => 'view', $sdPhase->sd_workflow->id]) : '' ?></td>
        </tr>
        <tr>
            <th scope="row"><?= __('Id') ?></th>
            <td><?= $this->Number->format($sdPhase->id) ?></td>
        </tr>
        <tr>
            <th scope="row"><?= __('Order No') ?></th>
            <td><?= $this->Number->format($sdPhase->order_no) ?></td>
        </tr>
        <tr>
            <th scope="row"><?= __('Step Forward') ?></th>
            <td><?= $this->Number->format($sdPhase->step_forward) ?></td>
        </tr>
        <tr>
            <th scope="row"><?= __('Step Backward') ?></th>
            <td><?= $this->Number->format($sdPhase->step_backward) ?></td>
        </tr>
    </table>
    <div class="row">
        <h4><?= __('Phase Name') ?></h4>
        <?= $this->Text->autoParagraph(h($sdPhase->phase_name)); ?>
    </div>
    <div class="related">
        <h4><?= __('Related Sd Cases') ?></h4>
        <?php if (!empty($sdPhase->sd_cases)): ?>
        <table cellpadding="0" cellspacing="0">
            <tr>
                <th scope="col"><?= __('Id') ?></th>
                <th scope="col"><?= __('CaseNo') ?></th>
                <th scope="col"><?= __('Sd Product Id') ?></th>
                <th scope="col"><?= __('Sd Phase Id') ?></th>
                <th scope="col"><?= __('Start Date') ?></th>
                <th scope="col"><?= __('End Date') ?></th>
                <th scope="col"><?= __('Status') ?></th>
                <th scope="col" class="actions"><?= __('Actions') ?></th>
            </tr>
            <?php foreach ($sdPhase->sd_cases as $sdCases): ?>
            <tr>
                <td><?= h($sdCases->id) ?></td>
                <td><?= h($sdCases->caseNo) ?></td>
                <td><?= h($sdCases->sd_product_id) ?></td>
                <td><?= h($sdCases->sd_phase_id) ?></td>
                <td><?= h($sdCases->start_date) ?></td>
                <td><?= h($sdCases->end_date) ?></td>
                <td><?= h($sdCases->status) ?></td>
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
        <h4><?= __('Related Sd Phase Role Permissions') ?></h4>
        <?php if (!empty($sdPhase->sd_phase_role_permissions)): ?>
        <table cellpadding="0" cellspacing="0">
            <tr>
                <th scope="col"><?= __('Id') ?></th>
                <th scope="col"><?= __('Sd Phase Id') ?></th>
                <th scope="col"><?= __('Sd Role Id') ?></th>
                <th scope="col" class="actions"><?= __('Actions') ?></th>
            </tr>
            <?php foreach ($sdPhase->sd_phase_role_permissions as $sdPhaseRolePermissions): ?>
            <tr>
                <td><?= h($sdPhaseRolePermissions->id) ?></td>
                <td><?= h($sdPhaseRolePermissions->sd_phase_id) ?></td>
                <td><?= h($sdPhaseRolePermissions->sd_role_id) ?></td>
                <td class="actions">
                    <?= $this->Html->link(__('View'), ['controller' => 'SdPhaseRolePermissions', 'action' => 'view', $sdPhaseRolePermissions->id]) ?>
                    <?= $this->Html->link(__('Edit'), ['controller' => 'SdPhaseRolePermissions', 'action' => 'edit', $sdPhaseRolePermissions->id]) ?>
                    <?= $this->Form->postLink(__('Delete'), ['controller' => 'SdPhaseRolePermissions', 'action' => 'delete', $sdPhaseRolePermissions->id], ['confirm' => __('Are you sure you want to delete # {0}?', $sdPhaseRolePermissions->id)]) ?>
                </td>
            </tr>
            <?php endforeach; ?>
        </table>
        <?php endif; ?>
    </div>
    <div class="related">
        <h4><?= __('Related Sd Product Assignments') ?></h4>
        <?php if (!empty($sdPhase->sd_product_assignments)): ?>
        <table cellpadding="0" cellspacing="0">
            <tr>
                <th scope="col"><?= __('Id') ?></th>
                <th scope="col"><?= __('Sd Product Id') ?></th>
                <th scope="col"><?= __('Sd Phase Id') ?></th>
                <th scope="col"><?= __('Sd Company Id') ?></th>
                <th scope="col" class="actions"><?= __('Actions') ?></th>
            </tr>
            <?php foreach ($sdPhase->sd_product_assignments as $sdProductAssignments): ?>
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
