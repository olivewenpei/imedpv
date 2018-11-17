<?php
namespace App\Model\Entity;

use Cake\ORM\Entity;

/**
 * SdCase Entity
 *
 * @property int $id
 * @property int $sd_study_id
 * @property int $sd_phase_id
 * @property string $start_date
 * @property string $end_date
 *
 * @property \App\Model\Entity\SdStudy $sd_study
 * @property \App\Model\Entity\SdPhase $sd_phase
 */
class SdCase extends Entity
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
        'sd_study_id' => true,
        'sd_phase_id' => true,
        'start_date' => true,
        'end_date' => true,
        'sd_study' => true,
        'sd_phase' => true
    ];
}
