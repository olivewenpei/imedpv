<?php
namespace App\Model\Entity;

use Cake\ORM\Entity;

/**
 * SdCaseHistory Entity
 *
 * @property int $id
 * @property int $sd_case_id
 * @property int $sd_workflow_activity_id
 * @property int $sd_user_id
 * @property string $comment
 * @property \Cake\I18n\FrozenTime $enter_time
 * @property \Cake\I18n\FrozenTime $close_time
 *
 * @property \App\Model\Entity\SdCase $sd_case
 * @property \App\Model\Entity\SdWorkflowActivity $sd_workflow_activity
 * @property \App\Model\Entity\SdUser $sd_user
 */
class SdCaseHistory extends Entity
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
        'sd_case_id' => true,
        'sd_workflow_activity_id' => true,
        'sd_user_id' => true,
        'comment' => true,
        'enter_time' => true,
        'close_time' => true,
        'sd_case' => true,
        'sd_workflow_activity' => true,
        'sd_user' => true
    ];
}
