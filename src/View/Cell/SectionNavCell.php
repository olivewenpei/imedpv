<?php
namespace App\View\Cell;

use Cake\View\Cell;

/**
 * SectionNav cell
 */
class SectionNavCell extends Cell
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
    public function display($tabid, $caseNo)
    {
        $this->loadModel('SdTabs');
        $sdTabs = $this->SdTabs->find()->order(['SdTabs.display_order'=>'ASC'])
            ->contain(['SdSections']);
        $this->set(compact('sdTabs','tabid','caseNo'));
    }
}
