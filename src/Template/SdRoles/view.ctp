<?php
/**
 * @var \App\View\AppView $this
 * @var \App\Model\Entity\SdRole $sdRole
 */
?>
<nav class="large-3 medium-4 columns" id="actions-sidebar">
    <ul class="side-nav">
        <li class="heading"><?= __('Actions') ?></li>
        <li><?= $this->Html->link(__('Edit Sd Role'), ['action' => 'edit', $sdRole->id]) ?> </li>
        <li><?= $this->Form->postLink(__('Delete Sd Role'), ['action' => 'delete', $sdRole->id], ['confirm' => __('Are you sure you want to delete # {0}?', $sdRole->id)]) ?> </li>
        <li><?= $this->Html->link(__('List Sd Roles'), ['action' => 'index']) ?> </li>
        <li><?= $this->Html->link(__('New Sd Role'), ['action' => 'add']) ?> </li>
        <li><?= $this->Html->link(__('List Sd User Types'), ['controller' => 'SdUserTypes', 'action' => 'index']) ?> </li>
        <li><?= $this->Html->link(__('New Sd User Type'), ['controller' => 'SdUserTypes', 'action' => 'add']) ?> </li>
        <li><?= $this->Html->link(__('List Sd Users'), ['controller' => 'SdUsers', 'action' => 'index']) ?> </li>
        <li><?= $this->Html->link(__('New Sd User'), ['controller' => 'SdUsers', 'action' => 'add']) ?> </li>
    </ul>
