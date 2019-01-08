<?php
namespace App\Model\Entity;

use Cake\ORM\Entity;

/**
 * SdSectionValue Entity
 *
 * @property int $id
 * @property string $case_no
 * @property string $version_no
 * @property int $sd_section_structure_id
 * @property int $set_number
 * @property string $field_value
 * @property \Cake\I18n\FrozenTime $created_time
 * @property bool $status
 *
 * @property \App\Model\Entity\SdSectionStructure $sd_section_structure
 * @property \App\Model\Entity\SdActivityLog[] $sd_activity_log
 */
class SdSectionValue extends Entity
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
        'case_no' => true,
        'version_no' => true,
        'sd_section_structure_id' => true,
        'set_number' => true,
        'field_value' => true,
        'created_time' => true,
        'status' => true,
        'sd_section_structure' => true,
        'sd_activity_log' => true
    ];
}
