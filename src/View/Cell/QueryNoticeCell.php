<?php
namespace App\View\Cell;

use Cake\View\Cell;

/**
 * QueryNotice cell
 */
class QueryNoticeCell extends Cell
{

    /**
     * List of valid options that can be passed into this
     * cell's constructor.
     *
     * @var array
     */
    protected $_validCellOptions = [];

    /**
     * Initialization logic run at the end of object construction.
     *
     * @return void
     */
    public function initialize()
    {
    }

    /**
     * Default display method.
     *
     * @return void
     */
    public function display($userId){
        $this->loadModel('SdQueries');
        $newQueryCount = $this->SdQueries->find()->where(['receiver'=>$userId,'receiver_status'=>1,'read_date IS NULL'])->count();
        $this->set(compact('newQueryCount'));
    }
}
