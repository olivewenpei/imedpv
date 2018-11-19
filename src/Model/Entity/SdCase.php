<?php
namespace App\Model\Entity;

use Cake\ORM\Entity;

/**
 * SdCase Entity
 *
 * @property int $id
 * @property string $caseNo
 * @property int $sd_product_id
 * @property int $sd_phase_id
 * @property string $start_date
 * @property string $end_date
 * @property int $status
 *
 * @property \App\Model\Entity\SdProduct $sd_product
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
        'caseNo' => true,
        'sd_product_id' => true,
        'sd_phase_id' => true,
        'start_date' => true,
        'end_date' => true,
        'status' => true,
        'sd_product' => true,
        'sd_phase' => true
    ];
}
