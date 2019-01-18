<?php
namespace App\Model\Entity;

use Cake\ORM\Entity;

/**
 * SdProductWorkflow Entity
 *
 * @property int $id
 * @property int $sd_product_id
 * @property int $sd_workflow_id
 * @property int $sd_user_id
 *
 * @property \App\Model\Entity\SdProduct $sd_product
 * @property \App\Model\Entity\SdWorkflow $sd_workflow
 * @property \App\Model\Entity\SdUser $sd_user
 * @property \App\Model\Entity\SdCase[] $sd_cases
 */
class SdProductWorkflow extends Entity
{

    /**
     * Fields that can be mass assigned using newEntity() or patchEntity().
     *
     * Note that when '*' is set to true, this allows all unspecified fields to
     * be mass assigned. For security purposes, it is advised to set '*' to false
     * (or remove it), and explicitly make individual fields accessible as needed.
     *
     * @var array
     */
    protected $_accessible = [
        'sd_product_id' => true,
        'sd_workflow_id' => true,
        'sd_user_id' => true,
        'sd_product' => true,
        'sd_workflow' => true,
        'sd_user' => true,
        'sd_cases' => true
    ];
}
