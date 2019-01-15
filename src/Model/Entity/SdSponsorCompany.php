<?php
namespace App\Model\Entity;

use Cake\ORM\Entity;

/**
 * SdSponsorCompany Entity
 *
 * @property int $id
 * @property string $company_name
 * @property string $country
 *
 * @property \App\Model\Entity\SdProduct[] $sd_products
 */
class SdSponsorCompany extends Entity
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
        'company_name' => true,
        'country' => true,
        'sd_products' => true
    ];
}
