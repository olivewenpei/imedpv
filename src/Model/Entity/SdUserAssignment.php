<?php
namespace App\Model\Entity;

use Cake\ORM\Entity;

/**
 * SdUserAssignment Entity
 *
 * @property int $id
 * @property int $sd_study_assignment_id
 * @property int $sd_user_id
 *
 * @property \App\Model\Entity\SdStudyAssignment $sd_study_assignment
 * @property \App\Model\Entity\SdUser $sd_user
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
        'sd_study_assignment_id' => true,
        'sd_user_id' => true,
        'sd_study_assignment' => true,
        'sd_user' => true
    ];
}