</nav>
<div class="sdRoles view large-9 medium-8 columns content">
    <h3><?= h($sdRole->id) ?></h3>
    <table class="vertical-table">
        <tr>
            <th scope="row"><?= __('Role Name') ?></th>
            <td><?= h($sdRole->role_name) ?></td>
        </tr>
        <tr>
            <th scope="row"><?= __('Description') ?></th>
            <td><?= h($sdRole->description) ?></td>
        </tr>
        <tr>
            <th scope="row"><?= __('Sd User Type') ?></th>
            <td><?= $sdRole->has('sd_user_type') ? $this->Html->link($sdRole->sd_user_type->name, ['controller' => 'SdUserTypes', 'action' => 'view', $sdRole->sd_user_type->id]) : '' ?></td>
        </tr>
        <tr>
            <th scope="row"><?= __('Id') ?></th>
            <td><?= $this->Number->format($sdRole->id) ?></td>
        </tr>
        <tr>
            <th scope="row"><?= __('Status') ?></th>
            <td><?= $this->Number->format($sdRole->status) ?></td>
        </tr>
        <tr>
            <th scope="row"><?= __('Parent Group') ?></th>
            <td><?= $this->Number->format($sdRole->parent_group) ?></td>
        </tr>
    </table>
    <div class="related">
        <h4><?= __('Related Sd Users') ?></h4>
        <?php if (!empty($sdRole->sd_users)): ?>
        <table cellpadding="0" cellspacing="0">
            <tr>
                <th scope="col"><?= __('Id') ?></th>
                <th scope="col"><?= __('Sd Role Id') ?></th>
                <th scope="col"><?= __('Sd Company Id') ?></th>
                <th scope="col"><?= __('Firstname') ?></th>
                <th scope="col"><?= __('Lastname') ?></th>
                <th scope="col"><?= __('Username') ?></th>
                <th scope="col"><?= __('Email') ?></th>
                <th scope="col"><?= __('Password') ?></th>
                <th scope="col"><?= __('Thumbnail') ?></th>
                <th scope="col"><?= __('Site Number') ?></th>
                <th scope="col"><?= __('Site Name') ?></th>
                <th scope="col"><?= __('Title') ?></th>
                <th scope="col"><?= __('Phone Country Code') ?></th>
                <th scope="col"><?= __('Phone') ?></th>
                <th scope="col"><?= __('Extention') ?></th>
                <th scope="col"><?= __('Cell Country Code') ?></th>
                <th scope="col"><?= __('Cell Phone No') ?></th>
                <th scope="col"><?= __('Verification') ?></th>
                <th scope="col"><?= __('Phone Alert') ?></th>
                <th scope="col"><?= __('Email Alert') ?></th>
                <th scope="col"><?= __('Is Never') ?></th>
                <th scope="col"><?= __('Account Expire Date') ?></th>
                <th scope="col"><?= __('Is Email Verified') ?></th>
                <th scope="col"><?= __('Reset Password Expire Time') ?></th>
                <th scope="col"><?= __('Is Import User') ?></th>
                <th scope="col"><?= __('Is Medra') ?></th>
                <th scope="col"><?= __('Is Whodra') ?></th>
                <th scope="col"><?= __('Job Title') ?></th>
                <th scope="col"><?= __('Assign Protocol') ?></th>
                <th scope="col"><?= __('Status') ?></th>
                <th scope="col"><?= __('Default Language') ?></th>
                <th scope="col"><?= __('Is Imedsae Tracking') ?></th>
                <th scope="col"><?= __('Is Imed Safety Database') ?></th>
                <th scope="col"><?= __('Created By') ?></th>
                <th scope="col"><?= __('Created Dt') ?></th>
                <th scope="col"><?= __('Modified By') ?></th>
                <th scope="col"><?= __('Modified Dt') ?></th>
                <th scope="col" class="actions"><?= __('Actions') ?></th>
            </tr>
            <?php foreach ($sdRole->sd_users as $sdUsers): ?>
            <tr>
                <td><?= h($sdUsers->id) ?></td>
                <td><?= h($sdUsers->sd_role_id) ?></td>
                <td><?= h($sdUsers->sd_company_id) ?></td>
                <td><?= h($sdUsers->firstname) ?></td>
                <td><?= h($sdUsers->lastname) ?></td>
                <td><?= h($sdUsers->username) ?></td>
                <td><?= h($sdUsers->email) ?></td>
                <td><?= h($sdUsers->password) ?></td>
                <td><?= h($sdUsers->thumbnail) ?></td>
                <td><?= h($sdUsers->site_number) ?></td>
                <td><?= h($sdUsers->site_name) ?></td>
                <td><?= h($sdUsers->title) ?></td>
                <td><?= h($sdUsers->phone_country_code) ?></td>
                <td><?= h($sdUsers->phone) ?></td>
                <td><?= h($sdUsers->extention) ?></td>
                <td><?= h($sdUsers->cell_country_code) ?></td>
                <td><?= h($sdUsers->cell_phone_no) ?></td>
                <td><?= h($sdUsers->verification) ?></td>
                <td><?= h($sdUsers->phone_alert) ?></td>
                <td><?= h($sdUsers->email_alert) ?></td>
                <td><?= h($sdUsers->is_never) ?></td>
                <td><?= h($sdUsers->account_expire_date) ?></td>
                <td><?= h($sdUsers->is_email_verified) ?></td>
                <td><?= h($sdUsers->reset_password_expire_time) ?></td>
                <td><?= h($sdUsers->is_import_user) ?></td>
                <td><?= h($sdUsers->is_medra) ?></td>
                <td><?= h($sdUsers->is_whodra) ?></td>
                <td><?= h($sdUsers->job_title) ?></td>
                <td><?= h($sdUsers->assign_protocol) ?></td>
                <td><?= h($sdUsers->status) ?></td>
                <td><?= h($sdUsers->default_language) ?></td>
                <td><?= h($sdUsers->is_imedsae_tracking) ?></td>
                <td><?= h($sdUsers->is_imed_safety_database) ?></td>
                <td><?= h($sdUsers->created_by) ?></td>
                <td><?= h($sdUsers->created_dt) ?></td>
                <td><?= h($sdUsers->modified_by) ?></td>
                <td><?= h($sdUsers->modified_dt) ?></td>
                <td class="actions">
                    <?= $this->Html->link(__('View'), ['controller' => 'SdUsers', 'action' => 'view', $sdUsers->id]) ?>
                    <?= $this->Html->link(__('Edit'), ['controller' => 'SdUsers', 'action' => 'edit', $sdUsers->id]) ?>
                    <?= $this->Form->postLink(__('Delete'), ['controller' => 'SdUsers', 'action' => 'delete', $sdUsers->id], ['confirm' => __('Are you sure you want to delete # {0}?', $sdUsers->id)]) ?>
                </td>
            </tr>
            <?php endforeach; ?>
        </table>
        <?php endif; ?>
    </div>
</div>
