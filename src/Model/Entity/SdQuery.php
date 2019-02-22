<?php
namespace App\Model\Entity;

use Cake\ORM\Entity;

/**
 * SdQuery Entity
 *
 * @property int $id
 * @property string $title
 * @property string $content
 * @property int $query_type
 * @property int $sender
 * @property int $receiver
 * @property int $sender_deleted
 * @property int $receiver_status
 * @property \Cake\I18n\FrozenTime $send_date
 * @property \Cake\I18n\FrozenTime $read_date
 * @property int $query_status
 */
class SdQuery extends Entity
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
        'title' => true,
        'content' => true,
        'query_type' => true,
        'sender' => true,
        'receiver' => true,
        'sender_deleted' => true,
        'receiver_status' => true,
        'send_date' => true,
        'read_date' => true,
        'query_status' => true
    ];
}
