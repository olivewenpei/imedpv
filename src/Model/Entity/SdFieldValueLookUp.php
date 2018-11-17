<?php
namespace App\Model\Entity;

use Cake\ORM\Entity;

/**
 * SdFieldValueLookUp Entity
 *
 * @property int $id
 * @property int $sd_field_id
 * @property string $value
 * @property string $caption
 *
 * @property \App\Model\Entity\SdField $sd_field
 */
class SdFieldValueLookUp extends Entity
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
        'sd_field_id' => true,
        'value' => true,
        'caption' => true,
        'sd_field' => true
    ];
}
