<?php
/**
 * @var \App\View\AppView $this
 * @var \App\Model\Entity\SdProductType $sdProductType
 */
?>
<nav class="large-3 medium-4 columns" id="actions-sidebar">
    <ul class="side-nav">
        <li class="heading"><?= __('Actions') ?></li>
        <li><?= $this->Html->link(__('Edit Sd Product Type'), ['action' => 'edit', $sdProductType->id]) ?> </li>
        <li><?= $this->Form->postLink(__('Delete Sd Product Type'), ['action' => 'delete', $sdProductType->id], ['confirm' => __('Are you sure you want to delete # {0}?', $sdProductType->id)]) ?> </li>
        <li><?= $this->Html->link(__('List Sd Product Types'), ['action' => 'index']) ?> </li>
        <li><?= $this->Html->link(__('New Sd Product Type'), ['action' => 'add']) ?> </li>
        <li><?= $this->Html->link(__('List Sd Products'), ['controller' => 'SdProducts', 'action' => 'index']) ?> </li>
        <li><?= $this->Html->link(__('New Sd Product'), ['controller' => 'SdProducts', 'action' => 'add']) ?> </li>
    </ul>
</nav>
<div class="sdProductTypes view large-9 medium-8 columns content">
    <h3><?= h($sdProductType->id) ?></h3>
    <table class="vertical-table">
        <tr>
            <th scope="row"><?= __('Type Name') ?></th>
            <td><?= h($sdProductType->type_name) ?></td>
        </tr>
        <tr>
            <th scope="row"><?= __('Id') ?></th>
            <td><?= $this->Number->format($sdProductType->id) ?></td>
        </tr>
    </table>
    <div class="related">
        <h4><?= __('Related Sd Products') ?></h4>
        <?php if (!empty($sdProductType->sd_products)): ?>
        <table cellpadding="0" cellspacing="0">
            <tr>
                <th scope="col"><?= __('Id') ?></th>
                <th scope="col"><?= __('Product Name') ?></th>
                <th scope="col"><?= __('Sd Product Type Id') ?></th>
                <th scope="col"><?= __('Study No') ?></th>
                <th scope="col"><?= __('Sd Sponsor Company Id') ?></th>
                <th scope="col"><?= __('Status') ?></th>
                <th scope="col" class="actions"><?= __('Actions') ?></th>
            </tr>
            <?php foreach ($sdProductType->sd_products as $sdProducts): ?>
            <tr>
                <td><?= h($sdProducts->id) ?></td>
                <td><?= h($sdProducts->product_name) ?></td>
                <td><?= h($sdProducts->sd_product_type_id) ?></td>
                <td><?= h($sdProducts->study_no) ?></td>
                <td><?= h($sdProducts->sd_sponsor_company_id) ?></td>
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
</div>
