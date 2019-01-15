<?php
namespace App\Model\Entity;

use Cake\ORM\Entity;

/**
 * SdProduct Entity
 *
 * @property int $id
 * @property string $product_name
 * @property int $sd_product_type_id
 * @property string $study_no
 * @property int $sd_sponsor_company_id
 * @property int $status
 *
 * @property \App\Model\Entity\SdProductType $sd_product_type
 * @property \App\Model\Entity\SdSponsorCompany $sd_sponsor_company
 * @property \App\Model\Entity\SdProductWorkflow[] $sd_product_workflows
 */
class SdProduct extends Entity
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
        'product_name' => true,
        'sd_product_type_id' => true,
        'study_no' => true,
        'sd_sponsor_company_id' => true,
        'status' => true,
        'sd_product_type' => true,
        'sd_sponsor_company' => true,
        'sd_product_workflows' => true
    ];
}
