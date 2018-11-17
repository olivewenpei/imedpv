<?php
/**
 * @var \App\View\AppView $this
 * @var \App\Model\Entity\SdUserType $sdUserType
 */
?>
<nav class="large-3 medium-4 columns" id="actions-sidebar">
    <ul class="side-nav">
        <li class="heading"><?= __('Actions') ?></li>
        <li><?= $this->Html->link(__('Edit Sd User Type'), ['action' => 'edit', $sdUserType->id]) ?> </li>
        <li><?= $this->Form->postLink(__('Delete Sd User Type'), ['action' => 'delete', $sdUserType->id], ['confirm' => __('Are you sure you want to delete # {0}?', $sdUserType->id)]) ?> </li>
        <li><?= $this->Html->link(__('List Sd User Types'), ['action' => 'index']) ?> </li>
        <li><?= $this->Html->link(__('New Sd User Type'), ['action' => 'add']) ?> </li>
        <li><?= $this->Html->link(__('List Sd Companies'), ['controller' => 'SdCompanies', 'action' => 'index']) ?> </li>
        <li><?= $this->Html->link(__('New Sd Company'), ['controller' => 'SdCompanies', 'action' => 'add']) ?> </li>
        <li><?= $this->Html->link(__('List Sd Roles'), ['controller' => 'SdRoles', 'action' => 'index']) ?> </li>
        <li><?= $this->Html->link(__('New Sd Role'), ['controller' => 'SdRoles', 'action' => 'add']) ?> </li>
    </ul>
