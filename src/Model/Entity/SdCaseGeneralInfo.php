<?php
namespace App\Model\Entity;

use Cake\ORM\Entity;

/**
 * SdCaseGeneralInfo Entity
 *
 * @property int $id
 * @property int $sd_case_id
 * @property string $case_detail_info
 *
 * @property \App\Model\Entity\SdCase $sd_case
 */
class SdCaseGeneralInfo extends Entity
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
        'sd_case_id' => true,
        'case_detail_info' => true,
        'sd_case' => true
    ];
}
