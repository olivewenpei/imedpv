<?php
namespace App\Model\Entity;

use Cake\ORM\Entity;

/**
 * SdProduct Entity
 *
 * @property int $id
 * @property int $sd_workflow_id
 * @property int $product_type
 * @property string $study_no
 * @property int $sponsor_company
 * @property int $status
 *
 * @property \App\Model\Entity\SdWorkflow $sd_workflow
 * @property \App\Model\Entity\SdProductAssignment[] $sd_product_assignments
 */
class SdProduct extends Entity
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
        'sd_workflow_id' => true,
        'product_type' => true,
        'study_no' => true,
        'sponsor_company' => true,
        'status' => true,
        'sd_workflow' => true,
        'sd_product_assignments' => true
    ];
}