</nav>
<div class="sdUserTypes view large-9 medium-8 columns content">
    <h3><?= h($sdUserType->name) ?></h3>
    <table class="vertical-table">
        <tr>
            <th scope="row"><?= __('Name') ?></th>
            <td><?= h($sdUserType->name) ?></td>
        </tr>
        <tr>
            <th scope="row"><?= __('Description') ?></th>
            <td><?= h($sdUserType->description) ?></td>
        </tr>
        <tr>
            <th scope="row"><?= __('Id') ?></th>
            <td><?= $this->Number->format($sdUserType->id) ?></td>
        </tr>
        <tr>
            <th scope="row"><?= __('Status') ?></th>
            <td><?= $this->Number->format($sdUserType->status) ?></td>
        </tr>
    </table>
    <div class="related">
        <h4><?= __('Related Sd Companies') ?></h4>
        <?php if (!empty($sdUserType->sd_companies)): ?>
        <table cellpadding="0" cellspacing="0">
            <tr>
                <th scope="col"><?= __('Id') ?></th>
                <th scope="col"><?= __('Sd User Type Id') ?></th>
                <th scope="col"><?= __('Company Name') ?></th>
                <th scope="col"><?= __('Company Email') ?></th>
                <th scope="col"><?= __('Website') ?></th>
                <th scope="col"><?= __('Address Line1') ?></th>
                <th scope="col"><?= __('Address Line2') ?></th>
                <th scope="col"><?= __('Zipcode') ?></th>
                <th scope="col"><?= __('City') ?></th>
                <th scope="col"><?= __('State') ?></th>
                <th scope="col"><?= __('Country') ?></th>
                <th scope="col"><?= __('Cell Country Code') ?></th>
                <th scope="col"><?= __('Cell Phone No') ?></th>
                <th scope="col"><?= __('Phone1 Country Code') ?></th>
                <th scope="col"><?= __('Phone1') ?></th>
                <th scope="col"><?= __('Extention1') ?></th>
                <th scope="col"><?= __('Phone2 Country Code') ?></th>
                <th scope="col"><?= __('Phone2') ?></th>
                <th scope="col"><?= __('Extention2') ?></th>
                <th scope="col"><?= __('Fax1 Country Code') ?></th>
                <th scope="col"><?= __('Fax1') ?></th>
                <th scope="col"><?= __('Fax2 Country Code') ?></th>
                <th scope="col"><?= __('Fax2') ?></th>
                <th scope="col"><?= __('Transaction Currency') ?></th>
                <th scope="col"><?= __('No Of Billing Cycle') ?></th>
                <th scope="col"><?= __('Current Billing Cycle') ?></th>
                <th scope="col"><?= __('No Of Whodra') ?></th>
                <th scope="col"><?= __('Status') ?></th>
                <th scope="col"><?= __('Un Paid') ?></th>
                <th scope="col"><?= __('Is Medra') ?></th>
                <th scope="col"><?= __('Is Whodra') ?></th>
                <th scope="col"><?= __('Create By') ?></th>
                <th scope="col"><?= __('Created Dt') ?></th>
                <th scope="col"><?= __('Modify By') ?></th>
                <th scope="col"><?= __('Modified Dt') ?></th>
                <th scope="col" class="actions"><?= __('Actions') ?></th>
            </tr>
            <?php foreach ($sdUserType->sd_companies as $sdCompanies): ?>
            <tr>
                <td><?= h($sdCompanies->id) ?></td>
                <td><?= h($sdCompanies->sd_user_type_id) ?></td>
                <td><?= h($sdCompanies->company_name) ?></td>
                <td><?= h($sdCompanies->company_email) ?></td>
                <td><?= h($sdCompanies->website) ?></td>
                <td><?= h($sdCompanies->address_line1) ?></td>
                <td><?= h($sdCompanies->address_line2) ?></td>
                <td><?= h($sdCompanies->zipcode) ?></td>
                <td><?= h($sdCompanies->city) ?></td>
                <td><?= h($sdCompanies->state) ?></td>
                <td><?= h($sdCompanies->country) ?></td>
                <td><?= h($sdCompanies->cell_country_code) ?></td>
                <td><?= h($sdCompanies->cell_phone_no) ?></td>
                <td><?= h($sdCompanies->phone1_country_code) ?></td>
                <td><?= h($sdCompanies->phone1) ?></td>
                <td><?= h($sdCompanies->extention1) ?></td>
                <td><?= h($sdCompanies->phone2_country_code) ?></td>
                <td><?= h($sdCompanies->phone2) ?></td>
                <td><?= h($sdCompanies->extention2) ?></td>
                <td><?= h($sdCompanies->fax1_country_code) ?></td>
                <td><?= h($sdCompanies->fax1) ?></td>
                <td><?= h($sdCompanies->fax2_country_code) ?></td>
                <td><?= h($sdCompanies->fax2) ?></td>
                <td><?= h($sdCompanies->transaction_currency) ?></td>
                <td><?= h($sdCompanies->no_of_billing_cycle) ?></td>
                <td><?= h($sdCompanies->current_billing_cycle) ?></td>
                <td><?= h($sdCompanies->no_of_whodra) ?></td>
                <td><?= h($sdCompanies->status) ?></td>
                <td><?= h($sdCompanies->un_paid) ?></td>
                <td><?= h($sdCompanies->is_medra) ?></td>
                <td><?= h($sdCompanies->is_whodra) ?></td>
                <td><?= h($sdCompanies->create_by) ?></td>
                <td><?= h($sdCompanies->created_dt) ?></td>
                <td><?= h($sdCompanies->modify_by) ?></td>
                <td><?= h($sdCompanies->modified_dt) ?></td>
                <td class="actions">
                    <?= $this->Html->link(__('View'), ['controller' => 'SdCompanies', 'action' => 'view', $sdCompanies->id]) ?>
                    <?= $this->Html->link(__('Edit'), ['controller' => 'SdCompanies', 'action' => 'edit', $sdCompanies->id]) ?>
                    <?= $this->Form->postLink(__('Delete'), ['controller' => 'SdCompanies', 'action' => 'delete', $sdCompanies->id], ['confirm' => __('Are you sure you want to delete # {0}?', $sdCompanies->id)]) ?>
                </td>
            </tr>
            <?php endforeach; ?>
        </table>
        <?php endif; ?>
    </div>
    <div class="related">
        <h4><?= __('Related Sd Roles') ?></h4>
        <?php if (!empty($sdUserType->sd_roles)): ?>
        <table cellpadding="0" cellspacing="0">
            <tr>
                <th scope="col"><?= __('Id') ?></th>
                <th scope="col"><?= __('Role Name') ?></th>
                <th scope="col"><?= __('Status') ?></th>
                <th scope="col"><?= __('Description') ?></th>
                <th scope="col"><?= __('Parent Group') ?></th>
                <th scope="col"><?= __('Sd User Type Id') ?></th>
                <th scope="col" class="actions"><?= __('Actions') ?></th>
            </tr>
            <?php foreach ($sdUserType->sd_roles as $sdRoles): ?>
            <tr>
                <td><?= h($sdRoles->id) ?></td>
                <td><?= h($sdRoles->role_name) ?></td>
                <td><?= h($sdRoles->status) ?></td>
                <td><?= h($sdRoles->description) ?></td>
                <td><?= h($sdRoles->parent_group) ?></td>
                <td><?= h($sdRoles->sd_user_type_id) ?></td>
                <td class="actions">
                    <?= $this->Html->link(__('View'), ['controller' => 'SdRoles', 'action' => 'view', $sdRoles->id]) ?>
                    <?= $this->Html->link(__('Edit'), ['controller' => 'SdRoles', 'action' => 'edit', $sdRoles->id]) ?>
                    <?= $this->Form->postLink(__('Delete'), ['controller' => 'SdRoles', 'action' => 'delete', $sdRoles->id], ['confirm' => __('Are you sure you want to delete # {0}?', $sdRoles->id)]) ?>
                </td>
            </tr>
            <?php endforeach; ?>
        </table>
        <?php endif; ?>
    </div>
</div>
