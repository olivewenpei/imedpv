<?php
namespace App\Model\Entity;

use Cake\ORM\Entity;

/**
 * SdRole Entity
 *
 * @property int $id
 * @property string $role_name
 * @property int $status
 * @property string $description
 * @property int $parent_group
 * @property int $sd_user_type_id
 *
 * @property \App\Model\Entity\SdUserType $sd_user_type
 * @property \App\Model\Entity\SdUser[] $sd_users
 */
class SdRole extends Entity
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
        'role_name' => true,
        'status' => true,
        'description' => true,
        'parent_group' => true,
        'sd_user_type_id' => true,
        'sd_user_type' => true,
        'sd_users' => true
    ];
}
