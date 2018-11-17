<?php
namespace App\Model\Entity;

use Cake\ORM\Entity;

/**
 * SdStudyCro Entity
 *
 * @property int $id
 * @property int $sd_study_id
 * @property int $cro_company
 *
 * @property \App\Model\Entity\SdStudy $sd_study
 */
class SdStudyCro extends Entity
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
        'cro_company' => true,
        'sd_study' => true
    ];
}
