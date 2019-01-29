<?php
/**
 * @var \App\View\AppView $this
 * @var \App\Model\Entity\SdUser $sdUser
 */
?>
<nav class="large-3 medium-4 columns" id="actions-sidebar">
    <ul class="side-nav">
        <li class="heading"><?= __('Actions') ?></li>
        <li><?= $this->Html->link(__('Edit Sd User'), ['action' => 'edit', $sdUser->id]) ?> </li>
        <li><?= $this->Form->postLink(__('Delete Sd User'), ['action' => 'delete', $sdUser->id], ['confirm' => __('Are you sure you want to delete # {0}?', $sdUser->id)]) ?> </li>
        <li><?= $this->Html->link(__('List Sd Users'), ['action' => 'index']) ?> </li>
        <li><?= $this->Html->link(__('New Sd User'), ['action' => 'add']) ?> </li>
        <li><?= $this->Html->link(__('List Sd Roles'), ['controller' => 'SdRoles', 'action' => 'index']) ?> </li>
        <li><?= $this->Html->link(__('New Sd Role'), ['controller' => 'SdRoles', 'action' => 'add']) ?> </li>
        <li><?= $this->Html->link(__('List Sd Companies'), ['controller' => 'SdCompanies', 'action' => 'index']) ?> </li>
        <li><?= $this->Html->link(__('New Sd Company'), ['controller' => 'SdCompanies', 'action' => 'add']) ?> </li>
        <li><?= $this->Html->link(__('List Sd Activity Logs'), ['controller' => 'SdActivityLogs', 'action' => 'index']) ?> </li>
        <li><?= $this->Html->link(__('New Sd Activity Log'), ['controller' => 'SdActivityLogs', 'action' => 'add']) ?> </li>
        <li><?= $this->Html->link(__('List Sd Cases'), ['controller' => 'SdCases', 'action' => 'index']) ?> </li>
        <li><?= $this->Html->link(__('New Sd Case'), ['controller' => 'SdCases', 'action' => 'add']) ?> </li>
        <li><?= $this->Html->link(__('List Sd Product Workflows'), ['controller' => 'SdProductWorkflows', 'action' => 'index']) ?> </li>
        <li><?= $this->Html->link(__('New Sd Product Workflow'), ['controller' => 'SdProductWorkflows', 'action' => 'add']) ?> </li>
        <li><?= $this->Html->link(__('List Sd User Assignments'), ['controller' => 'SdUserAssignments', 'action' => 'index']) ?> </li>
        <li><?= $this->Html->link(__('New Sd User Assignment'), ['controller' => 'SdUserAssignments', 'action' => 'add']) ?> </li>
    </ul>
