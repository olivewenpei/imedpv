<?php
namespace App\Model\Entity;

use Cake\ORM\Entity;

/**
 * SdPhase Entity
 *
 * @property int $id
 * @property int $sd_workflow_id
 * @property int $order_no
 * @property int $step_forward
 * @property int $step_backward
 * @property string $phase_name
 *
 * @property \App\Model\Entity\SdWorkflow $sd_workflow
 * @property \App\Model\Entity\SdCase[] $sd_cases
 * @property \App\Model\Entity\SdPhaseRolePermission[] $sd_phase_role_permissions
 * @property \App\Model\Entity\SdProductAssignment[] $sd_product_assignments
 */
class SdPhase extends Entity
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
        'order_no' => true,
        'step_forward' => true,
        'step_backward' => true,
        'phase_name' => true,
        'sd_workflow' => true,
        'sd_cases' => true,
        'sd_phase_role_permissions' => true,
        'sd_product_assignments' => true
    ];
}
