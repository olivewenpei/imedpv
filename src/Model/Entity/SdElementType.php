<?php
namespace App\Model\Entity;

use Cake\ORM\Entity;

/**
 * SdElementType Entity
 *
 * @property int $id
 * @property string $type_name
 * @property bool $status
 *
 * @property \App\Model\Entity\SdField[] $sd_fields
 */
class SdElementType extends Entity
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
        'type_name' => true,
        'status' => true,
        'sd_fields' => true
    ];
}