</nav>
<div class="sdUsers view large-9 medium-8 columns content">
    <h3><?= h($sdUser->title) ?></h3>
    <table class="vertical-table">
        <tr>
            <th scope="row"><?= __('Sd Role') ?></th>
            <td><?= $sdUser->has('sd_role') ? $this->Html->link($sdUser->sd_role->id, ['controller' => 'SdRoles', 'action' => 'view', $sdUser->sd_role->id]) : '' ?></td>
        </tr>
        <tr>
            <th scope="row"><?= __('Sd Company') ?></th>
            <td><?= $sdUser->has('sd_company') ? $this->Html->link($sdUser->sd_company->id, ['controller' => 'SdCompanies', 'action' => 'view', $sdUser->sd_company->id]) : '' ?></td>
        </tr>
        <tr>
            <th scope="row"><?= __('Firstname') ?></th>
            <td><?= h($sdUser->firstname) ?></td>
        </tr>
        <tr>
            <th scope="row"><?= __('Lastname') ?></th>
            <td><?= h($sdUser->lastname) ?></td>
        </tr>
        <tr>
            <th scope="row"><?= __('Username') ?></th>
            <td><?= h($sdUser->username) ?></td>
        </tr>
        <tr>
            <th scope="row"><?= __('Email') ?></th>
            <td><?= h($sdUser->email) ?></td>
        </tr>
        <tr>
            <th scope="row"><?= __('Password') ?></th>
            <td><?= h($sdUser->password) ?></td>
        </tr>
        <tr>
            <th scope="row"><?= __('Thumbnail') ?></th>
            <td><?= h($sdUser->thumbnail) ?></td>
        </tr>
        <tr>
            <th scope="row"><?= __('Site Number') ?></th>
            <td><?= h($sdUser->site_number) ?></td>
        </tr>
        <tr>
            <th scope="row"><?= __('Site Name') ?></th>
            <td><?= h($sdUser->site_name) ?></td>
        </tr>
        <tr>
            <th scope="row"><?= __('Title') ?></th>
            <td><?= h($sdUser->title) ?></td>
        </tr>
        <tr>
            <th scope="row"><?= __('Phone Country Code') ?></th>
            <td><?= h($sdUser->phone_country_code) ?></td>
        </tr>
        <tr>
            <th scope="row"><?= __('Phone') ?></th>
            <td><?= h($sdUser->phone) ?></td>
        </tr>
        <tr>
            <th scope="row"><?= __('Extention') ?></th>
            <td><?= h($sdUser->extention) ?></td>
        </tr>
        <tr>
            <th scope="row"><?= __('Cell Country Code') ?></th>
            <td><?= h($sdUser->cell_country_code) ?></td>
        </tr>
        <tr>
            <th scope="row"><?= __('Cell Phone No') ?></th>
            <td><?= h($sdUser->cell_phone_no) ?></td>
        </tr>
        <tr>
            <th scope="row"><?= __('Verification') ?></th>
            <td><?= h($sdUser->verification) ?></td>
        </tr>
        <tr>
            <th scope="row"><?= __('Job Title') ?></th>
            <td><?= h($sdUser->job_title) ?></td>
        </tr>
        <tr>
            <th scope="row"><?= __('Default Language') ?></th>
            <td><?= h($sdUser->default_language) ?></td>
        </tr>
        <tr>
            <th scope="row"><?= __('Id') ?></th>
            <td><?= $this->Number->format($sdUser->id) ?></td>
        </tr>
        <tr>
            <th scope="row"><?= __('Phone Alert') ?></th>
            <td><?= $this->Number->format($sdUser->phone_alert) ?></td>
        </tr>
        <tr>
            <th scope="row"><?= __('Email Alert') ?></th>
            <td><?= $this->Number->format($sdUser->email_alert) ?></td>
        </tr>
        <tr>
            <th scope="row"><?= __('Is Never') ?></th>
            <td><?= $this->Number->format($sdUser->is_never) ?></td>
        </tr>
        <tr>
            <th scope="row"><?= __('Is Medra') ?></th>
            <td><?= $this->Number->format($sdUser->is_medra) ?></td>
        </tr>
        <tr>
            <th scope="row"><?= __('Is Whodra') ?></th>
            <td><?= $this->Number->format($sdUser->is_whodra) ?></td>
        </tr>
        <tr>
            <th scope="row"><?= __('Assign Protocol') ?></th>
            <td><?= $this->Number->format($sdUser->assign_protocol) ?></td>
        </tr>
        <tr>
            <th scope="row"><?= __('Status') ?></th>
            <td><?= $this->Number->format($sdUser->status) ?></td>
        </tr>
        <tr>
            <th scope="row"><?= __('Is Imedsae Tracking') ?></th>
            <td><?= $this->Number->format($sdUser->is_imedsae_tracking) ?></td>
        </tr>
        <tr>
            <th scope="row"><?= __('Is Imed Safety Database') ?></th>
            <td><?= $this->Number->format($sdUser->is_imed_safety_database) ?></td>
        </tr>
        <tr>
            <th scope="row"><?= __('Created By') ?></th>
            <td><?= $this->Number->format($sdUser->created_by) ?></td>
        </tr>
        <tr>
            <th scope="row"><?= __('Modified By') ?></th>
            <td><?= $this->Number->format($sdUser->modified_by) ?></td>
        </tr>
        <tr>
            <th scope="row"><?= __('Account Expire Date') ?></th>
            <td><?= h($sdUser->account_expire_date) ?></td>
        </tr>
        <tr>
            <th scope="row"><?= __('Reset Password Expire Time') ?></th>
            <td><?= h($sdUser->reset_password_expire_time) ?></td>
        </tr>
        <tr>
            <th scope="row"><?= __('Created Dt') ?></th>
            <td><?= h($sdUser->created_dt) ?></td>
        </tr>
        <tr>
            <th scope="row"><?= __('Modified Dt') ?></th>
            <td><?= h($sdUser->modified_dt) ?></td>
        </tr>
        <tr>
            <th scope="row"><?= __('Is Email Verified') ?></th>
            <td><?= $sdUser->is_email_verified ? __('Yes') : __('No'); ?></td>
        </tr>
        <tr>
            <th scope="row"><?= __('Is Import User') ?></th>
            <td><?= $sdUser->is_import_user ? __('Yes') : __('No'); ?></td>
        </tr>
    </table>
    <div class="related">
        <h4><?= __('Related Sd Activity Logs') ?></h4>
        <?php if (!empty($sdUser->sd_activity_logs)): ?>
        <table cellpadding="0" cellspacing="0">
            <tr>
                <th scope="col"><?= __('Id') ?></th>
                <th scope="col"><?= __('Sd User Id') ?></th>
                <th scope="col"><?= __('Controller') ?></th>
                <th scope="col"><?= __('Action') ?></th>
                <th scope="col"><?= __('Sd Section Value Id') ?></th>
                <th scope="col"><?= __('Data Changed') ?></th>
                <th scope="col"><?= __('Updated Time') ?></th>
                <th scope="col" class="actions"><?= __('Actions') ?></th>
            </tr>
            <?php foreach ($sdUser->sd_activity_logs as $sdActivityLogs): ?>
            <tr>
                <td><?= h($sdActivityLogs->id) ?></td>
                <td><?= h($sdActivityLogs->sd_user_id) ?></td>
                <td><?= h($sdActivityLogs->controller) ?></td>
                <td><?= h($sdActivityLogs->action) ?></td>
                <td><?= h($sdActivityLogs->sd_section_value_id) ?></td>
                <td><?= h($sdActivityLogs->data_changed) ?></td>
                <td><?= h($sdActivityLogs->updated_time) ?></td>
                <td class="actions">
                    <?= $this->Html->link(__('View'), ['controller' => 'SdActivityLogs', 'action' => 'view', $sdActivityLogs->id]) ?>
                    <?= $this->Html->link(__('Edit'), ['controller' => 'SdActivityLogs', 'action' => 'edit', $sdActivityLogs->id]) ?>
                    <?= $this->Form->postLink(__('Delete'), ['controller' => 'SdActivityLogs', 'action' => 'delete', $sdActivityLogs->id], ['confirm' => __('Are you sure you want to delete # {0}?', $sdActivityLogs->id)]) ?>
                </td>
            </tr>
            <?php endforeach; ?>
        </table>
        <?php endif; ?>
    </div>
    <div class="related">
        <h4><?= __('Related Sd Cases') ?></h4>
        <?php if (!empty($sdUser->sd_cases)): ?>
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
            <?php foreach ($sdUser->sd_cases as $sdCases): ?>
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
    <div class="related">
        <h4><?= __('Related Sd Product Workflows') ?></h4>
        <?php if (!empty($sdUser->sd_product_workflows)): ?>
        <table cellpadding="0" cellspacing="0">
            <tr>
                <th scope="col"><?= __('Id') ?></th>
                <th scope="col"><?= __('Sd Product Id') ?></th>
                <th scope="col"><?= __('Sd Workflow Id') ?></th>
                <th scope="col"><?= __('Sd User Id') ?></th>
                <th scope="col"><?= __('Status') ?></th>
                <th scope="col"><?= __('Sd Company Id') ?></th>
                <th scope="col" class="actions"><?= __('Actions') ?></th>
            </tr>
            <?php foreach ($sdUser->sd_product_workflows as $sdProductWorkflows): ?>
            <tr>
                <td><?= h($sdProductWorkflows->id) ?></td>
                <td><?= h($sdProductWorkflows->sd_product_id) ?></td>
                <td><?= h($sdProductWorkflows->sd_workflow_id) ?></td>
                <td><?= h($sdProductWorkflows->sd_user_id) ?></td>
                <td><?= h($sdProductWorkflows->status) ?></td>
                <td><?= h($sdProductWorkflows->sd_company_id) ?></td>
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
    <div class="related">
        <h4><?= __('Related Sd User Assignments') ?></h4>
        <?php if (!empty($sdUser->sd_user_assignments)): ?>
        <table cellpadding="0" cellspacing="0">
            <tr>
                <th scope="col"><?= __('Id') ?></th>
                <th scope="col"><?= __('Sd Product Workflow Id') ?></th>
                <th scope="col"><?= __('Sd User Id') ?></th>
                <th scope="col"><?= __('Sd Workflow Activity Id') ?></th>
                <th scope="col" class="actions"><?= __('Actions') ?></th>
            </tr>
            <?php foreach ($sdUser->sd_user_assignments as $sdUserAssignments): ?>
            <tr>
                <td><?= h($sdUserAssignments->id) ?></td>
                <td><?= h($sdUserAssignments->sd_product_workflow_id) ?></td>
                <td><?= h($sdUserAssignments->sd_user_id) ?></td>
                <td><?= h($sdUserAssignments->sd_workflow_activity_id) ?></td>
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
