<?php
namespace App\Model\Entity;

use Cake\ORM\Entity;

/**
 * SdWorkflow Entity
 *
 * @property int $id
 * @property string $name
 * @property string $description
 * @property int $status
 * @property string $country
 * @property int $workflow_type
 *
 * @property \App\Model\Entity\SdActivity[] $sd_activities
 * @property \App\Model\Entity\SdProductWorkflow[] $sd_product_workflows
 */
class SdWorkflow extends Entity
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
        'name' => true,
        'description' => true,
        'status' => true,
        'country' => true,
        'workflow_type' => true,
        'sd_activities' => true,
        'sd_product_workflows' => true
    ];
}
