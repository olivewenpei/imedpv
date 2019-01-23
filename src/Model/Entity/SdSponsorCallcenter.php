<?php
namespace App\Model\Entity;

use Cake\ORM\Entity;

/**
 * SdSponsorCallcenter Entity
 *
 * @property int $id
 * @property int $sponsor
 * @property int $call_center
 * @property int $status
 */
class SdSponsorCallcenter extends Entity
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
        'sponsor' => true,
        'call_center' => true,
        'status' => true
    ];
}
