<?php
namespace App\Model\Entity;

use Cake\ORM\Entity;

/**
 * SdPhaseRolePermission Entity
 *
 * @property int $id
 * @property int $sd_phase_id
 * @property int $sd_role_id
 *
 * @property \App\Model\Entity\SdPhase $sd_phase
 * @property \App\Model\Entity\SdRole $sd_role
 * @property \App\Model\Entity\SdPhaseRoleSectionPermission[] $sd_phase_role_section_permissions
 */
class SdPhaseRolePermission extends Entity
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
        'sd_phase_id' => true,
        'sd_role_id' => true,
        'sd_phase' => true,
        'sd_role' => true,
        'sd_phase_role_section_permissions' => true
    ];
}
