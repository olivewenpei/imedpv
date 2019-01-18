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
 * @property string $study_name
 * @property int $study_type
 * @property int $sd_sponsor_company_id
 * @property string $short_desc
 * @property string $product_desc
 * @property string $blinding_tech
 * @property int $sd_product_flag
 * @property string $WHODD_code
 * @property string $WHODD_name
 * @property string $mfr_name
 * @property string $start_date
 * @property string $end_date
 * @property string $call_center
 * @property int $status
 *
 * @property \App\Model\Entity\SdProductFlag $sd_product_flag
 * @property \App\Model\Entity\SdProductType $sd_product_type
 * @property \App\Model\Entity\SdStudyType $sd_study_type
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
        'study_name' => true,
        'study_type' => true,
        'sd_sponsor_company_id' => true,
        'short_desc' => true,
        'product_desc' => true,
        'blinding_tech' => true,
        'sd_product_flag' => true,
        'WHODD_code' => true,
        'WHODD_name' => true,
        'mfr_name' => true,
        'start_date' => true,
        'end_date' => true,
        'call_center' => true,
        'status' => true,
        'sd_product_type' => true,
        'sd_study_type' => true,
        'sd_sponsor_company' => true,
        'sd_product_workflows' => true
    ];
}
