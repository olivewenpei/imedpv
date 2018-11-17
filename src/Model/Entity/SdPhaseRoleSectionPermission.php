<?php
namespace App\Model\Entity;

use Cake\ORM\Entity;

/**
 * SdPhaseRoleSectionPermission Entity
 *
 * @property int $id
 * @property int $sd_phase_role_permission_id
 * @property int $sd_section_id
 * @property int $action
 *
 * @property \App\Model\Entity\SdPhaseRolePermission $sd_phase_role_permission
 * @property \App\Model\Entity\SdSection $sd_section
 */
class SdPhaseRoleSectionPermission extends Entity
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
        'sd_phase_role_permission_id' => true,
        'sd_section_id' => true,
        'action' => true,
        'sd_phase_role_permission' => true,
        'sd_section' => true
    ];
}
