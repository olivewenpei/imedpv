<?php
namespace App\Model\Entity;

use Cake\ORM\Entity;

/**
 * SdTab Entity
 *
 * @property int $id
 * @property string $tab_name
 * @property int $display_order
 * @property bool $status
 *
 * @property \App\Model\Entity\SdSection[] $sd_sections
 */
class SdTab extends Entity
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
        'tab_name' => true,
        'display_order' => true,
        'status' => true,
        'sd_sections' => true
    ];
}
