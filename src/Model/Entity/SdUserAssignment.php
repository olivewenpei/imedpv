<?php
namespace App\Model\Entity;

use Cake\ORM\Entity;

/**
 * SdUserAssignment Entity
 *
 * @property int $id
 * @property int $sd_product_workflow_id
 * @property int $sd_user_id
 * @property int $sd_workflow_activity_id
 *
 * @property \App\Model\Entity\SdProductAssignment $sd_product_assignment
 * @property \App\Model\Entity\SdUser $sd_user
 * @property \App\Model\Entity\SdActivity $sd_activity
 */
class SdUserAssignment extends Entity
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
        'sd_product_workflow_id' => true,
        'sd_user_id' => true,
        'sd_workflow_activity_id' => true,
        'sd_product_assignment' => true,
        'sd_user' => true,
        'sd_activity' => true
    ];
}
