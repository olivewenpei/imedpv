<?php
/**
 * @var \App\View\AppView $this
 * @var \App\Model\Entity\SdCase $sdCase
 */
?>
<nav class="large-3 medium-4 columns" id="actions-sidebar">
    <ul class="side-nav">
        <li class="heading"><?= __('Actions') ?></li>
        <li><?= $this->Html->link(__('Edit Sd Case'), ['action' => 'edit', $sdCase->id]) ?> </li>
        <li><?= $this->Form->postLink(__('Delete Sd Case'), ['action' => 'delete', $sdCase->id], ['confirm' => __('Are you sure you want to delete # {0}?', $sdCase->id)]) ?> </li>
        <li><?= $this->Html->link(__('List Sd Cases'), ['action' => 'index']) ?> </li>
        <li><?= $this->Html->link(__('New Sd Case'), ['action' => 'add']) ?> </li>
        <li><?= $this->Html->link(__('List Sd Product Workflows'), ['controller' => 'SdProductWorkflows', 'action' => 'index']) ?> </li>
        <li><?= $this->Html->link(__('New Sd Product Workflow'), ['controller' => 'SdProductWorkflows', 'action' => 'add']) ?> </li>
        <li><?= $this->Html->link(__('List Sd Activities'), ['controller' => 'SdActivities', 'action' => 'index']) ?> </li>
        <li><?= $this->Html->link(__('New Sd Activity'), ['controller' => 'SdActivities', 'action' => 'add']) ?> </li>
        <li><?= $this->Html->link(__('List Sd Users'), ['controller' => 'SdUsers', 'action' => 'index']) ?> </li>
        <li><?= $this->Html->link(__('New Sd User'), ['controller' => 'SdUsers', 'action' => 'add']) ?> </li>
        <li><?= $this->Html->link(__('List Sd Case General Infos'), ['controller' => 'SdCaseGeneralInfos', 'action' => 'index']) ?> </li>
        <li><?= $this->Html->link(__('New Sd Case General Info'), ['controller' => 'SdCaseGeneralInfos', 'action' => 'add']) ?> </li>
        <li><?= $this->Html->link(__('List Sd Field Values'), ['controller' => 'SdFieldValues', 'action' => 'index']) ?> </li>
        <li><?= $this->Html->link(__('New Sd Field Value'), ['controller' => 'SdFieldValues', 'action' => 'add']) ?> </li>
    </ul>
