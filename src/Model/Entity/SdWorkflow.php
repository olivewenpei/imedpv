<?php
namespace App\Model\Entity;

use Cake\ORM\Entity;

/**
 * SdWorkflow Entity
 *
 * @property int $id
 * @property string $name
 * @property string $description
 * @property int $status
 *
 * @property \App\Model\Entity\SdPhase[] $sd_phases
 * @property \App\Model\Entity\SdProduct[] $sd_products
 */
class SdWorkflow extends Entity
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
        'name' => true,
        'description' => true,
        'status' => true,
        'sd_phases' => true,
        'sd_products' => true
    ];
}