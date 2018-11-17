<?php
namespace App\Model\Entity;

use Cake\ORM\Entity;

/**
 * SdProductAssignment Entity
 *
 * @property int $id
 * @property int $sd_product_id
 * @property int $sd_phase_id
 * @property int $sd_company_id
 *
 * @property \App\Model\Entity\SdProduct $sd_product
 * @property \App\Model\Entity\SdPhase $sd_phase
 * @property \App\Model\Entity\SdCompany $sd_company
 */
class SdProductAssignment extends Entity
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
        'sd_product_id' => true,
        'sd_phase_id' => true,
        'sd_company_id' => true,
        'sd_product' => true,
        'sd_phase' => true,
        'sd_company' => true
    ];
}