</nav>
<div class="sdCases view large-9 medium-8 columns content">
    <h3><?= h($sdCase->id) ?></h3>
    <table class="vertical-table">
        <tr>
            <th scope="row"><?= __('Sd Product Workflow') ?></th>
            <td><?= $sdCase->has('sd_product_workflow') ? $this->Html->link($sdCase->sd_product_workflow->id, ['controller' => 'SdProductWorkflows', 'action' => 'view', $sdCase->sd_product_workflow->id]) : '' ?></td>
        </tr>
        <tr>
            <th scope="row"><?= __('CaseNo') ?></th>
            <td><?= h($sdCase->caseNo) ?></td>
        </tr>
        <tr>
            <th scope="row"><?= __('Sd Activity') ?></th>
            <td><?= $sdCase->has('sd_activity') ? $this->Html->link($sdCase->sd_activity->id, ['controller' => 'SdActivities', 'action' => 'view', $sdCase->sd_activity->id]) : '' ?></td>
        </tr>
        <tr>
            <th scope="row"><?= __('Sd User') ?></th>
            <td><?= $sdCase->has('sd_user') ? $this->Html->link($sdCase->sd_user->title, ['controller' => 'SdUsers', 'action' => 'view', $sdCase->sd_user->id]) : '' ?></td>
        </tr>
        <tr>
            <th scope="row"><?= __('Classification') ?></th>
            <td><?= h($sdCase->classification) ?></td>
        </tr>
        <tr>
            <th scope="row"><?= __('Id') ?></th>
            <td><?= $this->Number->format($sdCase->id) ?></td>
        </tr>
        <tr>
            <th scope="row"><?= __('Status') ?></th>
            <td><?= $this->Number->format($sdCase->status) ?></td>
        </tr>
        <tr>
            <th scope="row"><?= __('Priority') ?></th>
            <td><?= $this->Number->format($sdCase->priority) ?></td>
        </tr>
        <tr>
            <th scope="row"><?= __('Product Type') ?></th>
            <td><?= $this->Number->format($sdCase->product_type) ?></td>
        </tr>
        <tr>
            <th scope="row"><?= __('Activity Due Date') ?></th>
            <td><?= h($sdCase->activity_due_date) ?></td>
        </tr>
        <tr>
            <th scope="row"><?= __('Submission Due Date') ?></th>
            <td><?= h($sdCase->submission_due_date) ?></td>
        </tr>
    </table>
    <div class="related">
        <h4><?= __('Related Sd Case General Infos') ?></h4>
        <?php if (!empty($sdCase->sd_case_general_infos)): ?>
        <table cellpadding="0" cellspacing="0">
            <tr>
                <th scope="col"><?= __('Id') ?></th>
                <th scope="col"><?= __('Sd Case Id') ?></th>
                <th scope="col"><?= __('Case Detail Info') ?></th>
                <th scope="col" class="actions"><?= __('Actions') ?></th>
            </tr>
            <?php foreach ($sdCase->sd_case_general_infos as $sdCaseGeneralInfos): ?>
            <tr>
                <td><?= h($sdCaseGeneralInfos->id) ?></td>
                <td><?= h($sdCaseGeneralInfos->sd_case_id) ?></td>
                <td><?= h($sdCaseGeneralInfos->case_detail_info) ?></td>
                <td class="actions">
                    <?= $this->Html->link(__('View'), ['controller' => 'SdCaseGeneralInfos', 'action' => 'view', $sdCaseGeneralInfos->id]) ?>
                    <?= $this->Html->link(__('Edit'), ['controller' => 'SdCaseGeneralInfos', 'action' => 'edit', $sdCaseGeneralInfos->id]) ?>
                    <?= $this->Form->postLink(__('Delete'), ['controller' => 'SdCaseGeneralInfos', 'action' => 'delete', $sdCaseGeneralInfos->id], ['confirm' => __('Are you sure you want to delete # {0}?', $sdCaseGeneralInfos->id)]) ?>
                </td>
            </tr>
            <?php endforeach; ?>
        </table>
        <?php endif; ?>
    </div>
    <div class="related">
        <h4><?= __('Related Sd Field Values') ?></h4>
        <?php if (!empty($sdCase->sd_field_values)): ?>
        <table cellpadding="0" cellspacing="0">
            <tr>
                <th scope="col"><?= __('Id') ?></th>
                <th scope="col"><?= __('Sd Case Id') ?></th>
                <th scope="col"><?= __('Version No') ?></th>
                <th scope="col"><?= __('Sd Field Id') ?></th>
                <th scope="col"><?= __('Set Number') ?></th>
                <th scope="col"><?= __('Field Value') ?></th>
                <th scope="col"><?= __('Created Time') ?></th>
                <th scope="col"><?= __('Status') ?></th>
                <th scope="col" class="actions"><?= __('Actions') ?></th>
            </tr>
            <?php foreach ($sdCase->sd_field_values as $sdFieldValues): ?>
            <tr>
                <td><?= h($sdFieldValues->id) ?></td>
                <td><?= h($sdFieldValues->sd_case_id) ?></td>
                <td><?= h($sdFieldValues->version_no) ?></td>
                <td><?= h($sdFieldValues->sd_field_id) ?></td>
                <td><?= h($sdFieldValues->set_number) ?></td>
                <td><?= h($sdFieldValues->field_value) ?></td>
                <td><?= h($sdFieldValues->created_time) ?></td>
                <td><?= h($sdFieldValues->status) ?></td>
                <td class="actions">
                    <?= $this->Html->link(__('View'), ['controller' => 'SdFieldValues', 'action' => 'view', $sdFieldValues->id]) ?>
                    <?= $this->Html->link(__('Edit'), ['controller' => 'SdFieldValues', 'action' => 'edit', $sdFieldValues->id]) ?>
                    <?= $this->Form->postLink(__('Delete'), ['controller' => 'SdFieldValues', 'action' => 'delete', $sdFieldValues->id], ['confirm' => __('Are you sure you want to delete # {0}?', $sdFieldValues->id)]) ?>
                </td>
            </tr>
            <?php endforeach; ?>
        </table>
        <?php endif; ?>
    </div>
</div>
