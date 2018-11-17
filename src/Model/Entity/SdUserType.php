<?php
namespace App\Model\Entity;

use Cake\ORM\Entity;

/**
 * SdUserType Entity
 *
 * @property int $id
 * @property string $name
 * @property string $description
 * @property int $status
 *
 * @property \App\Model\Entity\SdCompany[] $sd_companies
 * @property \App\Model\Entity\SdRole[] $sd_roles
 */
class SdUserType extends Entity
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
        'sd_companies' => true,
        'sd_roles' => true
    ];
}
